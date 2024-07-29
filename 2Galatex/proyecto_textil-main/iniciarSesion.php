<html>

<head>
    <title>Iniciar Sesión</title>
    <link rel="Stylesheet" href="style3.css" type="text/css">
    <link rel="stylesheet" href="./css/iniciarsesion.css">
    <meta type="author"/>
</head>

<body>


    <main>
        <section class="contact_form">
            <section class="formulario">
                <h1>Iniciar Sesión</h1>
                <form action="./data/global-classes/loginu/Login.php" method="post">

                    <section>
                        Usuario:
                            <span class="obligatorio">*</span>
                            <input type="text" name="txtnick" maxlength = "20" required placeholder="Escribe tu nombre de usuario">

                    </section>
                    <section>
                        Contraseña:
                            <span class="obligatorio">*</span>
                            <input type="password" name="txtpass" require minlength="6" maxlength="20" placeholder="Escribe tu contraseña">
                    </section>
                    <section>
                        <input type="submit" value="Iniciar sesión" class="enviar">
                        <a href="./index.php">Cancelar</a>
                        <a href="./RecuperacionPass.php">¿Olvidaste tu Contraseña?</a>
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