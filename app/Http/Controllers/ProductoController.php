<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;

class ProductoController extends Controller
{
    //aqui hay una validacion de datos 
    public function store(Request $request){

    $request->validate([
        'nombre' => 'required|string|max:100',
        'descripcion' => 'nullable|string|max:255',
        'valor' => 'nullable|numeric',
        'categoria_id' => 'required|exists:categorias,id',
        'unidad_id' => 'required|exists:unidades,id',
        'imagen' => 'nullable|image|max:2048',
    ]);
    //valida si hay imagenes o no para evitar errores
    $imagenPath = null;
    if($request->hasFile('imagen')){
        $imagenPath = $request->file('imagen')->store('productos', 'public');
    }

    //aqui para crear un producto
    $producto = new Producto();
    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->valor = $request->valor;
    $producto->categoria_id = $request->categoria_id;
    $producto->unidad_id = $request->unidad_id;
    $producto->imagen = $imagenPath;
    $producto->user_id = Auth::id();
    $producto->save();

    return redirect()->back()->with('success', 'Producto guardado correctamente');

    }

    public function create() {
        
        $categorias = \App\Models\Categoria::all();
        $unidades = \App\Models\Unidad::all();

        return view('productos.formulario-productos', compact('categorias', 'unidades'));
    }

    public function sugerencia(){

        $productosPorCategoria = [
            'compraCafe' => Producto::where('categoria_id', 1)->take(4)->get(),
            'derivadosCafe' => Producto::where('categoria_id', 2)->take(4)->get(),
            'cultivaCafe' => Producto::where('categoria_id', 3)->take(4)->get(),
            'herramientas' => Producto::where('categoria_id', 4)->take(4)->get(),
        ];

        return view('index', compact(('productosPorCategoria')));

    }
}
