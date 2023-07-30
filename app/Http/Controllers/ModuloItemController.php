<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Requests\SubitemRequest;
use App\Models\Modulo;
use App\Models\Moduloitem;
use Illuminate\Http\Request;

class ModuloItemController extends Controller
{
    public function index(Modulo $modulo)
    {
        return view('itens.index', compact('modulo'));
    }

    public function store(Modulo $modulo, ItemRequest $request)
    {
        try {
            $modulo->itens()->create($request->all());
            return back()->with('success', 'Registro cadastrado com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', 'Cadastro não realizado.');
        }
    }

    public function edit(Modulo $modulo, Moduloitem $item)
    {
        return view('itens.edit', compact('modulo', 'item'));
    }

    public function update(Modulo $modulo, Moduloitem $item, ItemRequest $request)
    {
        try {
            $item->update($request->all());
            return back()->with('success', 'Registro atualizado com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', 'Atualização não realizada.');
        }
    }

    public function destroy(Modulo $modulo, Moduloitem $item)
    {
        try {
            $item->delete();
            return back()->with('success', 'Registro removido com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', 'Cadastro não realizado.');
        }
    } 
}
