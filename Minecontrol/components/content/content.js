document.addEventListener('DOMContentLoaded', async () => {
    const rol = sessionStorage.getItem('empleadoRol');
    let content;
    if (rol === 'administrador') {
        content = await fetch('components/contentAdmin/content.html');
    } else if (rol === 'Empresa') {
        content = await fetch('components/content/content.html');
    }
    document.querySelector('#content').outerHTML = await content.text();
    updateContent(rol);
});

async function updateContent(rol) {
    if (rol === 'administrador') {
        updateAdminContent();
    } else if (rol === 'Empresa') {
        updateEmpresaContent();
    }
}

async function updateAdminContent() {
    document.querySelector("#minas-list").innerHTML = 'something';
}
 