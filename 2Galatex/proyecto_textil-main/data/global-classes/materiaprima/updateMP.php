<?php
    include ('matPrima.php');
    $mp = new matPrima();

    $mp -> setClave($_POST['txtclave']);
    $mp -> setFechaRecibido($_POST['txtfecha']);
    $mp -> setStock($_POST['txtstock']);
    $mp -> setPrecio($_POST['txtprecio']);
    $mp -> setProveedor($_POST['txtproveedor']);
    

    $newid = $mp->updateMatP();

    echo $newid;

    header("Location: ../../global-classes/materiaPrima/index-matp.php");

?>