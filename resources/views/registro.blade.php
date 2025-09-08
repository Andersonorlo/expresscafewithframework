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

        <form method="POST" action="{{ route('registro.enviar') }}">
            @csrf <!-- protege el formulario de ataques -->

            <h1>Formulario de Registro</h1>
            <!-- 'old' mantiene los datos en caso de errores -->
            <input class="casillas"type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" required>
            <input class="casillas" type="text" name="apellido" placeholder="Apellido" value="{{ old('apellido') }}" required>
            <input class="casillas" type="text" name="empresacliente" placeholder="Empresa (opcional)" value="{{ old('empresacliente') }}">
            <input class="casillas" type="email" name="correo" placeholder="Correo electrónico" value="{{ old('correo') }}" required>
            <input class="casillas" type="text" name="celular" placeholder="Celular" value="{{ old('celular') }}" required>
            <input class="casillas" type="text" name="direccion" placeholder="Dirección" value="{{ old('direccion') }}" required>
            <input class="casillas" type="text" name="codigopostal" placeholder="Código Postal" value="{{ old('codigopostal') }}" required>
            <input class="casillas" type="password" name="contraseña" placeholder="Contraseña" required>
            <input class="casillas" type="text" name="cedula" placeholder="Cédula" value="{{ old('cedula') }}" required>
            <button type="submit" class="boton" >Registrar</button>
                <section class="btn-inicio">
                    <p>¿Ya tienes cuenta?</p>
                    <a class="inicio" href="{{ route('login.form') }}">Iniciar Sesion</a>
                </section>
                <a href="{{ route('inicio') }}" class="principal">Volver</a>
        </form>
    </div>
</body>
</html>