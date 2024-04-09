<?php

namespace App\Http\Controllers;

use App\Models\Funcao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalarioController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($funcao)
    {
        return view('funcoes.salario.create', compact('funcao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Funcao $funcao)
    {
        //Verifica se o nome existe
        if($funcao->salario()->count() > 0)
            return back()->withInput()->withErrors('Já existe um salário cadastrado.');
            
        try {
            DB::beginTransaction();

            //Registrando a função
            $funcao->salario()->create([
                'funcao_id' => $funcao->id,
                'valor' => $request['valor'],
                'data_atualizacao' => date('Y-m-d'),
            ]);
            
            DB::commit();

            return redirect()->route('filial.funcao.index', $funcao->id)->with('success', 'Função cadastrada com sucesso!');
        } catch (\Exception $e) {
            
            DB::rollBack();
            return back()->withErrors($e->getMessage());
            // return back()->with('error', 'Cadastro não realizado!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcao $funcao)
    {
        $salario = $funcao->salario;
        return view('funcoes.salario.edit', compact('funcao','salario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcao $funcao, $salario)
    {
        //Verifica se o nome existe
        if(!$funcao->salario()->where('funcao_id', $funcao->id)->where('id', $salario)->get())
            return back()->withInput()->with('info', 'Salário não encontrado.');
            
        try {
            DB::beginTransaction();

            //Registrando a função
            $funcao->salario()->update([
                'valor' => $request['valor'],
                'data_atualizacao' => date('Y-m-d'),
            ]);
            
            DB::commit();

            return redirect()->route('filial.funcao.index', $funcao->id)->with('success', 'Salário atualizado com sucesso!');
        } catch (\Exception $e) {
            
            DB::rollBack();
            return back()->withErrors($e->getMessage());
            // return back()->with('error', 'Cadastro não realizado!');
        }
    }
}
