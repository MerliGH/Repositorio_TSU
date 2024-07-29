<?php
include('proveedores.php');
$myprov = new proveedores();
$myprov->setCodigo($_POST['txtCod']." ");
$myprov->setNombreEmpresa($_POST['txtEmpresa']." ");
$myprov->setnumTel($_POST['txtTel']." ");
$myprov->setNombreContact($_POST['txtNombre']." ");
$myprov->setApPat($_POST['txtaPat']." ");
$myprov->setApMat($_POST['txtaMat']." ");
$newid = $myprov->setProveedor();
//echo " ya termine";
header('location: index-prov.php');
?>

