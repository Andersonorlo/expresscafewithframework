@extends('layouts.app')

@section('content')
<section class="productos">
    <h2>Herramientas</h2>
    <div class="grid-productos">
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
