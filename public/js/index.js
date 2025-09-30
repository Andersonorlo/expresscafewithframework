document.addEventListener("DOMContentLoaded", async () => {
    const token = localStorage.getItem("token");
    const path = window.location.pathname;

    // 👉 Función para activar animación en todas las cajas actuales
    function activarAnimacionCajas() {
        document.querySelectorAll(".caja").forEach((card) => {
            card.addEventListener("mouseenter", () => {
                card.style.transform = "scale(1.05)";
                card.style.transition = "transform 0.3s ease";
            });
            card.addEventListener("mouseleave", () => {
                card.style.transform = "scale(1)";
            });
        });
    }

    // 🔹 Caso: usuario no autenticado en rutas protegidas
    if ((path === "/usuario" || path === "/vender") && !token) {
        window.location.href = "/login";
        return;
    }

    // 🔹 Caso: /usuario con token → pintar desde API
    if (path === "/usuario" && token) {
        try {
            const res = await fetch("/api/usuario", {
                headers: { Authorization: "Bearer " + token },
            });

            if (res.ok) {
                const data = await res.json();
                const categorias = [
                    "compracafe",
                    "derivadoscafe",
                    "cultivacafe",
                    "herramientas",
                ];

                categorias.forEach((cat) => {
                    const cont = document.getElementById(cat);
                    if (cont && data.productosPorCategoria[cat]) {
                        cont.innerHTML = ""; // limpia antes de pintar
                        data.productosPorCategoria[cat].forEach((prod) => {
                            const section = document.createElement("section");
                            section.classList.add("caja");

                            section.innerHTML = `
                                <img src="/img/logo2.png" alt="${prod.nombre}">
                                <h3>${prod.nombre}</h3>
                                <p>${prod.descripcion ?? ""}</p>
                                <p><strong>$${new Intl.NumberFormat(
                                    "es-CO"
                                ).format(prod.valor)}</strong> / ${
                                prod.unidad?.nombre ?? ""
                            }</p>
                                <button>Comprar</button>
                            `;

                            cont.appendChild(section);
                        });
                    }
                });

                // 👉 Activa animación en las cajas recién pintadas
                activarAnimacionCajas();
            }
        } catch (err) {
            console.error("Error en /api/usuario:", err);
        }
    } else {
        // 🔹 Caso: inicio u otras páginas → las cajas ya existen en Blade
        activarAnimacionCajas();
    }
});
