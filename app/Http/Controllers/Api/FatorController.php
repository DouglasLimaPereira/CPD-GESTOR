<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Canteiro;
use App\Models\Fator;
use Illuminate\Http\Request;

class FatorController extends Controller
{
    public function medicoes(Canteiro $canteiro, Fator $fator)
    {
        //$medicoes = $fator->medicoes->max('data_inicio');
        $retorno = null;
        $tipo = 0;
        $estado = 0;
        $data = 0;
        
        /**
         * Tipos de validações
         * Utilizar este recurso em segundo plano
         */
        //Se medição de mão de obra for própria invalida a edição
        foreach ($canteiro->medicoes as $key => $item)
        {
            if($item->tipo == 1) $tipo++;
            if($item->estado == 2) $estado++;
            if($item->data_inicio >= $fator->data_vigencia) $data++;
        }

        $medicoes = false;
        //Checa se há medições
        if(($tipo > 0) && ($estado > 0) && ($data > 0)) $medicoes = true;
        
        return response()->json($medicoes);
    }
}
