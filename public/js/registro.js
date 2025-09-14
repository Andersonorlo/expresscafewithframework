document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("formRegistro");

    if (!form) return;

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        try {
            const res = await fetch("/api/registro", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(data),
            });

            if (res.ok) {
                const json = await res.json();
                localStorage.setItem("token", json.token);
                localStorage.setItem("usuario", JSON.stringify(json.usuario));
                window.location.href = "/usuario";
            } else {
                const error = await res.json();
                console.error("Error en registro:", error);
            }
        } catch (err) {
            console.error("Error de red:", err);
        }
    });
});
