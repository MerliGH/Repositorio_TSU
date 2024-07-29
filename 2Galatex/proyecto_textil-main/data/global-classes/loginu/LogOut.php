<?php
//Proposito de cerrar session
session_start();
session_destroy();
header('location:../../../index.php');
?>