document.addEventListener('DOMContentLoaded', function() {
    // Obtén el userId del localStorage
    const userId = localStorage.getItem('userId');
    console.log('ID de usuario desde localStorage:', userId);

    // Actualiza el contenido del DOM para mostrar un mensaje de bienvenida
    const userNameElement = document.getElementById('user-name');
    if (userNameElement) {
        if (userId) {
            //userNameElement.textContent = `Welcome, User ID: ${userId}`;
        } else {
            userNameElement.textContent = 'Welcome!';
        }
    } else {
        console.error('Elemento con ID "user-name" no encontrado.');
    }
});
