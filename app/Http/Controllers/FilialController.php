<?php

namespace App\Http\Controllers;

use App\Models\Filial;
use App\Models\Estado;
use App\Http\Requests\StoreFilialRequest;
use App\Http\Requests\UpdateFilialRequest;
use Illuminate\Support\Facades\DB;

class FilialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filial = Filial::find(session()->get('filial'));
        $instagram = $instagram = explode('/', $filial->instagram)[3];
        return view('filial.index', compact('filial', 'instagram'));
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
     * @param  \App\Http\Requests\StoreFilialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function show(Filial $filial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function edit(Filial $filial)
    {
        $estados = Estado::all();
        return view('filial.edit', compact('filial', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFilialRequest  $request
     * @param  \App\Models\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFilialRequest $request, Filial $filial)
    {
        try {
            DB::beginTransaction();
            
            $filial->update($request->all());

            DB::commit();
            return redirect()->route('filial.index', $filial->id)->with('success', 'Filial atualizada com sucesso!');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->withInput()->with('info', 'Erro ao atualizar Filial');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filial  $filial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filial $filial)
    {
        //
    }
}
