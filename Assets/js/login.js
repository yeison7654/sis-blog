// Esperar a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
        setupEventListeners();
        formSingIn();
    }, 1500);
});

// Configurar los listeners de botones y formularios
function setupEventListeners() {
    const btnIniciarSesion = document.getElementById("btn__iniciar-sesion");
    const btnRegistrarse = document.getElementById("btn__registrarse");
    const formularioLogin = document.querySelector(".formulario-login");
    const formularioRegister = document.querySelector(".formulario-register");

    // Listener para alternar a iniciar sesión
    btnIniciarSesion.addEventListener("click", () => {
        document.querySelector(".contenedor-login-register").classList.add("modo-login");
    });

    // Listener para alternar a registrarse
    btnRegistrarse.addEventListener("click", () => {
        document.querySelector(".contenedor-login-register").classList.remove("modo-login");
    });

    // Listener para el formulario de inicio de sesión
    formularioLogin.addEventListener("submit", (e) => {
        e.preventDefault();
        handleLogin();
    });

    // Listener para el formulario de registro
    formularioRegister.addEventListener("submit", (e) => {
        e.preventDefault();
        handleRegister();
    });
}

// Manejo del inicio de sesión
function formSingIn() {
    let singin = document.getElementById("singin");
    singin.addEventListener("submit", (e) => {
        e.preventDefault();
        let data = new FormData(singin);
        let encabezados = new Headers();
        let config = {
            method: "POST",
            headers: encabezados,
            node: "cors",
            cache: "no-cache",
            body: data,
        }
        let url = base_url + "/Login/singIn"
        try {
            fetch(url, config)
                .then(response => response.json())
                .then(data => {
                    let alert = document.querySelector(".alert");
                    if (data.status) {
                        document.querySelector(".title").innerHTML = data.title;
                        document.querySelector(".description").innerHTML = data.description;
                        document.querySelector(".datetime").innerHTML = data.datetime;
                        (alert.classList.contains("danger")) ? alert.classList.replace("danger", "success") : alert.classList.add("success");
                        (alert.classList.contains("hidden")) ? alert.classList.remove("hidden") : "";
                        setTimeout(() => {
                            alert.classList.toggle("hidden")
                            this.location.href = data.url
                        }, 2000);
                    } else {
                        document.querySelector(".title").innerHTML = data.title;
                        document.querySelector(".description").innerHTML = data.description;
                        document.querySelector(".datetime").innerHTML = data.datetime;
                        (alert.classList.contains("success")) ? alert.classList.replace("success", "danger") : alert.classList.add("danger");
                        (alert.classList.contains("hidden")) ? alert.classList.remove("hidden") : "";
                        setTimeout(() => {
                            alert.classList.toggle("hidden");
                        }, 2000);
                    }

                })
        } catch (error) {
            console.error("Error en el fetch " + error);
        }
    })
}

// Manejo del registro
/*function handleRegister() {
    const nombre = document.getElementById("nombre_completo").value;
    const correo = document.getElementById("correo").value;
    const usuario = document.getElementById("usuario").value;
    const contrasena = document.getElementById("contrasena").value;

    if (!nombre || !correo || !usuario || !contrasena) {
        showAlert("Por favor, completa todos los campos.", "danger");
        return;
    }

    const data = new FormData();
    data.append("nombre_completo", nombre);
    data.append("correo", correo);
    data.append("usuario", usuario);
    data.append("contrasena", contrasena);

    fetch(`${base_url}/Users/saveUsers`, {
        method: "POST",
        body: data,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.status) {
                showAlert("Registro exitoso. Ahora puedes iniciar sesión.", "success");
                document.querySelector(".formulario-register").reset();
                setTimeout(() => {
                    document.querySelector(".contenedor-login-register").classList.add("modo-login");
                }, 2000);
            } else {
                showAlert(data.message || "Error al registrarse.", "danger");
            }
        })
        .catch((error) => {
            console.error("Error en el registro:", error);
            showAlert("Ocurrió un error inesperado. Intenta nuevamente.", "danger");
        });
}*/

// Mostrar alertas en pantalla
function showAlert(message, type) {
    const alertBox = document.createElement("div");
    alertBox.className = `alert alert-${type}`;
    alertBox.textContent = message;

    document.body.appendChild(alertBox);

    setTimeout(() => {
        alertBox.remove();
    }, 3000);
}
