<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <title>VESTIDOS</title>
</head>

<body>
    <header id="menurapido"></header>
    <div class="botag"><a type='button' value='Agregar' href='#'>Agregar vestido</a></div>
    <div class="area"></div>
    <?php include('../menuprin/menuadmin.php'); ?>
    <Main>
        <div id="main-container">
            <h3>COMPRAS</h3>
            <table>

                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>
                        <th>TALLA COMPRADA</th>
                        <th>DESCRIPCION</th>
                        <th>PRECIO</th>
                        <th>FABRICA</th>
                        <th>LOTE</th>
                    </tr>
                </thead>
                <?php
                include('vestidos.php');
                $miobjeto = new vestidos();
                $consulta = $miobjeto->getAllvestidos();
                if ($consulta != 'wrong') {
                    while ($fila = mysqli_fetch_assoc($consulta)) {
                        echo "<tr>";
                        echo "<td>" . $fila['codigo'] . " </td> ";
                        echo "<td>" . $fila['nombre'] . " </td> ";
                        echo "<td>" . $fila['talla'] . " </td> ";
                        echo "<td>" . $fila['descripcion'] . " </td> ";
                        echo "<td>" . $fila['precioVenta'] . " </td> ";
                        echo "<td>" . $fila['fabrica'] . " </td> ";
                        echo "<td>" . $fila['loteVestido'] . " </td> ";
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
            <p class='foot'>Privacy</p>
            <p class='foot'>Terminos y condiciones</p>
        </section>
    </footer>
</body>

</html>