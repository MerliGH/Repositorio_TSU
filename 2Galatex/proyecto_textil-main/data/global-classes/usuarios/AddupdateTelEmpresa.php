<?php
include('usuarios.php');
include('../clientes/clientes.php');

$user = new clientes();

// Obtén el nombre de usuario actual y el nuevo nombre desde el formulario
$TelempVieja = $_POST['txtTelEmp'];
$nuevoTelEmp = $_POST['txtNewTelEmp'];

$user->setTelEmpresa($TelempVieja);
$user->setNuevoTelEmp($nuevoTelEmp);

// Ejecuta la actualización del nombre de usuario
$success = $user->updateTelEmpresa();

if ($success) 
{

    session_start();
    $_SESSION['nombreEmpresa'] = $nuevoTelEmp;

    // Redirige a la página de perfil con el nuevo nombre como parámetro
    header("Location: index-perfil.php?nombre=" . urlencode($nuevoTelEmp));
    exit();
} 
else 
{
    echo "Error al actualizar";
}
?>
