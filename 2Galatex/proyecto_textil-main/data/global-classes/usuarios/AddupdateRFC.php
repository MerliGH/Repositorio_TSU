<?php
include('usuarios.php');
include('../clientes/clientes.php');

$user = new clientes();

// Obtén el nombre de usuario actual y el nuevo nombre desde el formulario
$viejoRFC = $_POST['txtRFC'];
$nuevoRFC = $_POST['txtNewRFC'];

$user->setrfc($viejoRFC);
$user->setNuevoRFC($nuevoRFC);

// Ejecuta la actualización del nombre de usuario
$success = $user->updateRFC();

if ($success) 
{

    session_start();
    $_SESSION['rfc'] = $nuevoRFC;

    // Redirige a la página de perfil con el nuevo nombre como parámetro
    header("Location: index-perfil.php?nombre=" . urlencode($nuevoRFC));
    exit();
} 
else 
{
    echo "Error al actualizar";
}
?>
