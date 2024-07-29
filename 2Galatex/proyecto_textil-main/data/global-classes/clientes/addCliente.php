<?php
include_once('./Clientes.php');
include_once('../usuarios/usuarios.php');

$myUser = new clientes();
$myUser->setrfc($_POST['txtrfc']);
$myUser->setNombreEmpresa($_POST['txtempresa']);
$myUser->setTelEmpresa($_POST['txtTelEmpresa']);
$myUser->setNombreContacto($_POST['txtNombreCont']);
$myUser->setApPat($_POST['txtApPat']);
$myUser->setApMat($_POST['txtApMat']);
$myUser->setCorreo($_POST['txtCorreo']);
$myUser->setTelContact($_POST['txtTelContact']);

// Inserta el cliente en la base de datos
$clienteID = $myUser->setUser();

if ($clienteID > 0) {
    // El cliente fue insertado, ahora insertar el usuario
    $myUser = new usuarios();
    $myUser->setNombreUser($_POST['txtnick']);
    $myUser->setPassword($_POST['txtpass']);
    $myUser->setCliente($clienteID);
    $myUser->setCategory('C');

    $newid = $myUser->setUsuario();

    header("location: ../../../index.php");
} else {
    // El cliente no fue insertado, regresar al registro
    header("location: ../../../registro.php");
}
?>


