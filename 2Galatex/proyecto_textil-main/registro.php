<html>
<!--Comentario prueba-->
<head>
    <title> REGISTRO </title>
    <link rel="Stylesheet" href="./css/registro.css" type="text/css">
    <meta type="author" />
</head>

<body>

    <main>
        <section class="contact_form">

            <section class="formulario">
                <h1>Registro</h1>
                <form action="./data/global-classes/clientes/addCliente.php" method="post">

                    <section>
                        <label class="colocar_nombre">RFC
                            <span class="obligatorio">*</span>
                        </label>
                        <input type="text" name="txtrfc" required minlength="12" maxlength="13" placeholder="Escribe el RFC de la empresa">
                    </section>

                    <section>
                        <label class="colocar_email">Nombre Empresa
                            <span class="obligatorio">*</span>
                        </label>
                        <input type="text" required name="txtempresa" maxlength = "30" placeholder=" Escribe el nombre de la empresa">
                    </section>

                    <section>
                        <label class="colocar_telefono">Teléfono Empresa
                        <span class="obligatorio">*</span>
                        </label>
                        <input type="text" name="txtTelEmpresa" pattern="[0-9]{10}" maxlength="10" placeholder="Escribe el teléfono de la empresa" required>
                    </section>
                    <section>
                        <label class="colocar_telefono">Nombre Del Contacto
                            <span class="obligatorio">*</span>
                            <input type="text" name="txtNombreCont"  maxlength = "30" placeholder="Nombre de algún representante de la empresa" spellcheck="true" required>

                    </section>
                    <section>
                        <label class="colocar_telefono">Apellido Paterno Del Contacto
                            <span class="obligatorio">*</span>
                            <input type="text" name="txtApPat" maxlength = "30" placeholder="Apellido paterno del contacto" required spellcheck="true">

                    </section>
                    <section>
                        <label class="colocar_telefono">Apellido Materno Del Contacto
                            <input type="text" name="txtApMat" maxlength = "30"  placeholder="Apellido materno del contacto" spellcheck="true">

                    </section>
                    <section>
                        <label class="colocar_telefono">Correo Del Contacto
                            <span class="obligatorio">*</span>
                            <input type="email" name="txtCorreo" maxlength = "30" placeholder="Escribe correo del contacto" required>

                    </section>
                    <section>
                        <label class="colocar_telefono">Teléfono Del Contacto
                            <span class="obligatorio">*</span>
                            <input type="text" name="txtTelContact" maxlength = "10" pattern="[0-9]{10}" placeholder="Escribe el teléfono del contacto" required>

                    </section>

                    <section>
                        <label class="colocar_nombre">Usuario
                            <span class="obligatorio">*</span>
                        </label>
                        <input type="text" name="txtnick" required maxlength="20" placeholder="Tu apodo para tu perfil">
                    </section>

                    <section>
                        <label class="colocar_contraseña">Contraseña
                            <span class="obligatorio">*</span>
                            <input type="password" name="txtpass" required minlength="8" maxlength="20" placeholder="Escribe tu contraseña">
                    </section>
                    <input href="./index.php" type="submit" value="Enviar" class="Registrarce">
            </section>

            <a href="./index.php">Cancelar</a>

            <section class="aviso">
                <span class="obligatorio"> * </span>los campos son obligatorios.
            </section>
            </form>
        </section>
    </main>

</body>
</section>

</html>