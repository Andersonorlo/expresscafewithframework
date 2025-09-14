<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoApiController extends Controller
{
    public function store(Request $request)
    {
        //valida los datos
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:255',
            'valor' => 'nullable|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'unidad_id' => 'required|exists:unidades,id',
            'imagen' => 'nullable|image|max:2048',
        ]);

        //opcional por pruebas, pero es para subir una imagen si existe
        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('productos', 'public');
        }

        // Crear producto
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->valor = $request->valor;
        $producto->categoria_id = $request->categoria_id;
        $producto->unidad_id = $request->unidad_id;
        $producto->imagen = $imagenPath;
        $producto->user_id = $request->user()->id; // viene del token
        $producto->save();

        return response()->json([
            'mensaje' => 'Producto guardado correctamente',
            'producto' => $producto
        ], 201);
    }
}
