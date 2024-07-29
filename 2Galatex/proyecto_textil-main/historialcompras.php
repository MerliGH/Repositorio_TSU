<?php
include('./data/global-classes/loginu/Session.php');
$nombreUser = isset($_SESSION['nickname']) ? $_SESSION['nickname'] : '';
?>
<!DOCTYPE html>
<html lang="en">





<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/menuprincipal.css">
    <title>INICIO</title>
</head>

<body>
    <div class="banner">
        <a>Ordena en línea, a un sólo click de tu alcance</a>
    </div>
    <!--MENU-->
    <nav class="navar">
        <a class="navbar-brand">Gala<span>Tex</span>.</a>
        <ul class="links">
            <li><a href="index.php">INICIO</a></li>
            <li><a href="./data/global-index/vestidos/princ-vestidos.php">VESTIDOS</a></li>
            <?php if($menuUser){
            echo '<li><a href="historialcompras.php">TUS PEDIDOS</a></li>';
            }
            ?>
           
        </ul>
        <?php if($menuUser){  
        echo '<br>';    
        echo '<p class = "Usuario">'.$User.'</p>';
        echo '<a href="./data/global-classes/loginu/LogOut.php"><img src="./img/salir.png" alt="" class="carrito"></a>';
        echo '<a href="data/global-classes/Carrito/viewCart.php"><img src="./img/carrito.png" alt="" class="carrito"></a>';
        echo '<a href="data/global-classes/usuarios/index-perfil.php"><img src="./img/usuario.png" alt="" class="carrito"></a>';
        }else{
        echo '<div class="icon">';
            echo '<a href="registro.php" class="btn agendarcita">Registrarse</a>';
            echo '<a href="iniciarSesion.php" class="btn agendarcita">Iniciar Sesión</a>';
        echo '</div>';
        } ?>
    </nav>

    <Main>
        <div id="main-container">
            <h3><center>PEDIDOS</center></h3>
            <table>
                <thead>
                    <tr class = "pedidos">
                        <th>FECHA</th>
                        <th>CANTIDAD DE VESTIDOS</th>
                        <th>SUBTOTAL</th>
                        <th>IVA</th>
                        <th>TOTAL</th>
                        

                    </tr>
                </thead>
                <?php
                include_once('./data/global-classes/pedidos/usuarios.php');
                $miPed = new usuarios();
                $miPed->setNombreUser($nombreUser); 
                $query = $miPed->getOnePed();
                if ($query != 'wrong') {
                    while ($fila = mysqli_fetch_assoc($query)) {
                        echo "<tr>";
                        //echo "<td>" . $fila['num'] . " </td> ";
                        echo "<td>" . $fila['fecha'] . " </td> ";
                        echo "<td>" . $fila['cantTotalVest'] . " </td> ";
                        echo "<td>" . $fila['subtotal'] . " </td> ";
                        echo "<td>" . $fila['IVA'] . " </td> ";
                        echo "<td>" . $fila['total'] . " </td> ";
                        //echo "<td>" . $fila['nombreUser'] . " </td> ";
                        echo "</tr>";
                    }
                }
                
                ?>
            </table>
        </div>
    </Main>
    

    </section>
    <footer>
        <section>
            <p class='foot'>&copy;2023 Derechos reservados</p>
            <p class='foot'>Privacidad</p>
            <p class='foot'>Términos y condiciones</p>
        </section>
    </footer>

</body>

</html>