document.addEventListener("DOMContentLoaded", async () => {
    let usuario = JSON.parse(localStorage.getItem("usuario"));
    const token = localStorage.getItem("token");
    const userMenu = document.getElementById("userMenu");
    const guestMenu = document.getElementById("guestMenu");
    const nombreUsuario = document.getElementById("nombreUsuario");
    const logoutBtn = document.getElementById("logoutBtn");
    const button = document.querySelector(".user-button");
    const dropdown = document.getElementById("userDropdown");

    // Si no hay usuario en localStorage pero sí hay token, lo pedimos a la API
    if (!usuario && token) {
        try {
            const res = await fetch("/api/perfil", {
                headers: { Authorization: "Bearer " + token },
            });
            if (res.ok) {
                usuario = await res.json();
                localStorage.setItem("usuario", JSON.stringify(usuario));
            }
        } catch (err) {
            console.error("Error cargando usuario:", err);
        }
    }

    if (usuario) {
        nombreUsuario.textContent = usuario.nombre;
        userMenu.style.display = "block";
        guestMenu.style.display = "none";
    }

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

// evitar que entre alguien sin token

/* document.addEventListener("DOMContentLoaded", () => {
    const token = localStorage.getItem("token");
    if (!token) {
        window.location.href = "/login";
    }
}); */
