<?php
include_once('../usuarios/usuarios.php');
include_once('../clientes/clientes.php');
$myUser = new usuarios();
$myUser->setNombreUser($_POST['txtnick']);
$myUser->setPassword($_POST['txtpass']);
$dataset = $myUser->getUser();

if ($dataset != false) {
    $count = mysqli_num_rows($dataset);

    if ($count == 1) {
        $fila = mysqli_fetch_assoc($dataset);

        // Verificar el estado de la cuenta
        if ($fila['estado'] == 'activo') {
            // La cuenta está activa, permitir el inicio de sesión
            session_start();
            $_SESSION['numero'] = $fila['num'];
            $_SESSION['nickname'] = $fila['nombreUser'];
            $_SESSION['pass'] = $fila['password'];
            header('location:../../../index.php');
        } else {
            echo "INICIO DE SESION FALLIDO";
            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="../../../css/iniciarsesion.css">
                <title>Cuenta Inactiva</title>
            </head>

            <body>
    <div class="contact_form">
        <h1>La cuenta está desactivada. No se puede iniciar sesión.</h1>
        <a href="../../../index.php" class="ir-menu">Ir a Menú Principal</a>
    </div>
</body>

            </html>
            <?php
        }
    } else {
        echo "No coinciden los datos.";
    }
} else {
    header('Location:../../../iniciarSesion.php');

}
?>