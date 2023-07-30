<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CanteiroController,
    CompanyController,
    FuncaoController,
    FuncionarioController,
    PainelController,
    ResetaSenhaController,
    UsuarioController,
    ErrositefController,
    ModuloItemController,
    ModuloSubitensController,
    ModuloPermissaoController
};

//use App\Http\Controllers\Api\FatorController;
use App\Http\Controllers\Authentication\LoginController;

Route::get('eh-teste', function(){
    return storage_path();
    $e = url('/') . ' - ' . env('APP_URL_CLIENTE') . ' - ' . env('APP_DEV_URL_CLIENTE');
    return $e;
});

Route::get('/', function () {
    if(auth()->user()) return redirect()->route('painel.index');
    return view('authentication.login');
});
Route::get('/login', function () {
    if(auth()->user()) return redirect()->route('painel.index');
    return view('authentication.login');
})->name('login');

// Rotas para Redefinição de Senha 
Route::group(['prefix'=>'reseta-senha'], function(){
    Route::post('/send-mail', [ResetaSenhaController::class, 'sendMail'])->name('resetasenha.sendmail');
    Route::get('/{token}', [ResetaSenhaController::class, 'resetView'])->middleware('guest')->middleware('guest')->name('password.reset');
    Route::post('/update', [ResetaSenhaController::class, 'update'])->name('password.update');
});


Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->get('painel', [PainelController::class, 'index'])->name('painel.index');

// SUPERADMIN USUÁRIOS
Route::group(['prefix' => 'usuarios'], function(){
    Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/{usuario}/show', [UsuarioController::class, 'show'])->name('usuarios.show');
    Route::get('/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::get('/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/{usuario}/update', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::get('/{usuario}/destroy', [UsuarioController::class, "destroy"])->name('usuarios.destroy');
    Route::post('/store', [UsuarioController::class, 'store'])->name('usuarios.store');
});

Route::group(['prefix'=>'erro-sitef', 'middleware'=>['auth']], function(){
    // MÓDULOS
    Route::get('/', [ErrositefController::class, 'index'])->name('erro-sitef.index');
    Route::get('/create', [ErrositefController::class, 'create'])->name('erro-sitef.create');
    Route::post('/store', [ErrositefController::class, 'store'])->name('erro-sitef.store');
    Route::get('/{erro_sitef}/edit', [ErrositefController::class, 'edit'])->name('erro-sitef.edit');
    Route::put('/{erro_sitef}/update', [ErrositefController::class, 'update'])->name('erro-sitef.update');
    Route::get('/{erro_sitef}/destroy', [ErrositefController::class, 'destroy'])->name('erro-sitef.destroy');
});