<?php
include('usuarios.php');
include('../clientes/clientes.php');

$user = new clientes();

// Obtén el nombre de usuario actual y el nuevo nombre desde el formulario
$viejoCorreo = $_POST['txtCorreo'];
$nuevoCorreo = $_POST['txtNewCorreo'];

$user->setCorreo($viejoCorreo);
$user->setNuevoCorreo($nuevoCorreo);

// Ejecuta la actualización del nombre de usuario
$success = $user->updateCorreo();

if ($success) 
{

    session_start();
    $_SESSION['correo'] = $nuevoCorreo;

    // Redirige a la página de perfil con el nuevo nombre como parámetro
    header("Location: index-perfil.php?nombre=" . urlencode($nuevoCorreo));
    exit();
} 
else 
{
    echo "Error al actualizar";
}
?>
