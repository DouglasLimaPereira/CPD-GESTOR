<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DNS1D;
use DNS2D;

class CodigoBarrasController extends Controller
{
    public function index(Request $request){
        if ($request['codigo'] == '') {
            return view('Codigo-barras.index');
        }else{
            $codigo = $request['codigo'];
            return view('Codigo-barras.index', compact('codigo'));
        }
    }

    public function gerarCod(Request $request){
        return $request['codigo'];
    }
}
