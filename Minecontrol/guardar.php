<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST["name"];
    $email = $_POST["email"];
    $asunto = $_POST["subject"];
    $mensaje = $_POST["message"];

    // Archivo JSON donde se guardarán los datos
    $json_file = "comments.json";
    
    // Leer el archivo JSON existente
    $json_data = file_get_contents($json_file);
    $comentarios = json_decode($json_data, true);
    
    // Asegurarse de que el array de comentarios existe
    if (!isset($comentarios["comments"])) {
        $comentarios["comments"] = [];
    }

    // Crear el nuevo comentario
    $nuevo_comentario = array(
        "name" => $nombre,
        "email" => $email,
        "subject" => $asunto,
        "message" => $mensaje
    );
    
    // Agregar el nuevo comentario al array de comentarios
    $comentarios["comments"][] = $nuevo_comentario;

    // Convertir el array de comentarios a formato JSON, formato bonito
    $nuevo_json_data = json_encode($comentarios, JSON_PRETTY_PRINT);

    // Escribir los comentarios actualizados de vuelta al archivo JSON
    file_put_contents($json_file, $nuevo_json_data);

    // Redireccionar de vuelta a la página de contacto o a una página de confirmación
    header("Location: contacto.html");
    exit();
} else {
    // Redireccionar a la página de contacto si no se envió ningún formulario
    header("Location: contacto..htmlc:\xampp\htdocs\appsweb\Examen2\comments.json");
    exit();
}
?>
