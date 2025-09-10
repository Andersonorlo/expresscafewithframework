<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expresscafe - Vender</title>
    <link rel="stylesheet" href="{{ asset('css/form-producto.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo2.png') }}">
</head>
<body>
    <section class="headerbackground">
        <header class="header">
            <section class="nombreExprescafe">
                <h1 class="titulo1">EXPRESSCAFE</h1>
                <h4 class="subtitulo1">Cafe Colombiano</h4>
            </section>

            <form action="" method="GET">
                <input type="search" name="q" placeholder="Buscar producto">
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
    <section class="menuBackground">
        <nav class="nav">
            <ul class="secciones">
                <li class="menu"><a href="{{ route('compracafe') }}" class="btn-menu">Café</a></li>
                <li class="menu"><a href="{{ route('derivadoscafe') }}" class="btn-menu">Derivados del café</a></li>
                <li class="menu"><a href="{{ route('cultivacafe') }}" class="btn-menu">Cultiva café</a></li>
                <li class="menu"><a href="{{ route('herramientas') }}" class="btn-menu">Herramientas</a></li>
            </ul>
        </nav>
    </section>
    <main>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="form-container">
            <h2 class="form-title">Subir nuevo producto</h2>

            <form class="form-registro-formulario" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                @csrf
                <section class="form-inner">
                    <div class="form-group">
                        <label for="nombre">Nombre del producto</label>
                        <input type="text" name="nombre" id="nombre" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="number" name="valor" id="valor">
                    </div>

                    <div class="form-group">
                        <label for="categoria_id">Categoría</label>
                        <select name="categoria_id" id="categoria_id" required>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="unidad_id">Unidad</label>
                        <select name="unidad_id" id="unidad_id" required>
                            @foreach($unidades as $unidad)
                                <option value="{{ $unidad->id }}">{{ $unidad->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="imagen">Imagen del producto</label>
                        <input type="file" name="imagen" id="imagen">
                    </div>

                    <div class="form-group">
                        <button type="submit">Guardar producto</button>
                    </div>
                </section>
            </form>
        </div>
    </main>

    <footer>Anderson Dev 2025</footer>

    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>
