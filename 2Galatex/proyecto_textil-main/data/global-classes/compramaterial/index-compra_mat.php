<?php
include_once('./../../global-classes/loginAdmin/sessionAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <title>COMPRAR MATERIAL</title>
</head>

<body>
    <header id="menurapido"></header>
    <div class="area"></div>
    <?php include('../menuprin/menuadmin.php');
    include_once 'addCompramat.php'; ?>
    <Main>
        <div id="main-container">
            <div class="cont-form">
            <h1>COMPRAR MATERIAL</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="fabrica">Seleccionar Fábrica:</label>
                <select name="fabrica" id="fabrica">
                    <?php while ($rowFabrica = mysqli_fetch_assoc($resultFabricas)) : ?>
                        <option value="<?php echo $rowFabrica['codigo']; ?>"><?php echo $rowFabrica['nombre']; ?></option>
                    <?php endwhile; ?>
                </select>
                <br>

                <label for="proveedor">Seleccionar Proveedor:</label>
                <select name="proveedor" id="proveedor">
                    <?php while ($rowProveedor = mysqli_fetch_assoc($resultProveedores)) : ?>
                        <option value="<?php echo $rowProveedor['codigo']; ?>"><?php echo $rowProveedor['nombreEmpresa']; ?></option>
                    <?php endwhile; ?>
                </select>
                <br>

                <input type="submit" name="aceptar" value="Aceptar">
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aceptar'])) {
                echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
                echo '<label for="materiales"><h1>Seleccionar Materiales:</h1></label><br>';
                echo '<table>
        <thead>
            <tr>
                <th></th>
                <th>MATERIAL</th>
                <th>DESCRIPCION</th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
                <th></th>
            </tr>
        </thead>';
                foreach ($materialesProveedor as $material) {
                    echo "<tr>";
                    echo '<td><input type="checkbox" name="materiales[]" value="' . $material['clave'] . '"></td>';
                    echo '<td>' . $material['nombreMaterial'] . '</td>';
                    echo '<td>' . $material['descripcionmp'] . '</td>';
                    echo '<td>$' . $material['precio'] . '</td>';
                    echo '<td>';
                    echo '<input type="number" name="cantidades[]" min="100" value="100" max="5000"';
                    echo isset($_POST['materiales']) && in_array($material['clave'], $_POST['materiales']) ? 'style="display: inline-block;"' : 'style="display: none;"';
                    echo '>';
                    echo '</td>';
                    echo '<td></td>';
                    echo "</tr>";
                }
                echo '</table>';

                echo '<br>';
                echo '<input type="hidden" name="fabrica" value="' . $fabricaSeleccionada . '">';
                echo '<input type="hidden" name="proveedor" value="' . $proveedorSeleccionado . '">';
                echo '<input type="submit" name="realizar_compra" value="Realizar Compra">';
                echo '</form>';
            }
            ?>

            <script>
                // Mostrar la casilla de cantidad solo si se selecciona la materia prima
                const checkboxes = document.querySelectorAll('input[name="materiales[]"]');
                checkboxes.forEach((checkbox, index) => {
                    checkbox.addEventListener('change', () => {
                        const cantidadInput = document.querySelectorAll('input[name="cantidades[]"]')[index];
                        cantidadInput.style.display = checkbox.checked ? 'inline-block' : 'none';
                    });
                });
            </script>
            </div>
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