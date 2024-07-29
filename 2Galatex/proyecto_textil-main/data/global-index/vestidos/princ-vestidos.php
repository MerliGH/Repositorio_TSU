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
            <li><a href="./princ-vestidos.php">VESTIDOS</a></li>
            <?php if($menuUser){
            echo '<li><a href="../../../historialcompras.php">TUS PEDIDOS</a></li>';
            }
            ?>
        </ul>
        <?php if($menuUser){  
        echo '<br>';    
        echo '<p class = "Usuario">'.$User.'</p>';
        echo '<a href="./../../global-classes/loginu/LogOut.php"><img src="../../../img/salir.png" alt="" class="carrito"></a>';
        echo '<a href="./../../global-classes/Carrito/viewCart.php"><img src="../../../img/carrito.png" alt="" class="carrito"></a>';
        echo '<a href="./../../global-classes/usuarios/index-perfil.php"><img src="./../../../img/usuario.png" alt="" class="carrito"></a>';
        }else{
        echo '<div class="icon">';
        echo '<a href="../../../registro.php" class="btn agendarcita">Registrarse</a>';
        echo '<a href="../../../iniciarSesion.php" class="btn agendarcita">Iniciar Sesión</a>';
        echo '</div>';
        } ?>
    </nav>
        <h4><center>Elige Un Vestido Para comprar En Paquetes</center></h4>
    <!-- Catalogo de vestidos-->


            <section class="fila">
                <?php
                include('../../global-classes/vestidos/vestidos.php');
                $miobjeto = new vestidos();
                $consulta = $miobjeto->getAllVestidos();
                if ($consulta != 'wrong') {
                    while ($fila = mysqli_fetch_assoc($consulta)) {
                        echo '<section class="cards">';
                        echo '<section class="img">';
                        if ($fila['imagen1'] != "") {
                            echo '<div class="img" onclick="window.location=\'./indexinfo.php?codigo=' . $fila['codigo'] . '\'">' .
                                '<img src="../../../img/vestidosimg/' . $fila['imagen1'] . '" onerror="this.src=\'../../../img/noimage.jpg\'" class="img-card">' .
                                '</div>';
                        } else {
                            echo '<img src="../../../img/noimage.jpg"/ class="img-card">';
                        }
                        echo '</section>';
                        echo "<section class='title'>" . $fila['nombre'] . " </section> ";
                        echo "<section class='title'>" . "Precio: $" . $fila['precioVenta'] . " </section> ";
                        echo "<section class='title'>" . "Talla: " . $fila['talla'] . " </section> ";
                        echo "</section>";

                    }
                }
                ?>
            </section>
            <!--fin del while que itera los vestidos-->

            </div>

        </section>


    </section>
    </section>


    <footer>
        <section>
            <p class="foot">&copy;2023 Derechos reservados</p>
            <p class="foot">Privacidad</p>
            <p class="foot">Términos y condiciones</p>
        </section>
    </footer>

</body>

</html>