<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Producto;

class VentasController extends Controller
{
    public function compracafe(){
        $productos = Producto::where('categoria_id', 1)->get();
        return view('compracafe', compact('productos'));
    }

    public function derivadoscafe(){
        $productos = Producto::where('categoria_id', 2)->get();
        return view('derivadoscafe', compact('productos'));
    }

    public function cultivocafe(){
        $productos = Producto::where('categoria_id', 3)->get();
        return view('cultivocafe', compact('productos'));
    }

    public function herramientas(){
        $productos = Producto::where('categoria_id', 4)->get();
        return view('herramientas', compact('productos'));
    }
}
