<section class="caja">
    <img src="{{ asset('img/logo2.png') }}" alt="{{ $producto->nombre }}">
    <h3>{{ $producto->nombre }}</h3>
    <p>{{ $producto->descripcion }}</p>
    <p><strong>${{ number_format($producto->valor, 0) }}</strong> / {{ $producto->unidad->nombre }}</p>
    <button>Comprar</button>
</section>