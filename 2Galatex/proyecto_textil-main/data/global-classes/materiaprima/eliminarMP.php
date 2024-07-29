<?php
    include_once('./matPrima.php'); 

    $matPrima = new matPrima();

    $clavesProductos = $matPrima->getAllMP();

    if ($clavesProductos !== "ERROR") 
    {
        $clavesArray = array();
        $clavesArray2 = array();
        $clavesArray3 = array();

        while ($fila = mysqli_fetch_assoc($clavesProductos)) 
        {
            $clavesArray[] = $fila['clave'];
            $clavesArray2[] = $fila['proveedor'];
            $clavesArray3[] = $fila['color'];
        }
    } 
    else 
    {
        $clavesArray = array(); 
        $clavesArray2 = array(); 
        $clavesArray3 = array(); 
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
            <!-- Formulario con la acción apuntando a metodoEliminarMP.php -->
            <form action="metodoEliminarMP.php" method="post">
                <label for="txtclave">Selecciona el producto a eliminar:</label>
                <!-- Lista desplegable con las claves de productos -->
                <select name="txtclave" id="txtclave">
                    <?php
                    foreach ($clavesArray as $clave) 
                    {
                        echo "<option value='$clave'>$clave</option>";
                    }
                    ?>
                </select>
                <label for="confirmar">¿Está seguro?</label>
                <input type="checkbox" name="confirmar" id="confirmar">
                <!-- Botón para enviar el formulario -->
                <input type="submit" value="Eliminar Producto">
            </form>
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
