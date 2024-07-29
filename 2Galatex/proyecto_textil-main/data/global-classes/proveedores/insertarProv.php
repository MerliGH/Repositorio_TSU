<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <div class="botag"><a type="button" href='index-prov.php' value="Agregar" >Cancelar</a></div>

    <title>PROVEEDORES</title>
</head>

<body>
<header id="menurapido"></header>
<div class="area"></div>
<?php include('../menuprin/menuadmin.php'); ?>
        <Main>
            <div id="main-container">
        
        <form method="post" action="addProveedor.php" enctype="multipart/form-data" class="add">
        <table>
        <tr>
		<td>Código: </td>
		<td> <input type = "text" name="txtCod" required></td>

		</tr>

        <tr>
		<td>Nombre de la empresa: </td>
		<td><input type = "text" name="txtEmpresa" required></td>
		</tr>

        <tr>
		<td>Número de teléfono: </td>
		<td><input type ="text" name="txtTel" maxlength="10" required pattern="[0-9]{10}"></td>
        </tr>

        <tr>        
		<h2>Datos del contacto</h2>
        </tr>

		<tr>
		<td>Nombre del contacto: </td>
		<td><input type = "text" name="txtNombre" required></td>
        </tr>


		<tr>
		<td>Apellido paterno: </td>
		<td><input type = "text" name="txtaPat" required></td>
		</tr>

        <tr>
		<td>Apellido materno: </td>
		<td><input type = "text" name="txtaMat" required></td>
		</tr>

		<input type = "reset" value="Vaciar">
		<input type = "submit" value="Confirmar">
		<br>
		</form>
    </Main>
</table>
    <footer>
        <section>
            <p class='foot'>&copy;2023 Derechos reservados</p>
            <p class='foot'>Privacidad</p>
            <p class='foot'>Términos y condiciones</p>
        </section>
    </footer>
</body>

</html>