<!DOCTYPE html>
<?php include('../loginu/Session.php'); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/style2.css">
    <link rel="stylesheet" href="../../../css/menuprincipal.css">

    <title>LOGIN</title>
</head>

<body>
   <div class="banner">
        <a>Ordena en línea, a un sólo click de tu alcance</a>
    </div>
    <!--MENU-->
    <nav class="navar">
        <a class="navbar-brand">Gala<span>Tex</span>.</a>
        <ul class="links">
            <li><a href="../../../index.php">INICIO</a></li>
            <li><a href="../../global-index/vestidos/princ-vestidos.php">VESTIDOS</a></li>
            <?php if($menuUser){
            echo '<li><a href="../../../historialcompras.php">TUS PEDIDOS</a></li>';
            }
            ?>
        </ul>
        <?php if($menuUser){  
        echo '<br>';    
        echo '<p class = "Usuario">'.$User.'</p>';
        echo '<a href="../../global-classes/loginu/LogOut.php"><img src="../../../img/salir.png" alt="" class="carrito"></a>';
        echo '<a href="viewCart.php"><img src="../../../img/carrito.png" alt="" class="carrito"></a>';
        echo '<a href="../../global-classes/usuarios/index-perfil.php"><img src="../../../img/usuario.png" alt="" class="carrito"></a>';
        
        }else{
        echo '<div class="icon">';
            echo '<a href="registro.php" class="btn agendarcita">Registrarse</a>';
            echo '<a href="iniciarSesion.php" class="btn agendarcita">Login</a>';
        echo '</div>';
        } ?>
    </nav>

    <br>

    <Main>
        <?php
        if ($menuUser == true) {
            if (isset($_SESSION['shopCart']) && !empty($_SESSION['shopCart'])) {
                //print_r($_SESSION['shopCart']);
                echo '
            <table>
            <tr>
            <td>Código</td>
            <td>Vestido</td>
            <td>Precio</td>
            <td>Talla</td>
            <td>Descripción</td>
            <td>Cantidad</td>
            <td>Subtotal</td>
            
            <td></td>
            </tr>';
            $total= 0;
            $totalqty = 0;
            foreach($_SESSION['shopCart'] as $element){
                $subtotal = $element['precioventa'] * $element['qty'];
                $total += $subtotal;
                $totalqty += $element['qty']; //Linea duplicada en shopCart
                echo "<tr>
                <td>".$element['codigo']."</td>
                <td>".$element['nombre']."</td>
                <td>".$element['precioventa']."</td>
                <td>".$element['talla']."</td>
                <td>".$element['descripcion']."</td>
                <td>".$element['qty']."</td>
                <td>".$subtotal."</td>";
                
                echo "<td>
                </tr>";
                }
                echo "<tr><td></td><td></td><td>Total</td>";
                echo "<td>".$total."</td>
                    </tr>";
                echo '</table>';
                $_SESSION['total'] = $total;
                $_SESSION['totalqty'] = $totalqty;
                $_SESSION['subtotal'] = $total/1.16;
                $_SESSION['iva'] = $total - $_SESSION['subtotal'];
                echo '
                <form action="emptyCar.php">
                <input class = "btnEmpty" type="submit" value="Vaciar Carrito">
                <br>
                </form>';
                echo '
                <br>
                <form action="Buy.php">
                <input class = "btnCompra" type="submit" value="Comprar">
                </form>';
            }
            else {
                echo '<h2><center>Carrito Vacío</center></h2>';
            }
        } else {
            echo "Realice el login";
        }
        ?>
    </Main>

    <footer>
        <section>
            <p class='foot'>&copy;2023 Derechos reservados</p>
            <p class='foot'>Privacidad</p>
            <p class='foot'>Términos y condiciones</p>
        </section>
    </footer>
</body>

</html>