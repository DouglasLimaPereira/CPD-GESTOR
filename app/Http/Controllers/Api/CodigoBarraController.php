<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CodigoBarraController extends Controller
{
    public function gerarCod($codigo){
        return response()->json($codigo);
    }
}
