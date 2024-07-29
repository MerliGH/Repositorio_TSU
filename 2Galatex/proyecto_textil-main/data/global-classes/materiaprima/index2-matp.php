<?php
    include_once('./matPrima.php'); 

    $matPrima = new matPrima();

    $clavesProductos = $matPrima->getAllMP();

    if ($clavesProductos !== "ERROR") 
    {
        $clavesArray2 = array();
        while ($fila = mysqli_fetch_assoc($clavesProductos)) 
        {
            
            $clavesArray2[] = $fila['proveedor'];
        }
    } 
    else 
    {
        $clavesArray2 = array(); 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <div class="botag"><a type='button' value='Agregar' href='#'>Vaciar</a></div>

    <title>MATERIA PRIMA</title>
</head>

<body>
<header id="menurapido"></header>
<div class="area"></div>
<?php include('../menuprin/menuadmin.php'); ?>
    
        <Main>
        <div id="main-container">
            <h3>Dar de alta nuevo material</h3>
            <form method="post" action="addMP.php">
                <table>
                    <tr>
                        <th colspan="2">FAVOR DE RELLENAR LOS CAMPOS SIGUIENTES...</th>
                    </tr>
                    <tr>
                        <td>Clave del producto:</td>
                        <td><input type="text" name="txtclave"></td>
                    </tr>
                    <tr>
                        <td>Nombre:</td>
                        <td><input type="text" name="txtnombre"></td>
                    </tr>
                    <tr>
                        <td>Fecha de recibido (Año/Mes/Día):</td>
                        <td><input type="date" name="txtfecha" ></td>
                    </tr>
                    <tr>
                        <td>Descripción:</td>
                        <td><input type="text" name="txtdescripcion"></td>
                    </tr>
                    <tr>
                    <td>Stock:</td>
                    <td><input type="number" name="txtstock" required></td>
                </tr>

                <tr>
                    <td>Precio:</td>
                    <td><input type="number" name="txtPrecio" step="0.01" required></td>
                </tr>

                    <tr>
                    <td>Proveedor:</td>
                        <td>
                        <select name="txtproveedor">
                        <?php
                            foreach ($clavesArray2 as $clave) 
                            {
                                echo "<option value='$clave'>$clave</option>";
                            }
                        ?>
                        </td>
                        </select>
                    </tr>
                    <p><button type="submit">Enviar formulario</button></p>

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