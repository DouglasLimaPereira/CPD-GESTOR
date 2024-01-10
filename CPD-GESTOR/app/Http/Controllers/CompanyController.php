<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index(Request $request)
    {

        $rows = Company::paginate(15);
        
        return view('companies.index', compact('rows'));
    }

    public function create()
    {
        $estados = Estado::orderBy('uf')->get();

        return view('companies.create', compact('estados'));
    }

    public function store(CompanyRequest $request)
    {
        $input = $request->all();

        try {
            //Inicia o processo de transação
            DB::beginTransaction();
            
            if($company = Company::create($input)){
                //Processo de registro da imagem/logotipo
                try {
                    //Verificando se o arquivo é válido como imagem
                    if(isset($request->logotipo) && $request->logotipo->isValid()){
                        $logotipo_nome = sha1(date('Y-m-d H:m:s')). '.' . $request->logotipo->getClientOriginalExtension();
                        $logotipo = $request->logotipo->storeAs('companies/' . base64_encode($company->id) . '/images', $logotipo_nome, 'public');
                        $company->update([
                            'logotipo' => $logotipo,
                            'logo_origem' => 'g'
                        ]);
                    }

                } catch (\Exception $e) {
                    return back()->withErrors('A imagem não pode ser registrada')->withInput();
                }
            }
            //Envia para as tabelas as informações e realiza o registro
            DB::commit();
            
            return redirect()->route('construtoras.index')->with('success', 'Construtora cadastrada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Não foi possível realizar o cadastro da Construtora.')->withInput();
        }
    }

    public function edit(Company $company)
    {
        $row = $company;
        $estados = Estado::all();
        return view('companies.edit', compact('row', 'estados', 'company'));
    }

    public function update(Company $company, CompanyRequest $request)
    {
        $input = $request->all();

        try {
            DB::beginTransaction();
                if(isset($input['remover_logotipo'])){
                    if(Storage::disk('public')->exists($company->logotipo))
                        
                        Storage::disk('public')->delete($company->logotipo);
                        
                    $input['logotipo'] = null;
                }
                
                //Processo de atualização de logotipo
                if($request->logotipo)
                {
                    //Deletando o arquivo caso já exista algum
                    if(Storage::disk('public')->exists($company->logotipo))
                        // dd('Existe');
                        Storage::disk('public')->delete($company->logotipo);
                    // dd('Não');
                    //Verificando se o arquivo é válido como logotipo
                    if($request->logotipo->isValid()){
                        //Cadastrando a nova logotipo
                        $logotipo_nome = sha1(date('Y-m-d H:m:s')). '.' . $request->logotipo->getClientOriginalExtension();
                        $logotipo = $request->logotipo->storeAs("companies/".base64_encode($company->id)."/images", $logotipo_nome, 'public');
                        $input['logotipo'] = $logotipo;
                        $input['logo_origem'] = 'g';
                    }
                }

            //Realizando o processo de update
            $company->update($input);
            
            DB::commit();

            return back()->with('success', 'Construtora atualizada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Não foi possível realizar a atualização.');
        }
    }

    public function atualizaEstado( Company $company)
    {
        ($company->estado) ? $company->update(['estado' => false]) : $company->update(['estado' => true]);
        return redirect()->route('construtoras.index')->with('success',($company->estado) ? 'Construtora Habilitada com sucesso!' : 'Construtora Desabilitada com sucesso!'); 
    }

    public function destroy(Company $company)
    {
        
        try {
            DB::beginTransaction();
            
            $logotipo = $company->logotipo;

            //Atualizando o estado
            $company->update(['estado'=>0]);

            //Removendo a construtora
            if($company->delete()){
                //Removendo a imagem/logotipo
                
                // if($logotipo){
                //     if(Storage::exists($logotipo)) Storage::delete($logotipo);
                // }
            }

            DB::commit();
            
            return back()->with('success', 'Construtora removida com sucesso!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Construtora não removida!');
        }
    }

    public function gerenciar(Company $company)
    {
        return view('companies.gerencia', compact('company'));
    }

}
