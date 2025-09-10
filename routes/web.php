<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DashboardController;


Route::get('/', function(){
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('index');
})->name('inicio');

Route::get('/registro', [AuthController::class, 'mostrarFormularioRegistro'])->name('registro.form');
Route::post('/registro', [AuthController::class, 'registrarUsuario'])->name('registro.enviar');

Route::get('/login', [AuthController::class, 'mostrarFormularioLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'iniciarSesion'])->name('login.enviar');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/logout', function(){
    Auth::logout();
    return redirect()->route('login.form')->with('success', 'Sesion cerrada');
})->name('logout');

Route::get('/compracafe',[VentasController::class, 'compracafe'])->name('compracafe');
Route::get('/derivadoscafe',[VentasController::class, 'derivadoscafe'])->name('derivadoscafe');
Route::get('/cultivacafe',[VentasController::class, 'cultivacafe'])->name('cultivacafe');
Route::get('/herramientas',[VentasController::class, 'herramientas'])->name('herramientas');

Route::post('/producto', [ProductoController::class, 'store'])->name('producto');