<?php

use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\ProductoApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthApiController::class, 'login']);

Route::post('/registro', [AuthApiController::class, 'registro']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/perfil', [AuthApiController::class, 'perfil']);
    Route::post('/logout', [AuthApiController::class, 'logout']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/productos', [ProductoApiController::class, 'store']);
});
