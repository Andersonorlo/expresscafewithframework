@extends('layouts.app')

@section('content')
<section class="productos">
    <h2>Cultiva Café</h2>
    <div class="grid-productos">
        <!-- @foreach  es para que en bucle recorra el Blade para todos los productos que se agreguen. -->
        @foreach($productos as $producto)
            <div class="card">
                <img src="{{ asset('img/productos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
                <h3>{{ $producto->nombre }}</h3>
                <p>{{ $producto->descripcion }}</p>
                <p><strong>${{ number_format($producto->valor, 0) }}</strong> / {{ $producto->unidad }}</p>
                <button>Comprar</button>
            </div>
        @endforeach
    </div>
</section>
@endsection
