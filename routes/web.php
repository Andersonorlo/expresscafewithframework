<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentasController;


Route::get('/', [IndexController::class, 'index'])->name('inicio');
Route::get('/registro', [AuthController::class, 'mostrarFormularioRegistro'])->name('registro.form');
Route::view('/login', 'login')->name('login.form');

Route::view('/usuario', 'usuario')->name('usuario');
Route::get('/vender', [ProductoController::class, 'create'])->name('productos.create');

Route::get('/compracafe', [VentasController::class, 'compracafe'])->name('compracafe');
Route::get('/derivadoscafe', [VentasController::class, 'derivadoscafe'])->name('derivadoscafe');
Route::get('/cultivacafe', [VentasController::class, 'cultivacafe'])->name('cultivacafe');
Route::get('/herramientas', [VentasController::class, 'herramientas'])->name('herramientas');
