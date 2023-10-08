<?php

use App\Http\Controllers\Api\PessoaController;
use App\Http\Controllers\Api\ErrositefController;
use Illuminate\Support\Facades\Route;

Route::get('/companies/{company_id}/pessoas/{id}/get-email', [PessoaController::class, 'getEmail'])->name('pessoa.getemail');

Route::get('errositef/codigo/{cod_erro}/consultar', [ErrositefController::class, 'consultar'])->name('api.consultar_erro_sitef');
