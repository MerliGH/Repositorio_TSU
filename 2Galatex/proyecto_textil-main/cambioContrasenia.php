<html>

<head>
    <title>Recuperacion Contraseña</title>
    <meta charset="UTF-8">
    <link rel="Stylesheet" href="style3.css" type="text/css">
    <link rel="stylesheet" href="./css/iniciarsesion.css">
</head>

<body>
    <main>
        <section class="contact_form">
            <section class="formulario">
                <h1>Cambio de Contraseña</h1>
                <?php if (!empty($errorMsg)): ?>
                <p style="color: red;"><?php echo $errorMsg; ?></p>
                <?php endif; ?>
                <form action="./data/global-classes/loginu/passwordRecovery.php" method="post">
                 <input type="hidden" name="nombreUser" value="<?php echo $recoveryInfo['nombreUser']; ?>" />
                </form>
                <form action="./data/global-classes/loginu/procesarRecovery.php" method="post">
                    <section>
                        Escribe tu Nueva Contraseña
                        <span class="obligatorio">*</span>
                        <input type="password" name="newPassword" minlength = "8" maxlength = "20" required>
                    </section>

                    <section>
                        Confirme Su Nueva Contraseña
                        <span class="obligatorio">*</span>
                        <input type="password" name="confirmPassword" minlength = "8" maxlength = "20" required>
                        
                    </section>

                    

                    <section>
                        <input type="submit" value="Recuperar Contraseña" class="enviar">
                        <a href="./iniciarSesion.php">Cancelar</a>
                    </section>

                   
                </form>
            </section>
            <section class="aviso">
                <span class="obligatorio"> * </span>los campos son obligatorios.
            </section>
        </section>
    </main>

</body>

</html>
