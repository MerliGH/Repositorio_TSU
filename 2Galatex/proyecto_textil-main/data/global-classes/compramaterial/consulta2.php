<?php
include_once('./../../global-classes/loginAdmin/sessionAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <title>COMPRAS</title>
</head>

<body>
    <header id="menurapido"></header>
    <div class="botag"><a type='button' value='Agregar' href='../compras/index-compras.php'>Ver productos comprados</a></div>
    <div class="area"></div>
    <?php include('../menuprin/menuadmin.php'); ?>
    <Main>
        <div id="main-container">
            <h3>PRODUCTOS DE UNA COMPRA</h3>
            <table>

                <thead>
                    <tr>
                        <th>NUM. DE COMPRA</th>
                        <th>NOMBRE DEL MATERIAL</th>
                        <th>NOMBRE TIPO DE MATERIAL</th>
                        <th>PRECIO</th>
                        <th>CANTIDAD</th>
                        <th>IMPORTE</th>
                    </tr>
                </thead>
                <?php
                include('compramat.php');
                $miobjeto = new compramat();
                $consulta = $miobjeto->getAllcomMat();
                if ($consulta != 'wrong') {
                    while ($fila = mysqli_fetch_assoc($consulta)) {
                        echo "<tr>";
                        echo "<td>" . $fila['compra'] . " </td> ";
                        echo "<td>" . $fila['nombreMaterial'] . " </td> ";
                        echo "<td>" . $fila['nombre'] . " </td> ";
                        echo "<td>" . $fila['precio'] . "</td>";
                        echo "<td>" . $fila['cantidad'] . " </td> ";
                        echo "<td>" . $fila['importe'] . " </td> ";
              
            
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>
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