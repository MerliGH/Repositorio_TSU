<?php
    include('session.php');

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Establecer la variable de sesión para el término de búsqueda
        $_SESSION['ingredient'] = $_POST['txtingredient'];
        // No es necesario establecer una bandera para indicar que se ha realizado una búsqueda,
        // ya que podemos simplemente verificar si $_SESSION['ingredient'] está definido más adelante.
        $_SESSION['orden'] = $_POST['orden'];

    }

    // Redirigir de vuelta a la página de cervezas
    header('Location: knowingmore2.php');
?>
