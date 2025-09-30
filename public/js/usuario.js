document.addEventListener("DOMContentLoaded", async () => {
    const token = localStorage.getItem("token");
    const path = window.location.pathname;

    // 🔒 Proteger rutas privadas
    if ((path === "/usuario" || path === "/vender") && !token) {
        window.location.href = "/login";
        return;
    }

    let usuario = JSON.parse(localStorage.getItem("usuario"));
    const userMenu = document.getElementById("userMenu");
    const guestMenu = document.getElementById("guestMenu");
    const nombreUsuario = document.getElementById("nombreUsuario");
    const logoutBtn = document.getElementById("logoutBtn");
    const button = document.querySelector(".user-button");
    const dropdown = document.getElementById("userDropdown");

    // 👤 Si no hay usuario en localStorage pero sí hay token, lo pedimos a la API
    if (!usuario && token) {
        try {
            const res = await fetch("/api/perfil", {
                headers: { Authorization: "Bearer " + token },
            });
            if (res.ok) {
                usuario = await res.json();
                localStorage.setItem("usuario", JSON.stringify(usuario));
            } else {
                localStorage.removeItem("token");
                localStorage.removeItem("usuario");
                window.location.href = "/login";
                return;
            }
        } catch (err) {
            console.error("Error cargando usuario:", err);
            window.location.href = "/login";
            return;
        }
    }

    // 🎯 Mostrar menú de usuario si está logueado
    if (usuario) {
        if (nombreUsuario) nombreUsuario.textContent = usuario.nombre;
        if (userMenu) userMenu.style.display = "block";
        if (guestMenu) guestMenu.style.display = "none";
    }

    // ⬇️ Dropdown toggle
    if (button && dropdown) {
        button.addEventListener("click", (e) => {
            e.stopPropagation();
            dropdown.classList.toggle("hidden");
        });

        document.addEventListener("click", (e) => {
            if (!dropdown.contains(e.target) && !button.contains(e.target)) {
                dropdown.classList.add("hidden");
            }
        });
    }

    // 🚪 Logout
    if (logoutBtn) {
        logoutBtn.addEventListener("click", (e) => {
            e.preventDefault();
            fetch("/api/logout", {
                method: "POST",
                headers: {
                    Authorization: "Bearer " + token,
                    Accept: "application/json",
                },
            }).finally(() => {
                localStorage.removeItem("token");
                localStorage.removeItem("usuario");
                window.location.href = "/";
            });
        });
    }
});
