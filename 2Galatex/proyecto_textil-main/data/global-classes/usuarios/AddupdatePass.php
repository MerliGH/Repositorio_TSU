<?php
include('usuarios.php');

$user = new usuarios();

// Obtén el nombre de usuario actual y el nuevo nombre desde el formulario
$passVieja = $_POST['txtPass'];
$passNueva = $_POST['txtNewPass'];

$user->setPassword($passVieja);
$user->setNuevaPassword($passNueva);

// Ejecuta la actualización del nombre de usuario
$success = $user->updatePass();

if ($success) 
{

    session_start();
    $_SESSION['password'] = $passNueva;

    // Redirige a la página de perfil con el nuevo nombre como parámetro
    header("Location: index-perfil.php?nombre=" . urlencode($passNueva));
    exit();
} 
else 
{
    echo "Error al actualizar";
}
?>
