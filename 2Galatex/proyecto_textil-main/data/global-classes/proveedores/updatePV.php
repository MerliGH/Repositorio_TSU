<!-- updateProv.php -->
<?php
// Incluye el archivo de conexión
include('../../conexion.php');

// Obtén los datos del formulario
$codigoProveedor = isset($_POST['codigo']) ? $_POST['codigo'] : null;
$nombreContacto = isset($_POST['nombreContact']) ? $_POST['nombreContact'] : null;
$apPaterno = isset($_POST['apPat']) ? $_POST['apPat'] : null;
$apMaterno = isset($_POST['apMat']) ? $_POST['apMat'] : null;
$numTel = isset($_POST['numTel']) ? $_POST['numTel'] : null;
$estado = isset($_POST['estado']) ? $_POST['estado'] : null;

// Verificar si se proporcionó el código del proveedor
if ($codigoProveedor !== null) {
    // Crea una instancia de la clase "conexion"
    $conexion = new conexion();

    // Construye la consulta SQL de actualización
    $sql = "UPDATE proveedores SET nombreContact = '$nombreContacto', apPat = '$apPaterno', apMat = '$apMaterno', numTel = '$numTel', estado = '$estado' WHERE codigo = '$codigoProveedor'";

    // Ejecuta la consulta de actualización
    $answer = $conexion->actualizar($sql);

    // Verifica si la actualización fue exitosa
    if ($answer) {
        echo "Actualización exitosa para el código $codigoProveedor.";
        header('location: index-prov.php');
    } else {
        echo "Error en la actualización. Por favor, verifica tus datos.";
    }
} else {
    echo "Código de proveedor no proporcionado.";
}
?>
