$(document).ready(function() {
    // Manejo del formulario de registro
    $('#register-form').on('submit', function(event) {
        event.preventDefault();
        var valid = true;

        // Limpiar mensajes de error
        $(".error-message").text("");

        // Validar campos
        var nombre = $("#nombre").val().trim();
        if (!nombre) {
            $("#error-nombre").text("Por favor, llena el nombre.");
            valid = false;
        }

        var apellidoPaterno = $("#apellidoPaterno").val().trim();
        if (!apellidoPaterno) {
            $("#error-apellidoPaterno").text("Por favor, llena el apellido paterno.");
            valid = false;
        }

        var apellidoMaterno = $("#apellidoMaterno").val().trim();
        if (!apellidoMaterno) {
            $("#error-apellidoMaterno").text("Por favor, llena el apellido materno.");
            valid = false;
        }

        var correo = $("#correo").val().trim();
        if (!correo) {
            $("#error-correo").text("Por favor, llena el correo electrónico.");
            valid = false;
        } else if (!validateEmail(correo)) {
            $("#error-correo").text("Por favor, ingresa un correo electrónico válido.");
            valid = false;
        }

        var password = $("#password").val().trim();
        if (!password) {
            $("#error-password").text("Por favor, ingresa una contraseña.");
            valid = false;
        }

        var telefono = $("#telefono").val().trim();
        if (telefono && isNaN(telefono)) {
            $("#error-telefono").text("Solo se aceptan valores numéricos en el teléfono.");
            valid = false;
        }

        if (valid) {
            registrarEmpleado();
        } else {
            alert("Por favor, completa todos los campos obligatorios de manera correcta.");
        }
    });

    // Función de validación de correo electrónico
    function validateEmail(email) {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }

    // Función para registrar empleado
    function registrar() {
        console.log("Función registrarEmpleado llamada");

        var nombre = $("#nombre").val();
        var apellidoPaterno = $("#apellidoPaterno").val();
        var apellidoMaterno = $("#apellidoMaterno").val();
        var telefono = $("#telefono").val() || null;
        var correo = $("#correo").val();
        var password = $("#password").val();

        var empleado = {
            nombreCompleto: {
                nombre: nombre,
                apPaterno: apellidoPaterno,
                apMaterno: apellidoMaterno
            },
            rol: "Empresa",
            mina_id: "", // Puede ser vacío o null dependiendo del requerimiento
            status: "true"
        };

        var usuario = {
            empleado_id: null,
            password: password,
            telefono: telefono,
            correo: correo,
            status: "true"
        };

        // Registrar empleado
        $.ajax({
            url: 'https://polliwog-desired-egret.ngrok-free.app/empleados/',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(empleado),
            success: function(response) {
                if (response && response.id) {
                    usuario.empleado_id = response.id;

                    // Registrar usuario
                    $.ajax({
                        url: 'https://polliwog-desired-egret.ngrok-free.app/usuarios/',
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify(usuario),
                        success: function(response) {
                            alert('Registro completado con éxito.');
                            $('#register-form').trigger("reset");
                        },
                        error: function(xhr, status, error) {
                            console.error("Error al registrar usuario:", status, error);
                            alert('Error al registrar usuario.');
                        }
                    });
                } else {
                    alert('Error al registrar empleado.');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error al registrar empleado:", status, error);
                alert('Error al registrar empleado.');
            }
        });
    }

    // Manejo de botones de registro e inicio de sesión
    $('#btn__registrarse').click(function() {
        $('.contenedor__login-register').addClass('active');
    });

    $('#btn__iniciar-sesion').click(function() {
        $('.contenedor__login-register').removeClass('active');
    });
});
