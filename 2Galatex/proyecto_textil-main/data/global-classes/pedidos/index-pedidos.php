<?php
include_once('./../../global-classes/loginAdmin/sessionAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <title>PEDIDOS</title>
</head>

<body>
    <header id="menurapido"></header>
    <div class="area"></div>
    <?php include('../menuprin/menuadmin.php'); ?>
    <Main>
        <div id="main-container">
            <h3>PEDIDOS</h3>
            <table>
                <thead>
                    <tr>
                        <th>NÚMERO</th>
                        <th>FECHA</th>
                        <th>CANTIDAD DE VESTIDOS</th>
                        <th>SUBTOTAL</th>
                        <th>IVA</th>
                        <th>TOTAL</th>
                        <th>CLIENTE</th>

                    </tr>
                </thead>
                <?php
                include('pedidos.php');
                $miobjeto = new pedidos();
                $consulta = $miobjeto->getAllPed();
                if ($consulta != 'wrong') {
                    while ($fila = mysqli_fetch_assoc($consulta)) {
                        echo "<tr>";
                        echo "<td>" . $fila['num'] . " </td> ";
                        echo "<td>" . $fila['fecha'] . " </td> ";
                        echo "<td>" . $fila['cantTotalVest'] . " </td> ";
                        echo "<td>" . $fila['subtotal'] . " </td> ";
                        echo "<td>" . $fila['IVA'] . " </td> ";
                        echo "<td>" . $fila['total'] . " </td> ";
                        echo "<td>" . $fila['cliente'] . " </td> ";
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