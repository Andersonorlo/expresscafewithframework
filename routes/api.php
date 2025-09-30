<?php

use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\ProductoApiController;
use App\Http\Controllers\API\UsuarioApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthApiController::class, 'login']);

Route::post('/registro', [AuthApiController::class, 'registro']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/perfil', [AuthApiController::class, 'perfil']);
    Route::post('/logout', [AuthApiController::class, 'logout']);

    Route::get('/usuario', [UsuarioApiController::class, 'index']);
    Route::get('/vender', [ProductoApiController::class, 'create']);
    Route::post('/productos', [ProductoApiController::class, 'store']);
});
