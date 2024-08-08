$(document).ready(function() {
    $('#obtenerUsuariosBtn').click(function() {
        fetch('http://127.0.0.1:8000/usuarios/')
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

const pagesAdmin = { index: 'admin.html' };
const pagesEmpresa = { index: 'empresa.html' }; 

// Función para iniciar sesión
function iniciarSesion() {
    const email = $('#loginEmail').val().trim();
    const password = $('#loginPassword').val().trim();

    // Obtener todos los usuarios
    fetch('http://127.0.0.1:8000/usuarios/')
        .then(response => response.json())
        .then(data => {
            // Buscar el usuario con el correo y contraseña proporcionados
            const usuario = data.find(user => user.correo === email && user.password === password);

            if (usuario) { 
                // Si el login es exitoso, obtener todos los empleados
                fetch('http://127.0.0.1:8000/empleados/')
                    .then(response => response.json())
                    .then(empleados => {
                        // Buscar el empleado cuyo empleado_id coincida con el empleado_id del usuario
                        const empleado = empleados.find(emp => emp.id === usuario.empleado_id);
                        
                        if (empleado) {
                            console.log("Empleado encontrado:", empleado);
                            // Redirigir según el rol del empleado
                            sessionStorage.setItem('empleadoRol', empleado.rol);
                            if (empleado.rol === 'Empresa') {
                                window.location.href = `${pagesEmpresa.index}?id=${encodeURIComponent(usuario.id)}`;
                            } else if (empleado.rol === 'administrador') {
                                window.location.href = `${pagesAdmin.index}?id=${encodeURIComponent(usuario.id)}`;
                            } else {
                                alert('Rol no reconocido.');
                            }
                        } else {
                            alert('Empleado no encontrado para el usuario.');
                        }
                    })
                    .catch(error => {
                        console.error('Error al obtener empleados:', error);
                        alert('Error al obtener empleados.');
                    });
            } else {
                alert('Usuario no encontrado.');
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
