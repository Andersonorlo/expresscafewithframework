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
        <section class="user-menu-container" id="userMenu" style="display:none">
            <button id="userButton" class="user-button">
                <span id="nombreUsuario"></span>
                <svg class="user-menu-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width:16px; height:16px;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <section id="userDropdown" class="user-dropdown hidden">
                <a href="#" class="user-dropdown-item">Editar usuario</a>
                <a href="#" class="user-dropdown-item">Compras</a>
                <a href="{{ route('productos.create') }}" class="user-dropdown-item">Vender</a>
                <a href="#" id="logoutBtn" class="user-dropdown-item">Cerrar sesión</a>
            </section>
        </section>
        <section id="guestMenu" style="display:block">
            <a href="{{ route('login.form') }}" class="B2">Iniciar Sesión</a>
            <a href="{{ route('registro.form') }}" class="B2">Registrate</a>
        </section>
    </header>
</section>