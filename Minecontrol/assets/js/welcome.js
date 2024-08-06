document.addEventListener('DOMContentLoaded', async function() {
    // Obtén el userId del localStorage
    const userId = localStorage.getItem('userId');
    console.log('ID de usuario desde localStorage:', userId);

    const userNameElement = document.getElementById('user-name');
    
    if (userNameElement) {
        if (userId) {
            try {
                // Solicitud para obtener todos los usuarios
                const responseUsuarios = await fetch('http://127.0.0.1:8000/usuarios/');
                if (!responseUsuarios.ok) throw new Error('Error al obtener usuarios');

                const usuarios = await responseUsuarios.json();
                console.log('Datos de usuarios:', usuarios); // Depura los datos obtenidos

                // Encuentra el usuario que coincide con el userId
                const usuario = usuarios.find(user => user.id === userId);
                console.log('Usuario encontrado:', usuario); // Depura el usuario encontrado

                if (usuario) {
                    // Si el usuario se encuentra, obtener todos los empleados
                    const responseEmpleados = await fetch('http://127.0.0.1:8000/empleados/');
                    if (!responseEmpleados.ok) throw new Error('Error al obtener empleados');

                    const empleados = await responseEmpleados.json();
                    console.log('Datos de empleados:', empleados); // Depura los datos obtenidos

                    // Encuentra el empleado cuyo empleado_id coincida con el empleado_id del usuario
                    const empleado = empleados.find(emp => emp.id === usuario.empleado_id);
                    console.log('Empleado encontrado:', empleado); // Depura el empleado encontrado

                    if (empleado) {
                        // Si el empleado se encuentra, construye el nombre completo
                        const { nombre, apPaterno, apMaterno } = empleado.nombreCompleto;
                        const nombreCompleto = `${nombre} ${apPaterno} ${apMaterno}`;
                        userNameElement.textContent = `Bienvenido: ${nombreCompleto}`;
                    } else {
                        // Si no se encuentra el empleado, muestra un mensaje por defecto
                        userNameElement.textContent = 'Welcome no jalo bien!';
                    }
                } else {
                    // Si no se encuentra el usuario, muestra un mensaje por defecto
                    userNameElement.textContent = 'User ID no encontrado!';
                }
                
            } catch (error) {
                console.error('Error:', error.message);
                userNameElement.textContent = 'Welcome!';
            }
        } else {
            userNameElement.textContent = 'Welcome!';
        }
    } else {
        console.error('Elemento con ID "user-name" no encontrado.');
    }
});
