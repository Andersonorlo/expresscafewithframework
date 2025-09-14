document.addEventListener("DOMContentLoaded", () => {
    document
        .getElementById("loginForm")
        .addEventListener("submit", async function (e) {
            e.preventDefault();

            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            try {
                const res = await fetch("/api/login", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                    body: JSON.stringify({ email: email, password: password }),
                });

                const data = await res.json();

                if (res.ok) {
                    // Guardar usuario y token
                    localStorage.setItem(
                        "usuario",
                        JSON.stringify(data.usuario)
                    );
                    localStorage.setItem("token", data.token);

                    // Redirigir según rol
                    if (data.usuario.rol === "adm") {
                        window.location.href = "/admin";
                    } else {
                        window.location.href = "/usuario";
                    }
                } else {
                    // Mostrar errores
                    if (data.error) {
                        alert(data.error);
                    }
                    if (data.errors) {
                        if (data.errors.email) {
                            document.getElementById("errorEmail").textContent =
                                data.errors.email[0];
                            document.getElementById(
                                "errorEmail"
                            ).style.display = "block";
                        }
                        if (data.errors.password) {
                            document.getElementById(
                                "errorPassword"
                            ).textContent = data.errors.password[0];
                            document.getElementById(
                                "errorPassword"
                            ).style.display = "block";
                        }
                    }
                }
            } catch (err) {
                console.error(err);
                alert("Error de conexión con el servidor");
            }
        });
});
