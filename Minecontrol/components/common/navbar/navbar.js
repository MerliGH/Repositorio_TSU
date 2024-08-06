document.addEventListener('DOMContentLoaded', async () => {
    const rol = sessionStorage.getItem('empleadoRol');
    let navbarEmpresa = await fetch('components/navbar/navbar.html');
    if (rol === 'administrador') {
        navbarEmpresa = await fetch('components/navbarAdmin/navbar.html');
    }
    const navbar = await navbarEmpresa.text();
    document.querySelector('#navbar').outerHTML = navbar;
});

