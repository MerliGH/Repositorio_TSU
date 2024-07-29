<?php
include('usuarios.php');
include('../clientes/clientes.php');

$user = new clientes();

// Obtén el nombre de usuario actual y el nuevo nombre desde el formulario
$empVieja = $_POST['txtEmp'];
$nuevaEmp = $_POST['txtNewEmp'];

$user->setNombreEmpresa($empVieja);
$user->setNuevaEmpresa($nuevaEmp);

// Ejecuta la actualización del nombre de usuario
$success = $user->updateEmpresa();

if ($success) 
{

    session_start();
    $_SESSION['nombreEmpresa'] = $nuevaEmp;

    // Redirige a la página de perfil con el nuevo nombre como parámetro
    header("Location: index-perfil.php?nombre=" . urlencode($nuevaEmp));
    exit();
} 
else 
{
    echo "Error al actualizar";
}
?>
