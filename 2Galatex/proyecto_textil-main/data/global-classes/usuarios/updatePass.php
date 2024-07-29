<?php
        include_once('./../../global-classes/loginu/Session.php');
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/vestidos.css">
    
    <link rel="stylesheet" href="../../../css/menuprincipal.css">
    <title>VESTIDOS</title>
</head>


<body>
<!--MENU-->
    <div class="banner">
        <a>Ordena en línea, a un sólo click de tu alcance</a>
    </div>

<!--MENU-->
    <nav class="navar">
        <a class="navbar-brand">Gala<span>Tex</span>.</a>
        <ul class="links">
            <li><a href="./../../../index-principal.php">INICIO</a></li>
            <li><a href="./princ-vestidos.php">VESTIDOS</a></li>
            <li><a href="#">EN PROCESO</a></li>
            <li><a href="#">EN PROCESO</a></li>
        </ul>   

        <div class="user-info">
    <?php if($menuUser) { ?>
        <a href="./../../global-classes/loginu/LogOut.php" class="btn agendarcita">Salir</a>
        <a href="#"><img src="../../../img/carrito.png" alt="" class="carrito"></a>
        <a href="#"><img src="../../../img/usuario.png" alt="" class="carrito"></a>
        <a href="#"><img src="../../../img/config.png" alt="" class="carrito"></a>
    </div>
    </nav> <!-- Cierra la etiqueta nav aquí -->

    <?php
    include_once('./../../global-classes/loginu/Session.php');
    include_once('./../../global-classes/usuarios/usuarios.php');
    $nombreUsuario = $_SESSION['nickname'];

    $conexion = new conexion();
    $usuario = new usuarios();

    $contrasenaUsuario = $conexion->getPass($nombreUsuario);

    if ($contrasenaUsuario !== null) {
        $usuario->setNombreUser($nombreUsuario);
        $usuario->setPassword($contrasenaUsuario);

        $datosUsuario = $usuario->getUser();

        if ($datosUsuario != "Wrong" && mysqli_num_rows($datosUsuario) > 0) {
            $infoUsuario = mysqli_fetch_assoc($datosUsuario);

            // Aquí va el SELECT y se muestra toda la información del usuario
            ?>
            <div class="user-info">
            <form method="post" action="AddupdatePass.php"> <!-- Agregado: Inicio del formulario -->
            <table>
                <tr>
                    <td>Password actual</td>
                    <td><input type="text" name="txtPass" value="<?php echo $infoUsuario['password']; ?>" readonly></td>
                </tr>

                <tr>
                    <td>Password vieja:</td>
                    <td><input type="text" name="txtNewPass" placeholder="Ingrese nueva password"></td>
                </tr>
             </table>
            
             <p><button type="submit">Enviar formulario</button></p>
            </div>
            <?php
        } 
        else 
        {
            echo "No se pudo obtener la información del usuario.";
        }
    } 
    else 
    {
        echo "Error que jode en UPDATEUSER";
    }
    ?>
    <?php } else { ?>
        <div class="icon">
            <a href="../../../registro.php" class="btn agendarcita">Registrarse</a>
            <a href="../../../iniciarSesion.php" class="btn agendarcita">Login</a>
        </div>
    <?php } ?>
</div>
</nav> <!-- Cierra la etiqueta nav después de todo el contenido dentro del div.user-info -->
  
<footer>
        <section>
            <p class="foot">&copy;2023 Derechos reservados</p>
            <p class="foot">Privacy</p>
            <p class="foot">Terminos y condiciones</p>
        </section>
</footer>

