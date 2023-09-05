<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Errositef;
use Illuminate\Http\Request;

class ErrositefController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->codigo);
        // $erro_sitef = Errositef::all();
        // dd($rows);
        return view('erro-sitef.index');
    }

    public function create()
    {
        return view('erro-sitef.create');
    }

    public function store(Request $request)
    {
        try {
            // dd($request);
            $erro_sitef = Errositef::create($request->all());
            return redirect()->route('erro-sitef.index')->with('success', 'Registro cadastrado com sucesso.');
        
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return back()->with('warning', 'Cadastro não realizado.');
        }
    }

    public function edit(Errositef $erro_sitef)
    {
        return view('erro-sitef.edit', compact('erro_sitef'));
    }

    public function update(Errositef $erro_sitef, Request $request)
    {
        try {

            $erro_sitef->update($request->all());
            
            return redirect()->route('erro-sitef.index')->with('success', 'Registro atualizado com sucesso.');
        
        } catch (\Exception $e) {
            return back()->with('warning', 'Cadastro não atualizado.');
        }
    }

    public function destroy(Errositef $erro_sitef)
    {
        try {
            $erro_sitef->delete();

            return redirect()->route('erro-sitef.index')->with('success', 'Registro removido com sucesso.');
        } catch (\Exception $e) {
            return back()->with('warning', 'Cadastro não removido.');
        }
    }
}
