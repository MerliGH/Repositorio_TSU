<html>

<head>
    <title> LOGIN</title>
    <link rel="Stylesheet" href="style3.css" type="text/css">
    <link rel="stylesheet" href="./css/iniciarsesion.css">
    <meta type="author"/>
</head>

<body>


    <main>
        <section class="contact_form">
            <section class="formulario">
                <h1>Iniciar Sesión Administrador</h1>
                <form action="./data/global-classes/loginAdmin/loginAdmin.php" method="post">

                    <section>
                        Nombre de Usuario
                            <span class="obligatorio">*</span>
                            <input type="text" name="txtnicku" required placeholder="Escribe tu nombre de usuario">

                    </section>
                    <section>
                        Contraseña
                            <span class="obligatorio">*</span>
                            <input type="password" name="txtpassw" required minlength="8" maxlength="20" placeholder="Escribe tu contraseña">
                    </section>
                    <section>
                        <input type="submit" value="Iniciar sesion" class="enviar">
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