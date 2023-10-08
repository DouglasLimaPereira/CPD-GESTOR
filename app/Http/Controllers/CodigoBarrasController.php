<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DNS1D;
use DNS2D;

class CodigoBarrasController extends Controller
{
    public function index(){
        return view('Codigo-barras.index');
    }

    public function gerarCod(Request $request){
        // DNS1D::getBarcodePNG('4', 'C39+',3,33,array(1,1,1), true)
        // $cod = DNS1D::getBarcodeHTML((string) time(), 'EAN13');
        $codigo = 'data:image/png;base64,' . DNS1D::getBarcodePNG($request['codigo'], 'EAN13', true);
        return view('Codigo-barras.index', compact('codigo'));
    }
}
