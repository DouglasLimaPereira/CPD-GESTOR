<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Milon\Barcode\Facades\DNS1DFacade;

class CodigoBarraController extends Controller
{
    public function gerarCod($codigo){
        // $codigo_ = '<img src="data:image/png;base64,{{DNS1D::getBarcodePNG("'+$codigo+'", "EAN13",1,53,array(1,1,1), true)}}" alt="barcode"/>';
        $codigo = '<img src="data:image/png;base64,' . DNS1DFacade::getBarcodePNG($codigo, 'EAN13',1.1,53,array(1,1,1), true) . '" alt="barcode"   />';
        return response()->json($codigo);
    }
}
