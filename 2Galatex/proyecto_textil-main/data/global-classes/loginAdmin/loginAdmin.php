<?php
include ('admin.php');
$myUser=new Admin();
$myUser->setNombreUser($_POST['txtnicku']);
$myUser->setPassword($_POST['txtpassw']);
$dataset=$myUser->getAdmin();
if($dataset!="vacio"){
$count=mysqli_num_rows($dataset);
if($count==1){
    $fila=mysqli_fetch_assoc($dataset);
    session_start();
    $_SESSION['numero']=$fila['num'];
    $_SESSION['nickname']=$fila['nombreUser'];
    $_SESSION['pass']=$fila['password'];
}else{
    echo "no coinciden los datos";
    //header('location: ../../../iniciarSesionAdm.php');
exit();
}
}else{
    echo "no hay datos";
}
header('location:../inicio/index.php');
?>
