<?php

namespace App\Http\Controllers;

use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

class EscalaController extends Controller
{
    public function index(){
        
        return view('escala.index');
    }
}
