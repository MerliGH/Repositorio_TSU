<?php
include ('lotes.php');
$lot = new lotes();

$lot -> setCodVestido($_POST['txtcodvestido']);
$lot -> setFechaProduccion($_POST['txtfecha']);
$lot -> setCantDefectuosos($_POST['txtdef']);
$lot -> setCantTotalGen($_POST['txtgen']);


$newid = $lot->insertNewLote();

echo $newid;

header("Location: ../../global-classes/lotes/index-lotes.php");
?>