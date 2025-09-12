<!-- este lo utiliza las categorias del menu -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expresscafe</title>
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-producto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/caja-productos.css') }}">
    <link rel="icon" href="{{ asset('img/logo2.png') }}" type="image/png">
</head>
<body>
    @include('layouts.partials.header')
    @include('layouts.partials.nav')
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>