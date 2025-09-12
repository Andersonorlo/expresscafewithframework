<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/caja-productos.css') }}">
    <title>Exprescafe</title>
    <link rel="icon" type="imagen/png" href="{{ asset('img/logo2.png') }}">
</head>
<body>
<!-- encabezado en esta version se han aumentando dos botones de inicio de sesion y registro-->
    <section class="headerbackground">
        <header class="header">
            <section class="nombreExprescafe">
                <h1 class="titulo1">EXPRESSCAFE</h1>
                    <h4 class="subtitulo1">Cafe Colombiano</h4>
            </section>
                    <form>
                        <input type="search" placeholder="Buscar producto">
                            <button class="B1" type="submit">Buscar</button>
                    </form>
                        <a href="{{ route('login.form') }}" class="B2">Iniciar Sesion</a>
                            <a href="{{ route('registro.form') }}" class="B2">Registrate</a>
        </header>
    </section>    
<!-- cinta de desplazamientos donde los usuarios puedan ir a la sección que desean -->
    <section class="menuBackground">
        <nav class="nav">
            <ul class="secciones">
                <li class="menu"><a href="{{ route('compracafe') }}" class="btn-menu">Compra Café</a></li>
                <li class="menu"><a href="{{ route('derivadoscafe') }}" class="btn-menu">Derivados del café</a></li>
                <li class="menu"><a href="{{ route('cultivacafe') }}" class="btn-menu">Cultiva café</a></li>
                <li class="menu"><a href="{{ route('herramientas') }}" class="btn-menu">Herramientas</a></li>
            </ul>
        </nav>
    </section>
<!-- una serie de imagenes promocionales (slider) -->
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
</body>
</html>