$(document).ready(function() {
    $('#obtenerUsuariosBtn').click(function() {
        fetch('http://127.0.0.1:8000/usuarios2/')
            .then(response => response.json())
            .then(data => {
                const listaUsuarios = $('#listaUsuarios');
                listaUsuarios.empty(); 

                data.forEach(usuario => {
                    const listItem = $('<li>').text(`ID USUARIO: ${usuario.id}, Email: ${usuario.correo}`);
                    listaUsuarios.append(listItem);
                });
            })
            .catch(error => console.error('Error:', error));
    });

    $('#loginBtn').click(function() {
        iniciarSesion();
    });
});

// Función para iniciar sesión
function iniciarSesion() {
    const email = $('#loginEmail').val().trim();
    const password = $('#loginPassword').val().trim();

    // Obtener todos los usuarios
    fetch('http://127.0.0.1:8000/usuarios2/')
        .then(response => response.json())
        .then(data => {
            let loginExitoso = false;

            // Verificar si existe el correo y la contraseña
            data.forEach(usuario => {
                if (usuario.correo === email && usuario.password === password) {
                    loginExitoso = true;
                    return; // Salir del bucle si encontramos una coincidencia
                }
            });

            if (loginExitoso) {
                alert('Login exitoso');
                window.location.href = 'index.html'; // Redirigir al usuario a la página principal
            } else {
                alert('Correo electrónico o contraseña incorrectos.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al iniciar sesión.');
        });
}

// Función de validación de correo electrónico
function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}
