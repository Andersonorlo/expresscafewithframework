<?php

namespace App\Traits;

use App\Models\Producto;

trait ProductosPorCategoriaTrait
{
    public function obtenerProductosPorCategoria($limite = null)
    {
        return [
            'compracafe'    => Producto::where('categoria_id', 1)
                ->when($limite, fn($q) => $q->take($limite))
                ->get(),
            'derivadoscafe' => Producto::where('categoria_id', 2)
                ->when($limite, fn($q) => $q->take($limite))
                ->get(),
            'cultivacafe'   => Producto::where('categoria_id', 3)
                ->when($limite, fn($q) => $q->take($limite))
                ->get(),
            'herramientas'  => Producto::where('categoria_id', 4)
                ->when($limite, fn($q) => $q->take($limite))
                ->get(),
        ];
    }
}
