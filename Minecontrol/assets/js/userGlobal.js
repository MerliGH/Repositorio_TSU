// user-global.js
document.addEventListener('DOMContentLoaded', () => {
    // Obtén el userId de los parámetros de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const urlUserId = urlParams.get('id');

    // Si existe un userId en la URL, guárdalo en localStorage
    if (urlUserId) {
        localStorage.setItem('userId', urlUserId);
        console.log('ID de usuario guardado desde URL:', urlUserId);
        document.getElementById('user-name')?.textContent = 'Usuario ID: ' + urlUserId;
    } else {
        // Si no hay userId en la URL, obtenlo de localStorage
        const storedUserId = localStorage.getItem('userId');
        console.log('ID de usuario almacenado:', storedUserId);
        if (storedUserId) {
            document.getElementById('user-name')?.textContent = 'Usuario ID: ' + storedUserId;
        } else {
            console.log('No se encontró ID de usuario en localStorage');
            document.getElementById('user-name')?.textContent = 'No ID found';
        }
    }

    // Actualiza todos los enlaces para incluir el userId
    const userId = localStorage.getItem('userId');
    if (userId) {
        document.querySelectorAll('a').forEach(anchor => {
            const href = anchor.getAttribute('href');
            if (href) {
                if (href.indexOf('?') === -1) {
                    anchor.setAttribute('href', href + '?id=' + encodeURIComponent(userId));
                } else {
                    anchor.setAttribute('href', href + '&id=' + encodeURIComponent(userId));
                }
            }
        });
    }
});
