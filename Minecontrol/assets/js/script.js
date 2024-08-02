//Ejecutando funciones
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn__registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPage);

//Declarando variables
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");

//COMO NO TIENES UNA BASE DE DATOS AUN, MANEJO UNA ESTRUCTURA JSON ESTATICA DE PRUEBA
//OJITO, ESTA NO SE ACTUALIZARA, SOLO SON DE PRUEBA
const registeredUsers = [
    { email: 'mer@gmail.com', password: 'mer' },
    { email: 'misa@gmail.com', password: 'misa456' },
    { email: 'user@gmail.com', password: 'user123' }
];

//FUNCIONES

function anchoPage() {
    if (window.innerWidth > 850) {
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "block";
    } else {
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";   
    }
}

anchoPage();

function iniciarSesion() {
    if (window.innerWidth > 850) {
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "10px";
        formulario_register.style.display = "none";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.opacity = "0";
    } else {
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "none";
    }
}

function register() {
    if (window.innerWidth > 850) {
        formulario_register.style.display = "block";
        contenedor_login_register.style.left = "410px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.opacity = "0";
        caja_trasera_login.style.opacity = "1";
    } else {
        formulario_register.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_login.style.display = "none";
        caja_trasera_register.style.display = "none";
        caja_trasera_login.style.display = "block";
        caja_trasera_login.style.opacity = "1";
    }
}

//SE AGREGA EVENTO CON LOS IDS QUE SE PUSIERON, SI SE ACTIVA EL BOTON, VALIDA SI EXISTE
//EL CORREO JUNTO CON EL PASSWORD EN EL JSON ANTERIOR, SI ES ASI, PUEDE REDIRIGIR AL INVENTARIO, SINO, PUES NO

document.getElementById('login-form').addEventListener('submit', function(event) 
{
    event.preventDefault();

    const loginEmail = document.getElementById('login-email').value;
    const loginPassword = document.getElementById('login-password').value;

    const user = registeredUsers.find(  user => user.email === loginEmail && 
                                        user.password === loginPassword);

    if (user) 
    {
        window.location.href = 'inventario.html';
    } else 
    {
        alert('Correo electrónico o contraseña incorrectos');
    }
});
