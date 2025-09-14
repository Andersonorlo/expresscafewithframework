<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Unidad;

class ProductoController extends Controller
{
    public function sugerencia()
    {
        $productosPorCategoria = $this->obtenerProductosPorCategoria(4);
        return view('index', compact(('productosPorCategoria')));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $unidades   = Unidad::all();
        return view('productos.formulario-productos', compact('categorias', 'unidades'));
    }
}
