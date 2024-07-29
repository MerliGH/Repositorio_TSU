<html>

<head>
    <title>Recuperación Contraseña</title>
    <link rel="Stylesheet" href="style3.css" type="text/css">
    <link rel="stylesheet" href="./css/iniciarsesion.css">
    <meta type="author"/>
</head>

<body>


    <main>
        <section class="contact_form">
            <section class="formulario">
                <h1>Recuperación De Contraseña</h1>
                <form action="./data/global-classes/loginu/passwordRecovery.php" method="post">
                    <section>
                        Usuario
                            <span class="obligatorio">*</span>
                            <input type="text" name="txtnick" maxlength = "20" required>
                    </section>
                    <section>
                        <input type="submit" value="Recuperar Contraseña" class="enviar">
                        <a href="./index.php">Cancelar</a>
                    </section>


            </section>
            <section class="aviso">
                <span class="obligatorio"> * </span>los campos son obligatorios.
            </section>

            </form>
        </section>
    </main>

</body>

</html>