<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <img src="{{ asset('img/logo3.png') }}" class="logo">

    <form id="loginForm">

        <h1>Iniciar Sesión</h1>

        <input class="casillas" type="email" id="email" placeholder="Correo electrónico" required>
        <span id="errorEmail" style="display:none; color:red;"></span>


        <input class="casillas" type="password" id="password" placeholder="Contraseña" required>
        <span id="errorPassword" style="display:none; color:red;"></span>

        <button class="casillas" type="submit">Ingresar</button>

        <section class="btn-inicio">
            <p>¿No tienes cuenta?</p>
            <a class="registro" href="{{ route('registro.form') }}">Registrarse</a>
        </section>
        <a href="{{ route('inicio') }}" class="principal">Volver</a>
    </form>
    <script src="{{ asset('js/login.js')}}"></script>
</body>

</html>