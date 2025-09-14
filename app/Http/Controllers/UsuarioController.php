<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\ProductosPorCategoriaTrait;

class UsuarioController extends Controller
{
    use ProductosPorCategoriaTrait;

    public function index()
    {
        $productosPorCategoria = $this->obtenerProductosPorCategoria(4);
        return view('usuario', compact('productosPorCategoria'));
    }
}
