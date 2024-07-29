<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <title>PROVEEDORES</title>
</head>

<body>
    <header id="menurapido"></header>
    <div class="area"></div>
    <?php include('../menuprin/menuadmin.php'); ?>
    <Main>
        <div id="main-container">
            <h3>PROVEEDORES</h3>
            <table>
                <thead>
                    <tr>
                        <?php
                        include('proveedores.php');
                        $pv = new proveedores();

                        // Obtener codigo proveedor
                        $codigoProveedor = isset($_GET['codigo']) ? $_GET['codigo'] : null;

                        if ($codigoProveedor !== null) {
                            $dataset = $pv->getOnePv($codigoProveedor);

                            while ($registro = mysqli_fetch_assoc($dataset)) {
                                // Mostrar el formulario de edición
                                echo "<form action='updatePV.php' method='post'>";
                                echo "Código:<input type='text' name='codigo' value='$codigoProveedor' readonly>";
                                echo "<br>";
                                echo "Nombre de Contacto: <input type='text' name='nombreContact' value='" . $registro['nombreContact'] . "' required><br>";
                                echo "Apellido Paterno: <input type='text' name='apPat' value='" . $registro['apPat'] . "' required><br>";
                                echo "Apellido Materno: <input type='text' name='apMat' value='" . $registro['apMat'] . "' required><br>";
                                echo 'Teléfono: <input type="text" name="numTel" maxlength="10" pattern="[0-9]{10}" value="'.$registro['numTel'].'" required><br>';
                                echo "Estado: <select name='estado' required>
                                <option value='activo' " . ($registro['estado'] == 'activo' ? 'selected' : '') . ">Activo</option>
                                <option value='inactivo' " . ($registro['estado'] == 'inactivo' ? 'selected' : '') . ">Inactivo</option>
                                </select><br>";
                                echo "<input type='submit' value='Actualizar'>";
                                echo "</form>";
                            }
                        } else {
                            echo "Código de proveedor no proporcionado.";
                        }
                        ?>
                    </tr>
                </thead>
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