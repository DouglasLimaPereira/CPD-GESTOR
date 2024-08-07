<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filial_id = session()->get('filial')->id;
        $itens = Item::Where('filial_id', $filial_id)->get();
        // dd($itens);
        return view('itens.index', compact('itens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        try {

            $preco1 = str_replace('.','',$request->preco);
            $preco = str_replace(',','.',$preco1);

            DB::beginTransaction();
            Item::create([
                'filial_id' => session()->get('filial')->id,
                'nome' => $request->nome,
                'marca' => $request->marca,
                'serial' => $request->serial,
                'descricao' => $request->descricao,
                'preco' => $preco,
            ]);
            
            DB::commit();
            return redirect()->route('filial.item.index')->with('success', 'Item cadastrado com sucesso.');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollback();
            return back()->with('info', 'Não foi possível cadastrar Item.');
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Itens  $itens
     * @return \Illuminate\Http\Response
     */
    public function show(Item $itens)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Itens  $itens
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        // dd($item->marca);
        return view('itens.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Itens  $itens
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {

        try {

            $preco1 = str_replace('.','',$request->preco);
            $preco = str_replace(',','.',$preco1);

            DB::beginTransaction();
            $item->update([
                'nome' => $request->nome,
                'marca' => $request->marca,
                'serial' => $request->serial,
                'descricao' => $request->descricao,
                'preco' => $preco,
            ]);
            
            DB::commit();
            return redirect()->route('filial.item.index')->with('success', 'Item atualizado com sucesso.');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            DB::rollback();
            return back()->with('info', 'Não foi possível atualizar Item.');
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Itens  $itens
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $itens)
    {
        dd('DESTRUIDO');
    }
}
