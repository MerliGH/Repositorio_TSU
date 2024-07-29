<?php
include_once('../usuarios/usuarios.php');

$myUser = new usuarios();

session_start();

if (isset($_SESSION['recoveryInfo'])) {
$recoveryInfo = $_SESSION['recoveryInfo'];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $nombreUser = $recoveryInfo['nombreUser'];
    if ($newPassword === $confirmPassword) {
        // Las contraseñas coinciden, proceder con la actualización
        $myUser->setNombreUser($nombreUser);
        $myUser->setPassword($newPassword);
        $updateResult = $myUser->updatePassword($newPassword);
        if ($updateResult) {
            //echo "Contraseña actualizada con éxito. Redirigiendo a la página de inicio de sesión...";
            header('Location:../../../index.php');
            exit();
        } else {
            echo "Error al actualizar la contraseña.";
        }
    } else {
        header('Location:../../../cambioContrasenia.php?username='. $recoveryInfo['nombreUser']);
    }
}
?>
