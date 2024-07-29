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
    <div class="botag"><a type='button' value='Agregar' href='../compramaterial/consulta2.php'>Ver productos comprados</a></div>
    <div class="area"></div>
    <?php include('../menuprin/menuadmin.php'); ?>
    <Main>
        <div id="main-container">
            <h3>COMPRAS</h3>
            <table>

                <thead>
                    <tr>
                        <th>NOMBRE DE LA FABRICA</th>
                        <th>NUM. DE COMPRA</th>
                        <th>FECHA</th>
                        <th>PROVEEDOR</th>
                        <th>SUBTOTAL</th>
                        <th>IVA</th>
                        <th>TOTAL</th>
                        <th>CANT COMPRADA</th>
                    </tr>
                </thead>
                <?php
                include('compras.php');
                $miobjeto = new compras();
                $consulta = $miobjeto->getAllcompras();
                if ($consulta != 'wrong') {
                    while ($fila = mysqli_fetch_assoc($consulta)) {
                        echo "<tr>";
                        echo "<td>" . $fila['nombre'] . " </td> ";
                        echo "<td>" . $fila['num'] . " </td> ";
                        echo "<td>" . $fila['fecha'] . " </td> ";
                        echo "<td>" . $fila['nombreContact'] . " " . $fila['apPat'] . " " . $fila['apMat'] . "</td>";
                        echo "<td>" . $fila['subTotal'] . " </td> ";
                        echo "<td>" . $fila['iva'] . " </td> ";
                        echo "<td>" . $fila['total'] . " </td> ";
                        echo "<td>" . $fila['cantComprada'] . " </td> ";
                        
            
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