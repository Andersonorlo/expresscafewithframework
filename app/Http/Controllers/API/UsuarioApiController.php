<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ProductosPorCategoriaTrait;

class UsuarioApiController extends Controller
{
    use ProductosPorCategoriaTrait;

    public function index(Request $request)
    {
        $usuario = $request->user(); // usuario autenticado con Sanctum

        // Usamos tu Trait para traer productos por categoría
        $productosPorCategoria = $this->obtenerProductosPorCategoria(4);

        return response()->json([
            'usuario' => [
                'id' => $usuario->id,
                'nombre' => $usuario->name,
                'email' => $usuario->email,
            ],
            'productosPorCategoria' => $productosPorCategoria,
        ]);
    }
}
