<?php
include_once('./../../global-classes/loginAdmin/sessionAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <title>INICIO</title>
</head>

<body>
    <header id="menurapido"></header>
    <div class="area"></div>
    <?php include('../menuprin/menuadmin.php'); ?>
    <Main>
        <div id="main-container">
        <h3 id="titad">¡BIENVENIDO ADMINISTRADOR <?= $User?>!</h3>

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