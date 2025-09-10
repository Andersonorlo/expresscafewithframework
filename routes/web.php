<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ProductoController;


Route::get('/', function(){
    if (session()->has('usuario_id')) {
        return redirect()->route('dashboard');
    }
    return view('index');
})->name('inicio');

Route::get('/registro', [AuthController::class, 'mostrarFormularioRegistro'])->name('registro.form');
Route::post('/registro', [AuthController::class, 'registrarUsuario'])->name('registro.enviar');

Route::get('/login', [AuthController::class, 'mostrarFormularioLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'iniciarSesion'])->name('login.enviar');

Route::get('/dashboard', [AuthController::class, 'mostrarDashboard'])->name('dashboard');

Route::get('/logout', function(){
    session()->forget('usuario_id');
    return redirect()->route('login.form');
})->name('logout');

Route::get('/compracafe',[VentasController::class, 'compracafe'])->name('compracafe');
Route::get('/derivadoscafe',[VentasController::class, 'derivadoscafe'])->name('derivadoscafe');
Route::get('/cultivacafe',[VentasController::class, 'cultivacafe'])->name('cultivacafe');
Route::get('/herramientas',[VentasController::class, 'herramientas'])->name('herramientas');

Route::post('/producto', [ProductoController::class, 'store'])->name('producto');