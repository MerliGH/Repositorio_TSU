<?php
include_once('./usuarios.php');
    $myUser = new usuarios();
    $myUser->setNombreUser($_POST['txtnick']);
    $myUser->setPassword($_POST['txtpass']);
    $myUser->setCliente($_POST['txtpass']);
    $newid=$myUser->setUsuario();

header("location: ../../../index.php");

?>
