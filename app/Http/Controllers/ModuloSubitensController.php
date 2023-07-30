<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubitemRequest;
use App\Models\Modulo;
use App\Models\Moduloitem;
use App\Models\Modulosubitem;
use Illuminate\Http\Request;

class ModuloSubitensController extends Controller
{
    public function index(Modulo $modulo, Moduloitem $item)
    {
        return view('subitens.index', compact('item'));
    }

    public function store(Modulo $modulo, Moduloitem $item ,SubitemRequest $request)
    {
        try {
            $request['modulo_id'] = $modulo->id;
            $item->subitens()->create($request->all());
            return back()->with('success', 'Registro cadastrado com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', 'Cadastro não realizado.');
        }
    }

    public function edit(Modulo $modulo, Moduloitem $item, Modulosubitem $subitem)
    {
        return view('subitens.edit', compact('modulo', 'item', 'subitem'));
    }

    public function update(Modulo $modulo, Moduloitem $item, Modulosubitem $subitem, SubitemRequest $request)
    {
        try {
            $subitem->update($request->all());
            return back()->with('success', 'Registro atualizado com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', 'Atualização não realizada.');
        }
    }

    public function destroy(Modulo $modulo, Moduloitem $item, Modulosubitem $subitem)
    {
        try {
            $subitem->delete();
            return back()->with('success', 'Registro removido com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', 'Cadastro não realizado.');
        }
    } 
}
