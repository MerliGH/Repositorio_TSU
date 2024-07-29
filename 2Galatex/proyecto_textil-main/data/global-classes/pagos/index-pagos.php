<?php
include_once('./../../global-classes/loginAdmin/sessionAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <title>PAGOS</title>
</head>

<body>
    <header id="menurapido"></header>
    <div class="area"></div>
    <?php include('../menuprin/menuadmin.php'); ?>
    <Main>
        <div id="main-container">
            <h3>PAGOS</h3>
            <table>
                <thead>
                    <tr>
                        <th>NUM. DE PEDIDO</th>
                        <th>CLIENTE</th>
                        <th>NUM. DE PAGO</th>
                        <th>FECHA DEL PAGO</th>
                        <th>CONCEPTO</th>
                        <th>REFERENCIA BANCARIA</th>
                        <th>MONTO DEL PAGO</th>

                    </tr>
                </thead>
                <?php
                include('pagos.php');
                $miobjeto = new pagos();
                $consulta = $miobjeto->getAllpag();
                if ($consulta != 'wrong') {
                    while ($fila = mysqli_fetch_assoc($consulta)) {
                        echo "<tr>";
                        echo "<td>" . $fila['num'] . " </td> ";
                        echo "<td>" . $fila['nombreEmpresa'] . " </td> ";
                        echo "<td>" . $fila['pedido'] . " </td> ";
                        echo "<td>" . $fila['fecha'] . " </td> ";
                        echo "<td>" . $fila['concepto'] . " </td> ";
                        echo "<td>" . $fila['referenciaBancaria'] . " </td> ";
                        echo "<td>" . $fila['cantPagada'] . " </td> ";
                        
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