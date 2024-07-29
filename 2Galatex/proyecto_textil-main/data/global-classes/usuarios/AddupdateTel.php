<?php
include('usuarios.php');
include('../clientes/clientes.php');

$user = new clientes();

// Obtén el nombre de usuario actual y el nuevo nombre desde el formulario
$viejoTel= $_POST['txtTel'];
$nuevoTel = $_POST['txtNewTel'];

$user->setTelContact($viejoTel);
$user->setNuevoTel($nuevoTel);

// Ejecuta la actualización del nombre de usuario
$success = $user->updateTel();

if ($success) 
{

    session_start();
    $_SESSION['telContact'] = $nuevoTel;

    // Redirige a la página de perfil con el nuevo nombre como parámetro
    header("Location: index-perfil.php?nombre=" . urlencode($nuevoTel));
    exit();
} 
else 
{
    echo "Error al actualizar";
}
?>
