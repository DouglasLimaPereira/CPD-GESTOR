<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class CheckListController extends Controller
{
    public function abertura(){
        $data = Date('D/m/Y');
        return $data;
    }

    public function fechamento_index(){
        return view('checklist.abertura_fechamento.index');
    }

    public function index(){
        // $hoje = $this->Datatual();
        // dd($hoje);
        $check_lists = [];
        return view('checklist.index', compact('check_lists'));
    }
    
    public function create(){
        return View('checklist.create');
    }
}
