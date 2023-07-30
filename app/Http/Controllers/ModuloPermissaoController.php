<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Models\Moduloitem;
use App\Models\Modulosubitem;
use App\Models\Modulosubitempermissao;
use App\Models\Permissao;
use Illuminate\Http\Request;

class ModuloPermissaoController extends Controller
{
    public function index(Modulo $modulo, Moduloitem $item, Modulosubitem $subitem)
    {
        $permissoes = Permissao::orderBy('nome')->get();
        
        return view('permissoes.index', compact('modulo', 'item', 'subitem', 'permissoes'));
    }

    public function store(Modulo $modulo, Moduloitem $item, Modulosubitem $subitem, Request $request)
    {
        try {
            
            if(isset($request->permissao_id)){
                
                // $subitem->permissoes()->delete();
                $subitem->permissoes()->sync($request->permissao_id);
            }
            return back()->with('success', 'Registro realizado com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
            return back()->with('error', 'Registro não realizado.');
        }
        
    }
    
    //VINCULADOS AO ITEM
    // public function index(Modulo $modulo, Moduloitem $item)
    // {
    //     $permissoes = Permissao::orderBy('nome')->get();

    //     return view('permissoes.index', compact('modulo', 'item', 'permissoes'));
    // }

    // public function store(Modulo $modulo, Moduloitem $item, Request $request)
    // {
    //     try {
            
    //         if(isset($request->permissao_id)){
    //             $item->permissoes()->detach();
    //             $item->permissoes()->attach($request->permissao_id);
    //         }
    //         return back()->with('success', 'Registro realizado com sucesso.');
    //     } catch (\Exception $e) {
    //         return back()->with('error', 'Registro não realizado.');
    //     }
        
    // }
}
