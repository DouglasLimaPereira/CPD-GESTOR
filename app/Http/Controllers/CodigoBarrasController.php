<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DNS1D;
use Pdf;
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

    public function gerarPdf(Request $request) {
        $quantidade_cod = $request->quantidade_cod;
        $codigo = $request->codigo;

        // return Pdf::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
        return Pdf::loadView('Codigo-barras._partials.pdf.codigo-pdf', compact('quantidade_cod', 'codigo'))
        // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
        // ->download
        ->stream('codigo-barra'.$codigo.'.pdf');
    }
}
