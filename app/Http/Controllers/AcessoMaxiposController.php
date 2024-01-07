<?php

namespace App\Http\Controllers;

use App\Models\Acessomaxipos;
use Doctrine\DBAL\Schema\View;
use Illuminate\Http\Request;

class AcessoMaxiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filial = session()->get('filial')->id;
        $rows = Acessomaxipos::where('filial_id', $filial)->get();
        return view('acesso_maxipos.index', compact('rows', 'filial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('acesso_maxipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $acesso_maxipos)
    {
        dd($acesso_maxipos->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AcessoMaxipos  $acesso_naxipos
     * @return \Illuminate\Http\Response
     */
    public function show(AcessoMaxipos $acesso_naxipos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AcessoMaxipos  $acesso_naxipos
     * @return \Illuminate\Http\Response
     */
    public function edit(Acessomaxipos $acesso_maxipos)
    {
        return view('acesso_maxipos.edit', compact('acesso_maxipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AcessoMaxipos  $acesso_naxipos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcessoMaxipos $acesso_naxipos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AcessoMaxipos  $acesso_naxipos
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcessoMaxipos $acesso_naxipos)
    {
        //
    }
}
