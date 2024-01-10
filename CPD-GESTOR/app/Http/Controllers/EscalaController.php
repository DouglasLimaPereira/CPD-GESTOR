<?php

namespace App\Http\Controllers;

use App\Models\Escala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EscalaController extends Controller
{
    public function index(){
        $escalas = Escala::all();   
        $escala = [];

        foreach ($escalas as $key => $item) {

            if ($item) {
                $user_nome = User::find($item->user_id)->funcionario->nome;
            }
            
            $escala[] = [
                'id' => $item->id,
                'title' => $item->evento,
                'color' => $item->color,
                'start' => $item->data_inicio,
                'end' => $item->data_fim,
            ];
        }

        if (!(empty($escala))) {
            return view('escala.index', compact('escala','user_nome'));
        }else{
            return view('escala.index', compact('escala'));
        }
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            if ($request['data_inicio'] > $request['data_fim']) {
                return back()->withInput()->with('info', 'Data final da escala não pode ser menor que a data inicial');
            }elseif ($request['data_inicio'] == $request['data_fim'] && $request['hora_fim'] <= $request['hora_inicio'] ) {
                return back()->withInput()->with('info', 'Hora de inicio da escala não pode ser menor ou igual que a hora final');
            }

            if ($request['evento'] == 'ATESTADO MEDICO') {
                $color = '#94a4ad';
            }elseif ($request['evento'] == 'DIA TRABALHADO') {
                $color = '#0b5ed7';
            }elseif ($request['evento'] == 'FOLGA') {
                $color = '#fc8403';
            }elseif ($request['evento'] == 'FOLGA FERIADO') {
                $color = '#1ba67a';
            }elseif ($request['evento'] == 'FOLGA DE ANIVERSARIO') {
                $color = '#13b7d4';
            }elseif ($request['evento'] == 'DSR') {
                $color = '#28a745'; 
            }elseif ($request['evento'] == 'DOMINGO') {
                $color = '#dc3545';
            }
            
            Escala::create([
                'user_id' => auth()->user()->id,
                'evento' => $request['evento'],
                'color' => $color,
                'data_inicio' => $request['data_inicio'].' '.$request['hora_inicio'].':00',
                'data_fim' => $request['data_fim'].' '.$request['hora_fim'].':00',
            ]);
            DB::commit();

            return back()->with('success', 'Escala criada com sucesso!');
        } catch (\Throwable $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->back()->with('info', 'Erro ao Cadastrar Escala');
        }
    }

    public function update(Request $request, Escala $escala){
        try {
            DB::beginTransaction();
            if ($request['data_inicio'] > $request['data_fim']) {
                return back()->withInput()->with('info', 'Data final da escala não pode ser menor que a data inicial');
            }elseif ($request['data_inicio'] == $request['data_fim'] && $request['hora_fim'] <= $request['hora_inicio'] ) {
                return back()->withInput()->with('info', 'Hora de inicio da escala não pode ser menor ou igual que a hora final');
            }

            if ($request['evento'] == 'ATESTADO MEDICO') {
                $color = '#94a4ad';
            }elseif ($request['evento'] == 'DIA TRABALHADO') {
                $color = '#0b5ed7';
            }elseif ($request['evento'] == 'FOLGA') {
                $color = '#fc8403';
            }elseif ($request['evento'] == 'FOLGA FERIADO') {
                $color = '#1ba67a';
            }elseif ($request['evento'] == 'FOLGA DE ANIVERSARIO') {
                $color = '#13b7d4';
            }elseif ($request['evento'] == 'DSR') {
                $color = '#28a745'; 
            }elseif ($request['evento'] == 'DOMINGO') {
                $color = '#dc3545';
            }
            
            $escala->update([
                'user_id' => auth()->user()->id,
                'evento' => $request['evento'],
                'color' => $color,
                'data_inicio' => $request['data_inicio'].' '.$request['hora_inicio'].':00',
                'data_fim' => $request['data_fim'].' '.$request['hora_fim'].':00',
            ]);
            DB::commit();

            return back()->with('success', 'Escala atualizada com sucesso!');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->with('info', 'Erro ao atualizar escala');
        }
    }

    public function destroy(Escala $escala){
        try {
            DB::beginTransaction();
            $escala->delete();
            DB::commit();
            return back()->with('success', 'Escala removida com sucesso!');
        } catch (\Throwable $e) {
            DB::rollback();
            return back()->with('info', 'Erro ao remover Escala!');
        }
    }
}
