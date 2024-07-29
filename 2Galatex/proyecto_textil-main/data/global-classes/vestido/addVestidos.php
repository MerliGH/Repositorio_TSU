<?php
include('vestidos.php');

$myVest = new vestidos();

$myVest->setNombre($_POST['txtNombre']);
$myVest->setTalla($_POST['txtTalla']);
$myVest->setDescripcion($_POST['txtDescripcion']);
$myVest->setPrecioVenta($_POST['numPrecioVenta']);
$myVest->setFabrica($_POST['txtFabrica']);
$myVest->setLoteVestido($_POST['numLoteVestido']);
$newid = $myVest->setVestido();

?>