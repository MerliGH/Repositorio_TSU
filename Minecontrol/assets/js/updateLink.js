document.addEventListener('DOMContentLoaded', function() {
    // Obtén el ID de la URL actual
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');

    // Construye el enlace con el ID
    if (id) {
        const brandLink = document.getElementById('brand-link');
        brandLink.href = `suscripciones.html?id=${id}`;
    }
});
