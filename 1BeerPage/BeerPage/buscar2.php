<?php
    include('session.php');

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Establecer la variable de sesión para el término de búsqueda
        $_SESSION['ingredient'] = $_POST['txtingredient'];
        $_SESSION['orden'] = $_POST['orden'];

        // Si hay un ingrediente especificado, redirigir a knowingmore2.php
        if (!empty($_SESSION['ingredient'])) {
            header('Location: knowingmore2.php');
            exit(); // Asegurar que se detenga la ejecución del script después de la redirección
        }
    }

    // Si no hay un ingrediente especificado, redirigir a knowingmore.php
    header('Location: knowingmore.php');
?>
