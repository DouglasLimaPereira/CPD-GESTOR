<?php

namespace App\Http\Controllers;

use App\Models\Escala;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

class EscalaController extends Controller
{
    public function index(){
        $escalas = Escala::all();   
        $escala = [];

        foreach ($escalas as $key => $item) {
            $escala[] = [
                'id' => $item->id,
                'title' => $item->evento,
                'start' => $item->data_inicio,
                'end' => $item->data_fim,
            ];
        }
        
        return view('escala.index', compact('escala'));
    }

    public function store(Request $request){
        dd($request->all());
    }

    public function update(Request $request, Escala $escala){
        dd($request->all());
    }
}
