<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Exprescafe</title>
    <link rel="icon" type="imagenWeb" href="{{ asset('img/logo2.png') }}">
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
                <li class="menu"><a href="compracafe.html" class="btn-menu">Café</a></li>
                <li class="menu"><a href="derivadoscafe.html" class="btn-menu">Derivados del café</a></li>
                <li class="menu"><a href="cultivacafe.html" class="btn-menu">Cultiva café</a></li>
                <li class="menu"><a href="herramientas.html" class="btn-menu">Herramientas</a></li>
            </ul>
        </nav>
    </section>
<!-- una serie de imagenes promocionales (slider) -->
    <section class="slider-frame">
        <ul>
            <li><img src="img/1.jpg" alt=""></li>
            <li><img src="img/2.jpg" alt=""></li>
            <li><img src="img/3.jpg" alt=""></li>
            <li><img src="img/4.jpg" alt=""></li>
        </ul>
    </section>
<!-- productossugerencias para el usuario-->
    <section class="productosBackground">
        <!-- opcion para la compra de cafe -->
        <h1 class="titulocompra">COMPRA CAFE</h1>
        <section class="productos">
            <article class="caja">
                <img alt="imgproducto1">
                <h1>Producto1</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article>
            <article class="caja">
                <img alt="imgproducto2">
                <h1>Producto2</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article>
            <article class="caja">
                <img alt="imgproducto3">
                <h1>Producto3</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article>
            <article class="caja">
                <img alt="imgproducto4">
                <h1>Producto4</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article> 
        </section>
        <!-- opcion para la compra de los dervidados del cafe -->
        <h1 class="titulocompra">DERIVADOS DEL CAFE</h1>
        <section class="productos">
            <article class="caja">
                <img alt="imgproducto1">
                <h1>Producto1</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article>
            <article class="caja">
                <img alt="imgproducto2">
                <h1>Producto2</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article>
            <article class="caja">
                <img alt="imgproducto3">
                <h1>Producto3</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article>
            <article class="caja">
                <img alt="imgproducto4">
                <h1>Producto4</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article> 
        </section>
        <!-- opcion para la compra de productos relacionados al cultivo de cafe -->
        <h1 class="titulocompra">CULTIVA CAFE</h1>
        <section class="productos">
            <article class="caja">
                <img alt="imgproducto1">
                <h1>Producto1</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article>
            <article class="caja">
                <img alt="imgproducto2">
                <h1>Producto2</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article>
            <article class="caja">
                <img alt="imgproducto3">
                <h1>Producto3</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article>
            <article class="caja">
                <img alt="imgproducto4">
                <h1>Producto4</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article> 
        </section>
        <!-- opcion para la compra de herramientas -->
        <h1 class="titulocompra">HERRAMIENTAS</h1>
        <section class="productos">
            <article class="caja">
                <img alt="imgproducto1">
                <h1>Producto1</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article>
            <article class="caja">
                <img alt="imgproducto2">
                <h1>Producto2</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article>
            <article class="caja">
                <img alt="imgproducto3">
                <h1>Producto3</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article>
            <article class="caja">
                <img alt="imgproducto4">
                <h1>Producto4</h1>
                <p>Precio</p>
                <button>Comprar</button>
            </article> 
        </section>
    </section>
    <footer>Anderson Dev 2025</footer>
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>