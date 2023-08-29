<?php

namespace App\Recursos;

use Illuminate\Http\Request;
use App\Models\Ponto;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime\DateTime;
use Illuminate\Support\Str;

class HoraExtra
{
    public function calcularHoraExtra($request = null)
    {
        // ----------------------------------
        // Setando a hora local Português/Brasil e a zona Ameria/Fortaleza
        // ----------------------------------
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Fortaleza');

        // ----------------------------------
        // Recebendo as batidas do ponto e quebrando-as em um Array após ' : ' 
        // ----------------------------------
        $dt = new Carbon();
        $k1 = explode(':', $request->entrada);
        $k2 = explode(':', $request->entrada_almoco);
        $k3 = explode(':', $request->saida_almoco);
        $k4 = explode(':', $request->saida);

        // ------------------------------------------------
        // adicionando as horas trabalhadas = 7:20:00 horas
        // -------------------------------------------------
        $carga_horaria = new Carbon('7:20:00'); 
        
        // ----------------------------------
        // adicionando as horas de entrada
        // ----------------------------------
        $entrada = new Carbon($request->entrada);
        
        // ----------------------------------
        // adicionando as horas de entrada do almoco
        // ----------------------------------
        $entrada_almoco = new Carbon($request->entrada_almoco);
        
        // ----------------------------------
        // construindo a hora de retoro do almoco
        // ----------------------------------
        $saida_almoco =  new Carbon($request->saida_almoco);
        
        // ----------------------------------
        // construindo a hora de saida
        // ----------------------------------
        $saida =  new Carbon($request->saida);
        
        // ----------------------------------
        // calcular a 1 batida do ponto
        // ----------------------------------
        $b1 = $entrada_almoco->subHour($k1[0]);
        $b1 = $entrada_almoco->subMinutes($k1[1]);

        // ----------------------------------
        // Calcular a segunda batida do ponto
        // ----------------------------------
        $b2 = $saida->subHour($k3[0]);
        $b2 = $saida->subMinutes($k3[1]);
        
        // --------------------------------------------------------
        // Recebendo as horas e os minutos total da segunda batida'
        // --------------------------------------------------------
        $h2 = date('H',strtotime($b2));
        $m2 = date('i',strtotime($b2));
        
        // -----------------------------------------------------------------------------------------
        // Somando as Horas da primeira batida com a segunda batida e recebendo como hora trabalhada
        // -----------------------------------------------------------------------------------------
        $horas_trabalhadas = $b1->add($h2, 'hour');
        $horas_trabalhadas = $b1->add($m2, 'minutes');

        // ------------------------------------------------------------------------
        // Recebendo a diferença de horas emtre carga horaria e horas trabalhadas
        // ------------------------------------------------------------------------
        $horas_extras = $carga_horaria->diff($horas_trabalhadas);

        // ------------------------------------------------------------------------
        // Formatando a diferença de horas emtre carga horaria e horas trabalhadas
        // ------------------------------------------------------------------------
        $result_extras = $horas_extras->format('%R %H:%I:%S');
        
        // ------------------------------------------------------------------------
        // extraindo o sinal da hora ( - ou + )
        // ------------------------------------------------------------------------
        return $verificacao = explode(' ', $result_extras);
        
    }
}