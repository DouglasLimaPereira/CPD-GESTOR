<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DNS1D;
use DNS2D;

class CodigoBarrasController extends Controller
{
    public function index(Request $request){
        if ($request['codigo'] != '') {
            $codigo = $request['codigo'];
            return view('Codigo-barras.index', compact('codigo'));
        }else{
            return view('Codigo-barras.index');
        }
    }
}
