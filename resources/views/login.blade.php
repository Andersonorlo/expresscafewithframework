<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <img src="{{ asset('img/logo3.png') }}" class="logo">

    <form method="POST" action="{{ route('login.enviar') }}">
        @csrf <!-- Protección contra CSRF -->

        <h1>Iniciar Sesión</h1>

        <input class="casillas" type="email" name="correo" placeholder="Correo electrónico" value="{{ old('correo') }}" required>
        @error('correo')
        <small style="color:red;">{{ $message }}</small>
        @enderror

        <input class="casillas" type="password" name="contraseña" placeholder="Contraseña" required>
        @error('password')
        <small style="color:red;">{{ $message }}</small>
        @enderror

        <button class="casillas" type="submit">Ingresar</button>

        @if ($errors->has('correo'))
        <div style="color:red;">{{ $errors->first('correo') }}</div>
        @endif

        <section class="btn-inicio">
            <p>¿No tienes cuenta?</p>
            <a class="registro" href="{{ route('registro.form') }}">Registrarse</a>
        </section>
        <a href="{{ route('inicio') }}" class="principal">Volver</a>
    </form>
</body>

</html>