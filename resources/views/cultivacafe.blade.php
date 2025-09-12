@extends('layouts.app')

@section('content')
<section class="productos">
    <h2>Cultiva Café</h2>
    <div class="grid-productos">
        <!-- foreach  es para que en bucle recorra el Blade para todos los productos que se agreguen. -->
        @foreach($productos as $producto)
            @include('layouts.partials.caja-productos', ['producto' => $producto])
        @endforeach
    </div>
</section>
@endsection
