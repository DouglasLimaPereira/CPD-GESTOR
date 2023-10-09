<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DNS1D;
use DNS2D;

class CodigoBarrasController extends Controller
{
    public function index(Request $request){
        return view('Codigo-barras.index');
    }
}
