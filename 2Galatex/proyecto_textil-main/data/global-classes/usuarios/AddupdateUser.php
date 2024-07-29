<?php
include('usuarios.php');

$user = new usuarios();

// Obtén el nombre de usuario actual y el nuevo nombre desde el formulario
$nombreUsuarioActual = $_POST['txtUser'];
$nuevoNombreUsuario = $_POST['txtNewUser'];

$user->setNombreUser($nombreUsuarioActual);
$user->setNuevoNombreUser($nuevoNombreUsuario);

// Ejecuta la actualización del nombre de usuario
$success = $user->updateNameUser();

if ($success) 
{

    session_start();
    $_SESSION['nickname'] = $nuevoNombreUsuario;

    // Redirige a la página de perfil con el nuevo nombre como parámetro
    header("Location: index-perfil.php?nombre=" . urlencode($nuevoNombreUsuario));
    exit();
} 
else 
{
    echo "Error al actualizar el nombre de usuario.";
}
?>
