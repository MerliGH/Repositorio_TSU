<?php
include_once('./../../global-classes/loginAdmin/sessionAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    
    <title>MATERIA PRIMA</title>
</head>

<body>
    <header id="menurapido"></header>
    <div class="botag"><a type='button' value='Agregar' href='../materiaprima/index2-matp.php'>Agrega nueva materia prima</a></div>
    <div class="botag"><a type='button' value='Agregar' href='../compramaterial/index-compra_mat.php'>Comprar material</a></div>
    <div class="botag"><a type='button' value='Agregar' href='../materiaprima/eliminarMP.php'>Eliminar productos</a></div>
    <div class="botag"><a type='button' value='Agregar' href='../materiaprima/consulta8.php'>Detalles vestidos</a></div>


    <div class="area"></div>
    <?php include('../menuprin/menuadmin.php'); ?>
    <Main>
        <div id="main-container">
            <h3>MATERIA PRIMA</h3>
            <table>
                <thead>
                    <tr>
                        <th>CLAVE</th>
                        <th>NOMBRE</th>
                        <th>FECHA DE RECIBIDO</th>
                        <th>DESCRIPCION</th>
                        <th>STOCK</th>
                        <th>PRECIO</th>
                    
                        <th>PROVEEDOR</th>
                    </tr>
                </thead>
                <tr>
                    <?php
                    include('./matPrima.php');
                    $mp = new matPrima();
                    $dataset = $mp->getAllMP();

                    if ($dataset != "ERROR") {
                        while ($registro = mysqli_fetch_assoc($dataset)) 
                        {
                           echo "<tr>";
                           echo "<td>" . $registro['clave'] . " </td> ";
                           echo "<td>" . $registro['nombreMaterial'] . " </td> ";
                           echo "<td>" . $registro['fechaRecibido'] . " </td> ";
                           echo "<td>" . $registro['descripcionmp'] . " </td> ";  // Aquí usas el alias
                           echo "<td>" . $registro['stock'] . " </td> ";
                           echo "<td>" . $registro['precio'] . " </td> ";   
                  
                           echo "<td>" . $registro['proveedor'] . " </td> ";
                           echo "</tr>";
   
                        }
                    } 
                    else 
                    {
                        echo "No hay registros";
                        $dataset = 0;
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