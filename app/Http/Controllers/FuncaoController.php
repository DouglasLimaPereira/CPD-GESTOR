<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FuncaoRequest;
use App\Models\Canteiro;
use App\Models\Company;
use App\Models\Filial;
use App\Models\Funcao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FuncaoController extends Controller
{
    public function index()
    {
        $filial = session('filial')->id;
        $rows = Funcao::where('filial_id', $filial)->get();
        return view('funcoes.index', compact('rows', 'filial'));
    }

    public function create(Filial $filial)
    {
        return view('funcoes.create', compact('filial'));
    }

    public function store(Filial $filial, Request $request)
    {
        $input = $request->all();
        
        //Verifica se o nome existe
        if($filial->funcoes->where('nome', $request->nome)->count() > 0)
            return back()->withInput()->withErrors('O nome informado já está sendo utilizado.');
            
        try {
            DB::beginTransaction();

            //Registrando a função
            $input['filial_id'] = $filial->id;
            $funcao = $filial->funcoes()->create($input);
            
            DB::commit();

            return redirect()->route('filial.funcao.index', $filial->id)->with('success', 'Função cadastrada com sucesso!');
        } catch (\Exception $e) {
            
            DB::rollBack();
            return back()->withErrors($e->getMessage());
            // return back()->with('error', 'Cadastro não realizado!');
        }
    }

    public function edit(Filial $filial, Funcao $funcao)
    {
        if($funcao->filial_id != $filial->id) return back()->with(['warning'=>'Registro não encontrado na filial']);

        return view('funcoes.edit', compact('funcao', 'filial'));
    }

    public function update(Filial $filial, Funcao $funcao, Request $request)
    {
        $input = $request->all();

        $input['user_id'] = Auth::id();
        try {
            DB::beginTransaction();
            //Atualizando a função    
            // $input['filial_id'] = $filial->id;
            $funcao->update($request->all());
            
            //Registrando o salario
            // if($input['salario']){
            //     $funcao->salarios()->create($input);
            // }

            DB::commit();
            return redirect()->route('filial.funcao.index', $filial->id)->with('success', 'Função atualizada com sucesso!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors($th->getMessage());

            // return back()->with('error', '$th->getAtualização não realizada!');
        }
    }

    public function destroy(Filial $filial, Funcao $funcao)
    {
        try {
            if(!$funcao->firstWhere('filial_id', $filial->id)->get()){
                return false;
            }       
            
            $funcao->delete();
            
            return back()->with('success', 'Função removida com sucesso!');
        } catch (\Throwable $th) {            
            return back()->with('info', 'Função não removida!');
        }
    }
}
