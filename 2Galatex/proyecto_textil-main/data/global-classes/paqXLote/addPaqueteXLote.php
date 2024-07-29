<?php
include('paqueteXLote.php');

$myPaquete = new paqueteXLote();

$myPaquete->setCantPaquete($_POST['numCantPaquete']);
$myPaquete->setCantVestidos($_POST['numCantVestidos']);
$myPaquete->setLoteVestido($_POST['numLoteVestido']);
$newid = $myPaquete->setPaquetes();

?>