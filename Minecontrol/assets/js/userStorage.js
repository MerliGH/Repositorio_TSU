// archivo-common.js
document.addEventListener('DOMContentLoaded', function() {
    var userId = localStorage.getItem('userId');
    if (userId) {
        console.log("ID del usuario:", userId);
        // Realizar acciones basadas en el userId, como cargar datos del usuario o modificar la UI
    } else {
        console.log("No hay ID de usuario en localStorage.");
    }
});
