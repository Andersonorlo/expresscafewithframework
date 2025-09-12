<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;


class UsuarioController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        $productosPorCategoria = [
            'compraCafe' => Producto::where('categoria_id', 1)->take(4)->get(),
            'derivadosCafe' => Producto::where('categoria_id', 2)->take(4)->get(),
            'cultivaCafe' => Producto::where('categoria_id', 3)->take(4)->get(),
            'herramientas' => Producto::where('categoria_id', 4)->take(4)->get(),

        ];

        return view('usuario', compact('usuario', 'productosPorCategoria'));
    }
}
