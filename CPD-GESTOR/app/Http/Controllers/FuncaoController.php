<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FuncaoRequest;
use App\Models\Canteiro;
use App\Models\Company;
use App\Models\Funcao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FuncaoController extends Controller
{
    public function index(Company $company)
    {
        Filial::all();
        return view('funcoes.index', compact('company'));
    }

    public function create(Company $company)
    {
        return view('funcoes.create', compact('company'));
    }

    public function store(Company $company, FuncaoRequest $request)
    {
        $input = $request->all();

        $input['user_cad_id'] = Auth::id();
        
        //Verifica se o nome existe
        if($company->funcoes->where('nome', $request->nome)->count() > 0)
            return back()->withErrors('O nome informado já está sendo utilizado.');
            
        try {
            DB::beginTransaction();

            //Registrando a função
            $funcao = $company->funcoes()->create($input);
            $input['company_id'] = $company->id;
            
            DB::commit();

            return redirect()->route('construtoras.funcoes.index', $company->id)->with('success', 'Função cadastrada com sucesso!');
        } catch (\Exception $e) {
            
            DB::rollBack();
            return back()->withErrors($e->getMessage());
            // return back()->with('error', 'Cadastro não realizado!');
        }
    }

    public function edit(Company $company, Funcao $funcao)
    {
        if($funcao->company_id != $company->id) return back()->with(['warning'=>'Recurso não encontrado']);

        $max_date = $funcao->salarios()->max('data_inicio');

        return view('funcoes.edit', compact('company', 'funcao', 'max_date'));
    }

    public function update(Company $company, Funcao $funcao, FuncaoRequest $request)
    {
        $input = $request->all();

        $input['user_id'] = Auth::id();
        try {
            DB::beginTransaction();
            //Atualizando a função    
            $funcao->update($request->all());
            $input['company_id'] = $company->id;
            
            //Registrando o salario
            if($input['salario'] && $input['data_inicio']){
                $funcao->salarios()->create($input);
            }

            DB::commit();
            return redirect()->route('construtoras.funcoes.index', $company->id)->with('success', 'Função atualizada com sucesso!');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('error', 'Atualização não realizada!');
        }
    }

    public function destroy(Company $company, Funcao $funcao)
    {
        try {
            if(!$funcao->firstWhere('company_id', $company->id)->get()){
                return false;
            }       
            
            $funcao->delete();
            
            return back()->with('success', 'Função removida com sucesso!');
        } catch (\Throwable $th) {            
            return back()->with('success', 'Função não removida!');
        }
    }
}
