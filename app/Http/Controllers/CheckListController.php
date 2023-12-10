<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\Facade\Pdf;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use Pdf;

class CheckListController extends Controller
{
    public function abertura() {
        $data = Date('D/m/Y');
        return $data;
    }

    public function fechamento_index(){

        return Pdf::loadView('checklist.abertura_fechamento.index')
        ->stream('check-list_fechamento.pdf');

        // return Pdf::loadFile(public_path().'/myfile.html')->save('/path-to/my_stored_file.pdf')->stream('download.pdf');
        // return Pdf::loadView('checklist.abertura_fechamento.index')
        // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
        // ->download
        // ->stream('checklist.pdf');
        // return view('checklist.abertura_fechamento.index');
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
