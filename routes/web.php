<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PainelController,
    ResetaSenhaController,
    UsuarioController,
    ErrositefController,
    EscalaController,
    PontoController
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

Route::group(['prefix'=>'erro-sitef', 'as'=>'erro-sitef.', 'middleware'=>['auth']], function(){
    // MÓDULOS
    Route::get('/', [ErrositefController::class, 'index'])->name('index');
    Route::get('/create', [ErrositefController::class, 'create'])->name('create');
    Route::post('/store', [ErrositefController::class, 'store'])->name('store');
    Route::get('/{erro_sitef}/edit', [ErrositefController::class, 'edit'])->name('edit');
    Route::put('/{erro_sitef}/update', [ErrositefController::class, 'update'])->name('update');
    Route::get('/{erro_sitef}/destroy', [ErrositefController::class, 'destroy'])->name('destroy');
});

    // ROTAS PONTOS
Route::group(['prefix'=>'ponto', 'as'=>'ponto.', 'middleware'=>['auth']], function(){
    Route::get('/index', [PontoController::class, 'index'])->name('index');
    Route::get('create', [PontoController::class, 'create'])->name('create');
    Route::post('store', [PontoController::class, 'store'])->name('store');
    Route::get('{ponto}/edite', [PontoController::class, 'edite'])->name('edite');
    Route::put('{ponto}/update', [PontoController::class, 'update'])->name('update');
    Route::get('{ponto}/show', [PontoController::class, 'show'])->name('show');
    Route::get('{ponto}/destroy', [PontoController::class, 'destroy'])->name('destroy');
    Route::get('hora-extra', [PontoController::class, 'HoraExtra'])->name('hora-extra');
    Route::get('relatorio', [PontoController::class, 'relatorio'])->name('relatorio');
    Route::get('pdf', [PontoController::class, 'pdf'])->name('pdf');
    Route::get('xlsx', [PontoController::class, 'xlsx'])->name('xlsx');
    Route::get('csv', [PontoController::class, 'csv'])->name('csv');
});

// ESCALA
Route::group(['prefix'=>'escala', 'as'=>'escala.', 'middleware'=>['auth']], function(){
    Route::get('/index', [EscalaController::class, 'index'])->name('index');
});