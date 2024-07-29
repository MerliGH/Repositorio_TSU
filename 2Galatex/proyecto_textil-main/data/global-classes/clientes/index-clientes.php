<?php
include_once('./../../global-classes/loginAdmin/sessionAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <title>CLIENTES</title>
    
</head>

<body>
    <header id="menurapido"></header>
    <div class="area"></div>
    <?php include('../menuprin/menuadmin.php'); ?>
    <Main>
        <div id="main-container">
            <h3>CLIENTES</h3>
            <table>

                <thead>
                    <tr>
                        <th>NUMERO</th>
                        <th>RFC</th>
                        <th>NOMBRE EMPRESA</th>
                        <th>TEL. EMPRESA</th>
                        <th>NOMBRE CONTACTO</th>
                        <th>AP. PATERNO</th>
                        <th>AP. MATERNO</th>
                        <th>CORREO</th>
                        <th>TEL. CONTACTO</th>
                    </tr>
                </thead>
                <?php
                include('Clientes.php');
                $miobjeto = new Clientes();
                $consulta = $miobjeto->getAllClientes();
                if ($consulta != 'wrong') {
                    while ($fila = mysqli_fetch_assoc($consulta)) {
                        echo "<tr>";
                        echo "<td>" . $fila['num'] . " </td> ";
                        echo "<td>" . $fila['rfc'] . " </td> ";
                        echo "<td>" . $fila['nombreEmpresa'] . " </td> ";
                        echo "<td>" . $fila['telEmpresa'] . " </td> ";
                        echo "<td>" . $fila['nombreContacto'] . " </td> ";
                        echo "<td>" . $fila['apPat'] . " </td> ";
                        echo "<td>" . $fila['apMat'] . " </td> ";
                        echo "<td>" . $fila['correo'] . " </td> ";
                        echo "<td>" . $fila['telContact'] . " </td> ";
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