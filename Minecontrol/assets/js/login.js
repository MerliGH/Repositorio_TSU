function iniciarSesion() {
    console.log("Función iniciarSesion llamada");

    var correo = $("#login-email").val().trim();
    var password = $("#login-password").val().trim();

    var valid = true;
    $(".error-message").text(""); // Limpiar mensajes de error

    // Validar correo electrónico
    if (!correo) {
        $("#error-correo-login").text("Por favor, llena el correo electrónico.");
        valid = false;
    } else if (!validateEmail(correo)) {
        $("#error-correo-login").text("Por favor, ingresa un correo electrónico válido.");
        valid = false;
    }

    // Validar contraseña
    if (!password) {
        $("#error-password-login").text("Por favor, ingresa una contraseña.");
        valid = false;
    }

    if (valid) {
        var usuario = {
            correo: correo,
            password: password
        };

        fetch('https://polliwog-desired-egret.ngrok-free.app/usuarios/', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(usuario)
        })
        .then(response => {
            console.log("Estado de la respuesta:", response.status); // Imprimir el estado de la respuesta
            return response.json();
        })
        .then(data => {
            console.log("Respuesta de la API:", data); // Imprimir la respuesta para depuración
            if (data && data.token) {
                alert('Inicio de sesión exitoso.');
                // Aquí podrías redirigir al usuario o guardar el token
            } else {
                // Mensaje cuando la API devuelve una respuesta sin token
                if (data.message) {
                    alert(data.message); // Mostrar mensaje específico de la API si está presente
                } else {
                    alert('Correo electrónico o contraseña incorrectos2.'); // Mensaje por defecto
                }
            }
        })
        .catch(error => {
            console.error("Error al iniciar sesión:", error);
            alert('Error al iniciar sesión.');
        });
    } else {
        alert("Por favor, completa todos los campos obligatorios de manera correcta.");
    }
}

// Función de validación de correo electrónico
function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}
