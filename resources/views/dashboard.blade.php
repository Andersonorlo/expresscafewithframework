@auth
<div class="user-menu-container">
    <button onclick="toggleDropdown()" class="user-menu-button">
        {{ Auth::user()->nombre }}
        <svg class="user-menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>

    <div id="userDropdown" class="user-dropdown hidden">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="user-dropdown-item">Cerrar sesión</a>
        <a href="{{ route('compras.index') }}" class="user-dropdown-item">Ver compras</a>
        <a href="{{ route('productos.create') }}" class="user-dropdown-item">Vender</a>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>
</div>
@endauth