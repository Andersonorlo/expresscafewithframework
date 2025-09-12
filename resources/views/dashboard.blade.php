@extends('layouts.app')

@section('content')
<!-- slider promocional -->
<section class="slider-frame">
    <ul>
        <li><img src="{{ asset('img/1.jpg') }}" alt=""></li>
        <li><img src="{{ asset('img/2.jpg') }}" alt=""></li>
        <li><img src="{{ asset('img/3.jpg') }}" alt=""></li>
        <li><img src="{{ asset('img/4.jpg') }}" alt=""></li>
    </ul>
</section>
<!-- productossugerencias para el usuario-->
    <section class="productos">
        <section class="categoria">
            <h2>Compra Café</h2>
                <div class="grid-categorias">   
                    @foreach($productosPorCategoria['compraCafe'] as $producto)
                        @include('layouts.partials.caja-productos', ['producto' => $producto])
                    @endforeach
                </div>
        </section>
        <section class="categoria">
            <h2>Derivados del Café</h2>
                <div class="grid-categorias">   
                    @foreach($productosPorCategoria['derivadosCafe'] as $producto)
                        @include('layouts.partials.caja-productos', ['producto' => $producto])
                    @endforeach
                </div>
        </section>
        <section class="categoria">
            <h2>Cultiva Café</h2>
                <div class="grid-categorias">   
                    @foreach($productosPorCategoria['cultivaCafe'] as $producto)
                        @include('layouts.partials.caja-productos', ['producto' => $producto])
                    @endforeach
                </div>
        </section>
        <section class="categoria">
            <h2>Herramientas</h2>
                <div class="grid-categorias">   
                    @foreach($productosPorCategoria['herramientas'] as $producto)
                        @include('layouts.partials.caja-productos', ['producto' => $producto])
                    @endforeach
                </div>
        </section>
    </section>

<footer>Anderson Dev 2025</footer>
@endsection

