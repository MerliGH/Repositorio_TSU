<?php
include_once('../usuarios/usuarios.php');

$myUser = new usuarios();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $myUser->setNombreUser($_POST['txtnick']);
    $recoveryInfo = $myUser->getPasswordRecovery();
        if($recoveryInfo){
            session_start();
            $_SESSION['recoveryInfo'] = $recoveryInfo;
            header('Location:../../../cambioContrasenia.php?username='. $recoveryInfo['nombreUser']);
            exit();
        } else {
            header('Location:../../../RecuperacionPass.php');

        }
    }
?>