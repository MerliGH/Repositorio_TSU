<?php
include ('matPrima.php');
$mp = new matPrima();

$mp -> setClave($_POST['txtclave']);
$mp -> setNombreMaterial($_POST['txtnombre']);
$mp -> setFechaRecibido($_POST['txtfecha']);
$mp -> setDescripcion($_POST['txtdescripcion']);
$mp -> setStock($_POST['txtstock']);

$mp -> setPrecio($_POST['txtPrecio']);
$mp -> setProveedor($_POST['txtproveedor']);

$newid = $mp->insertNewMP();

echo $newid;

header("Location: ../../global-classes/materiaPrima/index-matp.php");
?>