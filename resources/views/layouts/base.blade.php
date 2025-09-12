<!-- este lo utiliza el formulario -->

<!-- ***ALERTA PUEDE QUE NO ESTÁ SIENDO UTILIZADO *** -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @stack('styles') 
    <link rel="stylesheet" href="{{asset('css/form-producto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/caja-productos.css') }}">
    <title>Expresscafe</title>
    <link rel="icon" href="{{ asset('img/logo2.png') }}" type="image/png">
</head>
<body>
    @include('layouts.partials.header')
    @include('layouts.partials.nav')

    <main class="main-wrapper">
        @yield('content')
    </main>


    <footer>Anderson Dev 2025</footer>
    
</body>
</html>
