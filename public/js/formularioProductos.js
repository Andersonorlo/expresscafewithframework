document
    .getElementById("formProducto")
    .addEventListener("submit", async function (e) {
        e.preventDefault();

        const token = localStorage.getItem("token");
        if (!token) {
            alert("Debes iniciar sesión para publicar un producto");
            window.location.href = "/login";
            return;
        }

        const formData = new FormData(this);

        try {
            const res = await fetch("/api/productos", {
                method: "POST",
                headers: {
                    Authorization: "Bearer " + token,
                    Accept: "application/json",
                },
                body: formData,
            });

            const data = await res.json();

            if (res.ok) {
                alert("Producto guardado correctamente");
                window.location.href = "/";
            } else {
                alert(data.message || "Error al guardar el producto");
            }
        } catch (err) {
            console.error(err);
            alert("Error de conexión con el servidor");
        }
    });
