<?php
include_once('./../../global-classes/loginAdmin/sessionAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">

    <title>LOTES DE VESTIDOS</title>
</head>

<body>
    <header id="menurapido"></header>
    <div class="botag"><a type='button' value='Agregar' href='../lotes/index2-lotes.php'>Agregar nuevo lote</a></div>
    <!--
    <div class="botag"><a type='button' value='Agregar' href='../compramaterial/index-compra_mat.php'>Comprar material</a></div>
    <div class="botag"><a type='button' value='Agregar' href='../materiaprima/eliminarMP.php'>Eliminar productos</a></div>
    -->


<div class="area"></div>
<?php include('../menuprin/menuadmin.php'); ?>
    
        <Main>
        <div id="main-container">
            <h3>LOTES DE VESTIDOS</h3>
            <table>
                <thead>
                    <tr>
                    <th>FABRICA</th>
                        <th>NUM LOTE</th>
                        <th>VESTIDO</th>
                        <th>TALLA</th>
                        <th>DESCRIPCION</th>
                        <th>FECHA</th> 
                        <th>COSTO DE PRODUCCIÓN</th>
                
                        <th>CANT TOTAL DE VESTIDOS</th>
                         
                        <th>VESTIDOS SIN DETALLE</th>
                        
                        <th>VESTIDOS DEFECTUOSOS</th>
                    </tr>
                </thead>
                         <tr>
                    
                <?php        
                include ('vestidos.php');
                $ves = new vestidos();
                $dataset = $ves->getAllV();
                // Actualiza el estado
                //$ves->actualizarEstado(); Comentarizado por fallas

                if ($dataset != "ERROR")
                {
                    while ($registro = mysqli_fetch_assoc($dataset))
                    {
                        echo "<tr>";
                        
                        echo "<td>".$registro['nombreFabrica']." </td> ";
                        echo "<td>".$registro['num']." </td> ";
                        echo "<td>".$registro['nombre']." </td> ";
                       
                        echo "<td>".$registro['talla']." </td> "; 
                        echo "<td>".$registro['descripcion']." </td> "; 
                        
                        echo "<td>".$registro['fechaProduccion']." </td> "; 
                        
                        echo "<td>".$registro['costoProduccion']." </td> "; 
                        echo "<td>".$registro['cantTotalGen']." </td> "; 
                        echo "<td>".$registro['cantVestidos']." </td> "; 
                        echo "<td>".$registro['cantDefectuosos']." </td> "; 
                        


                         //echo "<td><a href='editarProv.php?codigo=".$registro['codigo']."'>Editar</a> | <a href='eliminarProveedor.php?codigo=".$registro['codigo']."'>Eliminar</a></td>"; 
                        echo "</tr>";
                    }
                }
                else 
                {
                    echo "No hay registros";
                    $dataset = 0;
                }
                ?>         
                    </tr>
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