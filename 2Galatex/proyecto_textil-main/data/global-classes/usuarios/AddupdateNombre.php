<?php
include('usuarios.php');
include('../clientes/clientes.php');

$user = new clientes();

// Obtén el nombre de usuario actual y el nuevo nombre desde el formulario
$viejoNombre = $_POST['txtNombre'];
$nuevoNombre = $_POST['txtNewNombre'];

$viejoapPat = $_POST['txtapPat'];
$nuevoapPat = $_POST['txtNewapPat'];

$viejoapMat = $_POST['txtapMat'];
$nuevoapMat = $_POST['txtNewapMat'];

$user->setnombreContacto($viejoNombre);
$user->setNuevoNombre($nuevoNombre);

$user->setApPat($viejoapPat);
$user->setNuevoapPat($nuevoapPat);

$user->setApMat($viejoapMat);
$user->setNuevoapMat($nuevoapMat);

// Ejecuta la actualización del nombre de usuario
$success = $user->updateNombre();

if ($success) 
{

    session_start();
    $_SESSION['nombreContacto'] = $nuevoNombre;
    $_SESSION['apPat'] = $nuevoapPat;
    $_SESSION['apMat'] = $nuevoapMat;

    // Redirige a la página de perfil con el nuevo nombre como parámetro
    header("Location: index-perfil.php?nombre=" . urlencode($result['nuevoNombre']) . "&apPat=" . urlencode($result['nuevoapPat']) . "&apMat=" . urlencode($result['nuevoapMat']));
 exit();
} 
else 
{
    echo "Error al actualizar";
}


?>
