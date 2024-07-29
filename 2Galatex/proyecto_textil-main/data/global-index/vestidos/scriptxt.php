<?php

function leer_archivo_txt($nombre_archivo) {
    // Definir la ruta al archivo TXT
    $ruta_archivo = '../../../archivostxt/' . $nombre_archivo;

    // Abrir el archivo en modo lectura
    $archivo = fopen($ruta_archivo, 'r');

    // Leer el contenido del archivo
    $contenido = fread($archivo, filesize($ruta_archivo));

    // Cerrar el archivo
    fclose($archivo);

    return $contenido;
}

?>
