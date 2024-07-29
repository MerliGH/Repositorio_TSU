<?php
// Verificar si se enviaron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre y el comentario del formulario
    $nombre = $_POST["nombre"];
    $comentario = $_POST["comentario"];

    // Leer los comentarios actuales del archivo JSON
    $json_file = "comments.json";
    $json_data = file_get_contents($json_file);
    $comentarios = json_decode($json_data, true);

    // Agregar el nuevo comentario al array de comentarios
    $nuevo_comentario = array("user" => $nombre, "comment" => $comentario);
    $comentarios["comments"][] = $nuevo_comentario;

    // Convertir el array de comentarios de nuevo a formato JSON
    $nuevo_json_data = json_encode($comentarios, JSON_PRETTY_PRINT);

    // Escribir los comentarios actualizados de vuelta al archivo JSON
    file_put_contents($json_file, $nuevo_json_data);

    // Redireccionar de vuelta a la página de comentarios
    header("Location: comentarios.php");
    exit();
} else {
    // Si no se envió ningún formulario, redireccionar a la página de comentarios
    header("Location: comentarios.php");
    exit();
}
?>
