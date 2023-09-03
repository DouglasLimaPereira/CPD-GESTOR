<?php

namespace App\Http\Controllers;

use App\Models\Escala;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

class EscalaController extends Controller
{
    public function index(){
        $escalas = Escala::all();   
        $events = [];

        foreach ($escalas as $key => $item) {
            $events[] = [
                'title' => $item->evento,
                'start' => $item->data_inicio,
                'end' => $item->data_fim,
            ];
        }
        
        return view('escala.index', compact('events'));
    }
}
