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
            <li><a href="./../../../index.php">INICIO</a></li>
            <li><a href="./../../global-index/vestidos/princ-vestidos.php">VESTIDOS</a></li>
            <?php if($menuUser){
            echo '<li><a href="../../../historialcompras.php">TUS PEDIDOS</a></li>';
            }
            ?>
        </ul>   
        <div class="user-info">
    <?php if($menuUser) { ?>
        <a href="./../../global-classes/loginu/LogOut.php"><img src="../../../img/salir.png" alt="" class="carrito"></a>
        <a href="../Carrito/viewcart.php"><img src="../../../img/carrito.png" alt="" class="carrito"></a>
        <a href="#"><img src="../../../img/usuario.png" alt="" class="carrito"></a>
    </div>
    </nav> 
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
            <table>
                <tr>
                    <td>Nombre de usuario:</td>
                    <td><?php echo $infoUsuario['nombreUser']; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td><?php echo "********"; ?></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Registro Federal de Contribuyente:</td>
                    <td><?php echo $infoUsuario['rfc']; ?></td>
                    <td><button onclick="location.href='updateRFC.php'" type="button">✎</button></td>
                </tr>
                <tr>
                    <td>Nombre de la Empresa:</td>
                    <td><?php echo $infoUsuario['nombreEmpresa']; ?></td>
                    <td><button onclick="location.href='updateEmpresa.php'" type="button">✎</button></td>
                </tr>
                <tr>
                    <td>Telefono de la Empresa:</td>
                    <td><?php echo $infoUsuario['telEmpresa']; ?></td>
                    <td><button onclick="location.href='updateTelEmpresa.php'" type="button">✎</button></td>
                </tr>
               
                <tr>
                    <td>Correo:</td>
                    <td><?php echo $infoUsuario['correo']; ?></td>
                    <td><button onclick="location.href='updateCorreo.php'" type="button">✎</button></td>
                </tr>
                <tr>
                    <td>Tel de contacto:</td>
                    <td><?php echo $infoUsuario['telContact']; ?></td>
                    <td><button onclick="location.href='updateTel.php'" type="button">✎</button></td>
                </tr>
                <tr>
                
                <td></td>
                <td><td><button onclick="location.href='updateEstado.php'" type="button">Dar de baja mi cuenta</button></td>
                </tr>
               
            </table>
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
        echo "Error.";
    }
    ?>
    <?php } else { ?>
        <div class="icon">
            <a href="../../../registro.php" class="btn agendarcita">Registrarse</a>
            <a href="../../../iniciarSesion.php" class="btn agendarcita">Login</a>
        </div>
    <?php } ?>
</div>
</nav>
</body>
<footer>
        <section>
            <p class="foot">&copy;2023 Derechos reservados</p>
            <p class="foot">Privacy</p>
            <p class="foot">Terminos y condiciones</p>
        </section>
</footer>
</html>