<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Errositef;
use Illuminate\Http\Request;

class ErrositefController extends Controller
{
    public function consultar($cod_erro){
        $erro = Errositef::firstWhere('codigo', $cod_erro);
        return response()->json($erro);
    }
}