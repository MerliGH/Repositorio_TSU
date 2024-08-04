$(document).ready(function() {
    $('#register-form').on('submit', function(event) {
        event.preventDefault();
        var valid = true;

        // Limpiar mensajes de error
        $(".error-message").text("");

        // Validar nombre
        var nombre = $("#nombre").val().trim();
        if (!nombre) {
            $("#error-nombre").text("Por favor, llena el nombre.");
            valid = false;
        }

        // Validar apellido paterno
        var apellidoPaterno = $("#apellidoPaterno").val().trim();
        if (!apellidoPaterno) {
            $("#error-apellidoPaterno").text("Por favor, llena el apellido paterno.");
            valid = false;
        }

        // Validar apellido materno
        var apellidoMaterno = $("#apellidoMaterno").val().trim();
        if (!apellidoMaterno) {
            $("#error-apellidoMaterno").text("Por favor, llena el apellido materno.");
            valid = false;
        }

        // Validar correo electrónico
        var correo = $("#correo").val().trim();
        if (!correo) {
            $("#error-correo").text("Por favor, llena el correo electrónico.");
            valid = false;
        } else if (!validateEmail(correo)) {
            $("#error-correo").text("Por favor, ingresa un correo electrónico válido.");
            valid = false;
        }

        // Validar contraseña
        var password = $("#password").val().trim();
        if (!password) {
            $("#error-password").text("Por favor, ingresa una contraseña.");
            valid = false;
        }

        // Validar teléfono (solo números)
        var telefono = $("#telefono").val().trim();
        if (telefono && isNaN(telefono)) {
            $("#error-telefono").text("Solo se aceptan valores numéricos en el teléfono.");
            valid = false;
        }

        if (valid) {
            registrarse();
        } else {
            alert("Por favor, completa todos los campos obligatorios de manera correcta.");
        }
    });

    function validateEmail(email) {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(String(email).toLowerCase());
    }




    function registrarse() {
        console.log("Función registrarEmpleado llamada");
    
        var nombre = $("#nombre").val();
        var apellidoPaterno = $("#apellidoPaterno").val();
        var apellidoMaterno = $("#apellidoMaterno").val();
        var telefono = $("#telefono").val();
        var correo = $("#correo").val();
        var password = $("#password").val();
    
        if (telefono === "") {
            telefono = null;
        }
    
        var empleado = {
            nombreCompleto: {
                nombre: nombre,
                apPaterno: apellidoPaterno,
                apMaterno: apellidoMaterno
            },
            rol: "Empresa",
            mina_id: "",
            status: "true"
        };
    
        var usuario = {
            empleado_id: null,
            password: password,
            telefono: telefono,
            correo: correo,
            status: "true"
        };
    
        $.ajax({
            url: 'https://polliwog-desired-egret.ngrok-free.app/empleados/',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(empleado),
            success: function(response) {
                if (response && response.id) {
                    usuario.empleado_id = response.id;
                    $.ajax({
                        url: 'https://polliwog-desired-egret.ngrok-free.app/usuarios/',
                        type: 'POST',
                        contentType: 'application/json',
                        data: JSON.stringify(usuario),
                        success: function(response) {
                            if (response && response.id) {
                                var id = response.id;
                                // Guardar el ID en localStorage
                                localStorage.setItem('userId', id);
                                // Construir la URL con el ID del usuario
                                var url = 'suscripciones.html?id=' + encodeURIComponent(id);
                                alert('Registro completado con éxito.');
                                window.location.href = url;
                            } else {
                                alert('Error al registrar usuario.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error al registrar usuario:", status, error);
                            alert('Favor de llenar el número telefónico');
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

    







    
    $('#btn__registrarse').click(function() {
        $('.contenedor__login-register').addClass('active');
    });

    $('#btn__iniciar-sesion').click(function() {
        $('.contenedor__login-register').removeClass('active');
    });
});
