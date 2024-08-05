$(document).ready(function() {
    $('#obtenerUsuariosBtn').on('click', obtenerUsuarios);
});

function obtenerUsuarios() {
    fetch('https://polliwog-desired-egret.ngrok-free.app/usuarios2/')
        .then(response => response.json())
        .then(data => {
            console.log(data); // Añadir para inspeccionar los datos
            const listaUsuarios = $('#listaUsuarios');
            listaUsuarios.empty(); 

            // Asegúrate de que `data` tenga el formato correcto
            data.forEach(usuario => {
                const listItem = $('<li>').text(`ID Usuario: ${usuario.id}, Email: ${usuario.email}`);
                listaUsuarios.append(listItem);
            });
        })
        .catch(error => console.error('Error:', error));
}

