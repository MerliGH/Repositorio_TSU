<?php
include_once('./lotes.php'); 

    $lotes = new lotes();

    $clavesProductos = $lotes->getAllLote();

    if ($clavesProductos !== "ERROR") 
    {
        $clavesArray2 = array();
        while ($fila = mysqli_fetch_assoc($clavesProductos)) 
        {
            $clavesArray2[] = $fila['cod_vestido'];
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

    <title>LOTES DE VESTIDOS</title>
</head>

<body>
<header id="menurapido"></header>
<div class="area"></div>
<?php include('../menuprin/menuadmin.php'); ?>
    
        <Main>
        <div id="main-container">
            <h3>Dar de alta nuevo lote</h3>
            <form method="post" action="addLote.php">
                <table>
                    <tr>
                        <th colspan="2">FAVOR DE RELLENAR LOS CAMPOS SIGUIENTES...</th>
                    </tr>
                    <tr>
                    <td>Clave del lote nuevo:</td>
                        <td>
                        <select name="txtcodvestido">
                        <?php
                            foreach ($clavesArray2 as $clave) 
                            {
                                echo "<option value='$clave'>$clave</option>";
                            }
                        ?>
                        </td>
                        </select>
                    </tr>
                        </tr>
                    <tr>
                        <td>Fecha de producción (Año/Mes/Día):</td>
                        <td><input type="date" name="txtfecha" ></td>
                    </tr>
                    <tr>
                    <td>Cantidad de piezas defectuosas:</td>
                    <td><input type="number" name="txtdef" required></td>
                    </tr>
                <tr>  
                    <td>Cantidad total de piezas generadas:</td>
                    <td><input type="number" name="txtgen" required></td>
                </tr>
                    <tr>
                 
                    <p><button type="submit">Enviar</button></p>

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