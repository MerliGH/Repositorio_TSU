<?php
session_start();

// Establecer valores predeterminados si las variables de sesión no están definidas
if (!isset($_SESSION['ingredient'])) 
{
    $_SESSION['ingredient'] = 'W'; // Ingrediente predeterminado
}


?>
