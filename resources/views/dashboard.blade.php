
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exprescafe</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/caja-productos.css') }}">
    <link rel="icon" type="imagen/png" href="{{ asset('img/logo2.png') }}">
    
</head>
<body>

<!-- encabezado con menú dinámico -->
<section class="headerbackground">
    <header class="header">
        <section class="nombreExprescafe">
            <h1 class="titulo1">EXPRESSCAFE</h1>
            <h4 class="subtitulo1">Cafe Colombiano</h4>
        </section>

        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            <input type="search" placeholder="Buscar producto">
            <button class="B1" type="submit">Buscar</button>
        </form>

        @auth
            <div class="user-menu-container">
                <button id="userButton" class="user-button">
                    {{ Auth::user()->nombre }}
                    <svg class="user-menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:16px; height:16px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="userDropdown" class="user-dropdown hidden">
                    <a href="#" class="user-dropdown-item">Editar usuario</a>
                    <a href="#" class="user-dropdown-item">Compras</a>
                    <a href="{{ route('productos.create') }}" class="user-dropdown-item">Vender</a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="user-dropdown-item">Cerrar sesión</a>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </div>
        @else
            <a href="{{ route('login.form') }}" class="B2">Iniciar Sesión</a>
            <a href="{{ route('registro.form') }}" class="B2">Registrate</a>
        @endauth
    </header>
</section>

<!-- menú de navegación -->
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

</body>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
</html>
