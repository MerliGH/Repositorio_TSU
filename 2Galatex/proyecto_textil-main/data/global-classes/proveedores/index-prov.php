<?php
include_once('./../../global-classes/loginAdmin/sessionAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
     <div class="botag"><a type='button' value='Agregar' href='insertarProv.php'>Agregar</a></div>s

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
                        <th>CÓDIGO</th>
                        <th>NOMBRE EMPRESA</th>
                        <th>TEL. EMPRESA</th>
                        <th>NOMBRE CONTACTO</th>
                        <th>AP. PATERNO</th>
                        <th>AP. MATERNO</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tr>
                    
                <?php        
                include ('proveedores.php');
                $pv = new proveedores();
                $dataset = $pv->getAllPv();

                if ($dataset != "ERROR")
                {
                    while ($registro = mysqli_fetch_assoc($dataset))
                    {
                        echo "<tr>";
                        echo "<td>".$registro['codigo']." </td> ";
                        echo "<td>".$registro['nombreEmpresa']." </td> ";
                        echo "<td>".$registro['numTel']." </td> ";
                        echo "<td>".$registro['nombreContact']." </td> ";
                        echo "<td>".$registro['apPat']." </td> ";
                        echo "<td>".$registro['apMat']." </td> ";
                        echo "<td>".$registro['estado']." </td> ";  
                        echo "<td><a href='editarProv.php?codigo=" . $registro['codigo'] . "'><i class='fa fa-pencil-square-o fa-2x'></i></a></td>";
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
            <p class='foot'>Privacidad</p>
            <p class='foot'>Términos y condiciones</p>
        </section>
    </footer>
</body>

</html>