<?php
include_once('./../../global-classes/loginAdmin/sessionAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <div class="botag"><a type='button' value='Agregar' href='#'>Agregar</a></div>
    <div class="botag"><a type='button' value='Agregar' href='index-lotes.php'>Lotes de vestido</a></div>



    <title>PRODUCTOS DISPONIBLES</title>
</head>

<body>
<header id="menurapido"></header>
<div class="area"></div>
<?php include('../menuprin/menuadmin.php'); ?>
    
        <Main>
        <div id="main-container">
            <h3>PRODUCTOS DISPONIBLES</h3>
            <table>
                <thead>
                    <tr>
                        <th>NÚMERO DE LOTE</th>
                        <th>FECHA DE PRODUCCIÓN</th>
                        <th>COSTO PRODUCCIÓN</th>
                        <th>CANTIDAD DE DEFECTUOSOS</th>
                        <th>CANTIDAD DE VESTIDOS</th>
                        <th>CANTIDAD TOTAL GENERADOS</th>
                    </tr>
                </thead>
                         <tr>
                    
              
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