@extends('layouts.app')

@section('content')
<section class="productos">
    <h2>Productos de Café</h2>
    <div class="grid-productos">
         @if($productos->isEmpty())
        <div class="mensaje-vacio">
            <p>No hay productos disponibles en esta categoría por ahora. ¡Vuelve pronto!</p>
        </div>
    @else
        <div class="grid-productos">
            @foreach($productos as $producto)
                <div class="card">
                    <img src="{{ asset('img/productos/' . ($producto->imagen ?? 'default.png')) }}" alt="{{ $producto->nombre }}">
                    <h3>{{ $producto->nombre }}</h3>
                    <p>{{ $producto->descripcion }}</p>
                    <p><strong>${{ number_format($producto->valor, 0) }}</strong> / {{ $producto->unidad }}</p>
                    <button>Comprar</button>
                </div>
            @endforeach
        </div>
    @endif
    </div>
</section>
@endsection
