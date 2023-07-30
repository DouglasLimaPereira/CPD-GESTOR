<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Canteiro;
use App\Models\Fator;
use App\Models\Medicao;

class FatorController extends Controller
{
    public function index(Company $company, Canteiro $canteiro)
    {
        $indices = $canteiro->fatores;

        $medicoes = Medicao::where('canteiro_id', $canteiro->id)->get();

        $indices->map(function($item, $key) use ($medicoes){
            $item['primeira_vigencia'] = false;
            $item['remover'] = true;
            if($item->data_vigencia == '1900-01-01')
                $item['primeira_vigencia'] = true;
            $count_medicoes = 0;
            if($medicoes->count() > 0){
                foreach ($medicoes as $key => $medicao) {
                    if(($medicao->tipo == 1) && ($medicao->estado == 2) && ($medicao->data_termino >= $item->data_vigencia))
                        $count_medicoes++;
                }
            }
            if($count_medicoes > 0)
                $item['remover'] = false;
            
        });
        //dd($indices);
        return view('canteiros.indices.index', compact('company', 'canteiro', 'indices'));
    }

    public function store(Company $company, Canteiro $canteiro, Request $request)
    {
        $request['cad_user_id'] = auth()->id();

        // Validando alguns valores
        if(($request->indice_produtivo == 0) || ($request->indice_improdutivo == 0) || ($request->indice_feriado == 0) || (!$request->data_vigencia))
            return back()->with('error', 'Não pode haver índice vazio ou igual a 0 (zero) e nem data de vigência vazia.');
        
        // Validando a data de vigência
        $count_vigencias = 0;
        if($canteiro->fatores->count() > 0)
        {
            foreach ($canteiro->fatores as $key => $indice) {
                if($indice->data_vigencia >= $request->data_vigencia)
                    $count_vigencias++;
            }
        }
        if($count_vigencias > 0)
            return back()->with('error', 'Existe registro de índice de horas extras com vigência igual ou superior a data informada.');

        // Validando a existência de medições
        $medicoes = Medicao::where('canteiro_id', $canteiro->id)->get();
        $count_medicoes = 0;
        if($medicoes->count() > 0){
            foreach ($medicoes as $key => $medicao) {
                if(($medicao->tipo == 1) && ($medicao->estado == 2) && ($medicao->data_termino >= $request->data_vigencia))
                    $count_medicoes++;
            }
        }
        if($count_medicoes > 0)
            return back()->with('error', 'Existe medição com data posterior ou igual a data de vigência informada.');

        try {
            $canteiro->fatores()->create($request->all());

            return back()->with('success', 'Registro realizado com sucesso.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Registro não realizado');
        }
    }

    public function update(Company $company, Canteiro $canteiro, Request $request)
    {
        // Obtendo dados
        $fator = Fator::where('canteiro_id', $request->canteiro_id)->firstWhere('id', $request->indice_id);

        // Validando alguns valores
        if(($request->indice_produtivo == 0) || ($request->indice_improdutivo == 0) || ($request->indice_feriado == 0) || (!$request->data_vigencia))
            return back()->with('error', 'Não pode haver índice vazio ou igual a 0 (zero) e nem data de vigência vazia.');

        // Validando a existência de medições
        $medicoes = Medicao::where('canteiro_id', $canteiro->id)->get();
        $count_medicoes = 0;
        if($medicoes->count() > 0){
            foreach ($medicoes as $key => $medicao) {
                if(($medicao->tipo == 1) && ($medicao->estado == 2) && ($medicao->data_termino >= $request->data_vigencia))
                    $count_medicoes++;
            }
        }
        if($count_medicoes > 0)
            return back()->with('error', 'Existe medição com data posterior ou igual a data de vigência informada.');

        //Validando as datas anteriores e posteriores
        $data_vigencia_anterior = $canteiro->fatores()->where('data_vigencia', '<', $fator->data_vigencia)->max('data_vigencia');
        $data_vigencia_posterior = $canteiro->fatores()->where('data_vigencia', '>', $fator->data_vigencia)->min('data_vigencia');
        
        if($data_vigencia_anterior && ($data_vigencia_anterior >= $request->data_vigencia))
            return back()->with('error', 'Existe registro no histórico de índices de horas extras com vigência igual ou posterior a data informada.');

        if($data_vigencia_posterior && ($data_vigencia_posterior <= $request->data_vigencia))
            return back()->with('error', 'Existe registro no histórico de índices de horas extras com vigência igual ou anterior a data informada.');


        try {
            $fator->update($request->all());

            return back()->with('success', 'Registro atualizado com sucesso.');
        } catch (\Throwable $th) {
            return back()->with('success', 'Registro não atualizado.');
        }
    }

    public function destroy(Company $company, Canteiro $canteiro, Fator $fator)
    {
        $medicoes = Medicao::where('canteiro_id', $canteiro->id)->get();
        $count_medicoes = 0;
        if($medicoes->count() > 0){
            foreach ($medicoes as $key => $medicao) {
                if(($medicao->tipo == 1) && ($medicao->estado == 2) && ($medicao->data_termino >= $fator->data_vigencia))
                    $count_medicoes++;
            }
        }
        if($count_medicoes > 0)
            return back()->with('error', 'Existe medição com data posterior ou igual a data de vigência informada.');
        
        try {
            $fator->delete();

            return back()->with('success', 'Registro removido com sucesso.');
        } catch (\Throwable $th) {
            return back()->with('success', 'Registro não removido.');
        }
    }

    // public function destroy(Fator $fator)
    // {
    //         //Exclusão de fatores
    //         try {
    //             $fator->delete();
    //             return back()->with('success', 'Fator removido com sucesso.');
    //         } catch (\Throwable $th) {
    //             return back()->with('error', 'Não foi possível remover este fator.');
    //         } 
    // }
}
