<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CanteiroController;
use App\Http\Controllers\Api\FatorController;
use App\Http\Controllers\Api\PessoaController;
use App\Http\Controllers\Api\ErrositefController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//CANTEIROS
Route::post('canteiros/{canteiro}/remove-image', [CanteiroController::class, 'removeImage'])->name('api.canteiros.remove-image');

//COMPANIES
Route::get('company/{company}/funcionarios', [CompanyController::class, 'funcionarios'])->name('api.company.funcionarios');

//FATORES
Route::get('canteiros/{canteiro}/fatores/{fator}/medicoes', [FatorController::class, 'medicoes'])->name('api.fatores.medicoes');

Route::get('gera-senha', function(){
    return response()->json(geraSenha());
});

Route::get('/companies/{company_id}/pessoas/{id}/get-email', [PessoaController::class, 'getEmail'])->name('pessoa.getemail');

Route::get('errossitef/{cod_erro}/consultar', [ErrositefController::class, 'consultar'])->name('api.consultar_erro_sitef');
