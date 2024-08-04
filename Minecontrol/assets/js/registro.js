function obtenerUsuarios() 
{
    fetch('https://polliwog-desired-egret.ngrok-free.app/usuarios/')
        .then(response => response.json())
        .then(data => {
            console.log(data); // Añadir para inspeccionar los datos
            const listaUsuarios = $('#listaUsuarios');
            listaUsuarios.empty(); 

            data.forEach(usuario => {
                const listItem = $('<li>').text(`ID Usuario: ${usuario.correo}, Email: ${usuario.password}`);
                listaUsuarios.append(listItem);
            });
        })
        .catch(error => console.error('Error:', error));
}
