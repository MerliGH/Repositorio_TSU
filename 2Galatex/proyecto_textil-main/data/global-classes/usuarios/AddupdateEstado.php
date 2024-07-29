<?php
include('usuarios.php');
$usuario = new usuarios();
// Obtén el estado actual y el nuevo estado desde el formulario
$viejoNombre = $_POST['txtNombre'];
$viejoEstado = $_POST['txtEstado'];
$nuevoEstado = 'inactivo';
$usuario->setNombreUser($viejoNombre);
$usuario->setEstado($viejoEstado);
$usuario->setNuevoEstado($nuevoEstado);
// Ejecuta la actualización del estado
$success = $usuario->updateEstado();
if ($success) 
{
    session_start();
    $_SESSION['estado'] = $nuevoEstado;
    
    $_SESSION['nombreUser'] = $viejoNombre;
    
    session_destroy();
    header("Location: ../../../index-principal.php");
    exit();
} 
else 
{
    echo "Error al actualizar";
}
?>