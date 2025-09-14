<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
</head>

<body>
    <div class="form-container">
        <img src="{{ asset('img/logo3.png') }}" class="logo">
        <!-- validacion de usuarios -->
        @if(session('exito'))
        <p class="mensaje-exito">{{ session('exito') }}</p>
        @endif
        <!-- validacion de errores -->
        @if ($errors->any())
        <div class="errores">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form id="formRegistro">
            <h1>Formulario de Registro</h1>
            <input class="casillas" type="text" name="nombre" placeholder="Nombre" required>
            <input class="casillas" type="text" name="apellido" placeholder="Apellido" required>
            <input class="casillas" type="text" name="empresacliente" placeholder="Empresa (opcional)">
            <input class="casillas" type="email" name="email" placeholder="Correo electrónico" required>
            <input class="casillas" type="text" name="celular" placeholder="Celular" required>
            <input class="casillas" type="text" name="direccion" placeholder="Dirección" required>
            <input class="casillas" type="text" name="codigopostal" placeholder="Código Postal" required>
            <input class="casillas" type="password" name="password" placeholder="Contraseña" required>
            <input class="casillas" type="text" name="cedula" placeholder="Cédula" required>
            <button type="submit" class="boton">Registrar</button>
            <section class="btn-inicio">
                <p>¿Ya tienes cuenta?</p>
                <a class="inicio" href="{{ route('login.form') }}">Iniciar Sesion</a>
            </section>
            <a href="{{ route('inicio') }}" class="principal">Volver</a>
        </form>
    </div>
    <script src="{{ asset('js/registro.js') }}"></script>
</body>

</html>