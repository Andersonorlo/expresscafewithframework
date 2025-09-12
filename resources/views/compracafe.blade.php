@extends('layouts.app')

@section('content')
<section class="productos">
    <h2>Compra Café</h2>
    <div class="grid-productos">
        @foreach($productos as $producto)
                @include('layouts.partials.caja-productos', ['producto' => $producto])
        @endforeach
    </div>
</section>
@endsection
