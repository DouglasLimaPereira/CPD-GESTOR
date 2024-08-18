<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcularSenhaController extends Controller
{
    //

    public function index() {
        $dia = (int) date('d');
        $mes = (int) date('n');
        $valor = (int)($dia . $mes);

        return view('senha-pdv.index', compact('valor'));
    }
}
