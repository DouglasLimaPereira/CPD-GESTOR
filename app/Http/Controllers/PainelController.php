<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Ponto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class PainelController extends Controller
{
    public function index()
    {
        #-----------------------------------------------------------------------------------
        #| Verificando se a data atual é maior que dia 21 e menor que dia 1 do próximo mês |
        #-----------------------------------------------------------------------------------
        if (carbon::now() >= carbon::now()->day(21) && carbon::now() < carbon::now()->add(1, 'month')->day(1)) {
            #------------------------------------------
            #| Criando a data inícial a ser comparada |
            #------------------------------------------
            $data_inicio = carbon::now()->day(21)->toDateString();
            #----------------------------------------
            #| Criando a data final a ser comparada |
            #----------------------------------------
            $data_fim = carbon::now()->toDateString();
        
        }else {
            #----------------------------------------------------------------------------------------------------
            #| Caso não caia na condição acima pega o dia 21 do mês anterior e dia atual do mês  a ser comparado|
            #----------------------------------------------------------------------------------------------------

            #------------------------------------------
            #| Criando a data inícial a ser comparada |
            #------------------------------------------
            $data_inicio = carbon::now()->sub('1 month')->day(21)->toDateString();
            
            #---------------------------------------
            #| Criando a data final a ser comparda |
            #---------------------------------------
            $data_fim = carbon::now()->toDateString();

        }

        #------------------------------
        #| Recebendo o usuario logado |
        #------------------------------
        $user = auth()->user(); 

        #-----------------------------------------------------------------------------------
        #| Recebendo os registros do ponto onde se enquadra entre as datas de inicio e fim |
        #-----------------------------------------------------------------------------------
        $pontos = $user->pontos()->whereBetween('data', [$data_inicio, $data_fim])->orderBy('data', 'asc')->where('tipo', 1)->get();
        
        #---------------------------------
        #| Iniciando a hora extra zerada |
        #---------------------------------
        $hora_extra = carbon::create('00','00','00');

        #------------------------------------
        #| Iniciando a hora negativa zerada |
        #------------------------------------
        $hora_negativas = carbon::create('00','00','00');

        foreach ($pontos as $key => $ponto) {
            if ($ponto->horas_extras != '00:00:00') {
                $horas = explode(':', $ponto->horas_extras);
                $hora_extra->addHours($horas[0]);
                $hora_extra->addMinutes($horas[1]);
                $hora_extra->addSeconds($horas[2]);
                
            } elseif ($ponto->horas_negativas != '00:00:00') {
                $horas = explode(':', $ponto->horas_negativas);
                $hora_negativas->addHours($horas[0]);
                $hora_negativas->addMinutes($horas[1]);
                $hora_negativas->addSeconds($horas[2]);

            }
        }
        
        #---------------------------------------------
        #| Calculando horas negativas e horas extras |
        #---------------------------------------------
        if ($hora_extra->toTimeString() != '00:00:00') {
            if ($hora_extra > $hora_negativas) {
                $hora_n = explode(':', $hora_negativas->toTimeString());  
                if ($hora_n[0] != '00')
                    $hora_extra->subHours($hora_n[0]);
                if ($hora_n[1] != '00')
                    $hora_extra->subMinutes($hora_n[1]);
                if ($hora_n[2] != '00')
                    $hora_extra->subSeconds($hora_n[2]);
            }else{
                $hora_x = explode(':', $hora_extra->toTimeString());  
                if ($hora_x[0] != '00')
                    $hora_negativas->subHours($hora_x[0]);
                    $hora_extra->subHours($hora_x[0]);
                if ($hora_x[1] != '00')
                    $hora_negativas->subMinutes($hora_x[1]);
                    $hora_extra->subMinutes($hora_x[1]);
                if ($hora_x[2] != '00')
                    $hora_negativas->subSeconds($hora_x[2]);
                    $hora_extra->subSeconds($hora_x[2]);
            }
        }
    
        #------------------------------------
        #| Convertendo horários para String |
        #------------------------------------
        $hora_extra = $hora_extra->toTimeString();
        $hora_negativas = $hora_negativas->toTimeString();

        // foreach ($pontos as $key => $ponto) {
        //     dd($ponto);
        // }
        
        $registro_horas = array();
        foreach ($pontos as $ponto){
            $registro_horas = [
                'dia' => date('d', strtotime($ponto->data)),
                'horas_extras' => $ponto->horas_extras,
                'horas_negativas' => $ponto->horas_negativas,
            ];
        };

        // dd($registro_horas);
        return view('painel.index', compact('hora_extra','registro_horas'));
    }
}
