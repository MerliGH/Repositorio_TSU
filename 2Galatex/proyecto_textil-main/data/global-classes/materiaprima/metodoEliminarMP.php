<?php
include_once('./matPrima.php');

$mensaje = "";

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si la casilla de confirmación está marcada
    if (isset($_POST['confirmar']) && $_POST['confirmar'] === 'on') {
        $matPrima = new matPrima();

        // Establecer la clave del producto a eliminar
        $matPrima->setClave($_POST['txtclave']);

        // Intentar eliminar el producto
        $resultado = $matPrima->eliminarProducto();

        // Verificar el resultado de la eliminación
        if ($resultado) {
            $mensaje = "El producto se eliminó correctamente.";
        } else {
            $mensaje = "Error al intentar eliminar el producto.";
        }
    } else {
        $mensaje = "Marca la casilla para confirmar la seleccion";
    }
} else {
    $mensaje = "Acceso no válido.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">

    <title>Eliminar Materia Prima</title>
</head>

<body>
    <header id="menurapido"></header>

    <div class="area"></div>
    <?php include('../menuprin/menuadmin.php'); ?>

    <Main>
        <div id="main-container">
            <h3>Eliminar Materia Prima</h3>
            <!-- Mostrar el mensaje en el mismo formato de tu página -->
            <p class="mensaje"><?php echo $mensaje; ?></p>

            <?php
            // Verificar si se debe regresar después de confirmar la casilla
            if ($mensaje === "Debe confirmar la eliminación marcando la casilla.") {
                echo '<a href="eliminarMP.php">Regresar</a>';
            }
            ?>
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
