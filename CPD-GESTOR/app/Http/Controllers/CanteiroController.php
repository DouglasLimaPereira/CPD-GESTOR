<?php

namespace App\Http\Controllers;

use App\Models\Canteiro;
use App\Models\Company;
use App\Models\Funcionario;
use App\Models\Estado;
use App\Http\Requests\CanteiroRequest;
use App\Models\Companyuser;
use App\Models\Fator;
use App\Models\Pessoa;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CanteiroController extends Controller
{
    public function index(Company $company)
    {
        Funcionario::all();
        Pessoa::all();
        $rows = $company->canteiros()->paginate(15);
        // dd($company->companyuser->use);
        // dd($company->users->where('id', $gerente));

        $company_count = Company::count();
        
        return view('canteiros.index', compact('rows', 'company_count', 'company'));
    }

    public function create(Company $company)
    {
        if(Company::count() == 0) 
            return back()->with('warning', 'Não existem construtoras cadastradas neste momento.');

        $companies = Company::orderBy('razao_social')->get();

        $funcionarios = $company->funcionarios;
        
        $estados = Estado::orderBy('uf')->get();

        return view('canteiros.create', compact('company', 'companies', 'funcionarios', 'estados'));
    }

    public function store(Company $company, CanteiroRequest $request)
    {
        $input = $request->all();
        
        try {
            DB::beginTransaction();

            /**
             * CANTEIRO
             */
            try {
                if($canteiro = Canteiro::create($input)){
                    
                    //Processo de registro da imagem/logotipo
                    try {
                        //Verificando se o arquivo é válido como imagem
                        if(isset($request->logotipo) && $request->logotipo->isValid()){
                            $logotipo_nome = sha1(date('Y-m-d H:m:s')). '.' . $request->logotipo->getClientOriginalExtension();
                            $logotipo = $request->logotipo->storeAs('companies/' . base64_encode($canteiro->company_id) . '/canteiros/' .base64_encode($canteiro->id).'/images', $logotipo_nome, 'public');
                            $input['logotipo'] = $logotipo;
                            $canteiro->update([
                                'logotipo' => $input['logotipo'],
                                'logo_origem' => 'g'
                            ]);
                        }

                    } catch (\Exception $e) {
                        return back()->withErrors('A imagem não pode ser registrada')->withInput();
                    }
                }
            } catch (\Exception $e) {
                return back()->withInput()->withErrors('Erro 00001: Canteiro não cadastrado.');
            }
            /**
             * FATORES
             */

            try {

                $canteiro->fatores()->create([
                    'indice_produtivo' => $input['indice_produtivo'],
                    'indice_improdutivo' => $input['indice_improdutivo'],
                    'indice_feriado' => $input['indice_feriado'],
                    'data_vigencia' => '1900-01-01',
                    'cad_user_id' => auth()->user()->id
                ]);

                // $total_fatores = count($input['indice_produtivo']);
                
                // $i = 0;
                // while($i < $total_fatores):
                //     $canteiro->fatores()->create([
                //         'indice_produtivo' => $input['indice_produtivo'][$i],
                //         'indice_improdutivo' => $input['indice_improdutivo'][$i],
                //         'indice_feriado' => $input['indice_feriado'][$i],
                //         'data_vigencia' => $input['data_vigencia'][$i],
                //         'cad_user_id' => auth()->user()->id,
                //     ]);
                //     $i++;
                // endwhile;

                // $canteiro->fatores()->update([
                //     'data_vigencia' => $input['data_inicio']
                // ]);
                
            } catch (\Exception $e) {
                return back()->withInput()->withErrors($e->getMessage());
                return back()->withInput()->withErrors('Erro 00002: Fatores não cadastrados.');
            }

            /**
             * CANTEIRO FUNCIONÁRIO
             *  Vínculo entre canteiro e funcionário
             */
            if(isset($input['funcionario_id']) && $input['funcionario_id'] != ''){
                try {
                    $canteiro->funcionarios()->create([
                        'funcionario_id' => $input['funcionario_id'],
                        'gerente' => true,
                        'data_vinculo' => date(now())
                    ]);
                } catch (\Exception $e) {
                    // return back()->withInput()->withErrors($e->getMessage());
                    return back()->withInput()->withErrors('Erro 00003: Vínculo com funcionário não cadastrado.');
                }    
            }

            /**
             * COMPANYUSER
             * 
            */

            // consultando os usuarios superadmins da companyuser
            
            $companyusers = Companyuser::where('company_id', $input['company_id'])->where('superadmin', true)->get()->unique('user_id');
            
            if ($companyusers->count() > 0 ) {
                foreach ($companyusers as $key => $companyuser) {
                    Companyuser::create([
                        'company_id' => $input['company_id'],
                        'canteiro_id' => $canteiro->id,
                        'pessoa_id' => $companyuser->pessoa_id,
                        'user_id' => $companyuser->user_id,
                        'superadmin' => 1,
                        'active' => 1,
                    ]);
                }
            }

            DB::commit();
            
            return redirect()->route('construtoras.canteiros.index', $company->id)->with('success', 'Canteiro cadastrado com sucesso');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->withErrors($e->getMessage());
            return back()->withInput()->withErrors('Erro 00004: Cadastro não realizado.');
        }
    }

    public function edit(Company $company, Canteiro $canteiro)
    {
        $estados = Estado::orderBy('uf')->get();

        //$funcionarios = $canteiro->company->pessoas()->with('funcionario')->has('funcionario')->get();
        $funcionarios = $company->funcionarios;
        

        $data_vigente = $canteiro->fatores->where('data_vigencia', '<=', date(now()))->max('data_vigencia');
        
        return view('canteiros.edit', compact('company', 'canteiro', 'estados', 'funcionarios', 'data_vigente'));
    }

    public function update(Company $company, Canteiro $canteiro, CanteiroRequest $request)
    {
        $input = $request->all();
        $logotipo = $canteiro->logotipo;
        $input['company_id'] = $canteiro->company_id;
        
        $funcionario_id = $canteiro->funcionario_id;
        try {
            DB::beginTransaction();
                
            /**
             * CANTEIRO
             *  Atualizando a tabela canteiro
             */
            try {
                $canteiro->update($input);
                
                if(isset($input['remover_logotipo'])){
                    if(Storage::disk('public')->exists($logotipo))
                        Storage::disk('public')->delete($logotipo);
                        //Atualiza o campo logotipo
                        $canteiro->update(['logotipo' => null]);
                }
                //Processo de atualização de logotipo
                if($request->logotipo)
                {
                    //Deletando o arquivo caso já exista algum
                    if(Storage::disk('public')->exists($logotipo))
                        Storage::disk('public')->delete($logotipo);
                    
                    //Verificando se o arquivo é válido como logotipo
                    if($request->logotipo->isValid()){    
                        //Cadastrando a nova logotipo
                        $logotipo_nome = sha1(date('Y-m-d H:m:s')). '.' . $request->logotipo->getClientOriginalExtension();
                        $logotipo = $request->logotipo->storeAs('companies/' . base64_encode($canteiro->company_id) . '/canteiros/'.base64_encode($canteiro->id).'/images', $logotipo_nome, 'public');
                        //Atualiza o campo logotipo
                        $canteiro->update([
                            'logotipo' => $logotipo,
                            'logo_origem' => 'g'
                        ]);
                    }
                }
            } catch (\Exception $e) {
                //return back()->withInput()->withErrors($e->getMessage());
                return back()->withInput()->withErrors('Erro 00001: Imagem não pode ser cadastrada.');
            }

            
            /**
             * FATOR
             *  Esta tabela poderá vir a não ser obrigatória neste cadastro
             *  Caso não seja deverá ser criado uma verificação se os dados vieram ou não
             */

            // // Cadastro de novos fatores
            // $total_fatores = count($input['indice_produtivo']);
            // if($input['indice_produtivo'][0]){
            //     try{
            //         $i = 0;
            //         while($i < $total_fatores):
            //             $canteiro->fatores()->create([
            //                 'indice_produtivo' => $input['indice_produtivo'][$i],
            //                 'indice_improdutivo' => $input['indice_improdutivo'][$i],
            //                 'indice_feriado' => $input['indice_feriado'][$i],
            //                 'data_vigencia' => $input['data_vigencia'][$i],
            //                 'cad_user_id' => auth()->user()->id,
            //             ]);
            //             $i++;
            //         endwhile;
            //     } catch (\Exception $e) {
            //         // return back()->withInput()->withErrors($e->getMessage());
            //         return back()->withInput()->withErrors('Erro 00002: Fatores não cadastrados.');
            //     }
            // }

            // //Edição de fatores
            // if(isset($input['editar_fator'])){
                
            //     foreach($input['editar_fator'] as $key => $value){
            //         $fator = Fator::find($value);
            //         $fator->update([
            //             'indice_produtivo' => $input['edicao_indice_produtivo'][$key],
            //             'indice_improdutivo' => $input['edicao_indice_improdutivo'][$key],
            //             'indice_feriado' => $input['edicao_indice_feriado'][$key],
            //             'data_vigencia' => $input['edicao_data_vigencia'][$key],
            //         ]);
            //     }
            // }   
            
             /**
              * CANTEIRO FUNCIONÁRIO
              */
            try {
                //Controle de gerente
                if($funcionario_id != $input['funcionario_id'] || ($input['funcionario_id'] == '')){
                    
                    //Atualizando o campo gerente do registro atual para false
                    $gerente = $canteiro->funcionarios->firstWhere('gerente', true);
                    if($gerente)
                        $gerente->update(['gerente'=>false]);
                    
                    //Inserindo o novo gerente
                    if($input['funcionario_id'] != ''){
                        $checa_funcionario = $canteiro->funcionarios->where('data_desligamento', '')->firstWhere('funcionario_id', $input['funcionario_id']);
                        if($checa_funcionario){
                            $checa_funcionario->update(['gerente'=>true]);
                        }else{
                            $canteiro->funcionarios()->create([
                                'funcionario_id' => $input['funcionario_id'],
                                'gerente' => true,
                                'data_vinculo' => date(now())
                            ]);
                        }
                    }
                }
            } catch (\Exception $e) {
                //return back()->withInput()->withErrors($e->getMessage());
                return back()->withInput()->withErrors('Erro 00003: Vínculo com funcionário não cadastrado.');
            }
            DB::commit();

            return back()->with('success', 'Canteiro atualizado com sucesso');
        } catch (\Throwable $th) {
            DB::rollBack();
            //return back()->withInput()->withErrors($th->getMessage());
            return back()->withInput()->withErrors('Erro 00004: Cadastro não realizado.');
        }
    }

    public function destroy(Company $company, Canteiro $canteiro)
    {
        try {
            $canteiro->delete();

            return redirect()->route('construtoras.canteiros.index', $company->id)->with('success', 'Canteiro removido com sucesso');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors('Erro 00004: Registro não removido.');
        }
    }
}
