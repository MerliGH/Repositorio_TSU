<?php
$json = file_get_contents('https://api.punkapi.com/v2/beers?authuser=0');
$beers = json_decode($json, true);
$filtered_beers = []; // Definir $filtered_beers como un array vacío al principio

// Verificar si se proporcionó un ingrediente y no está vacío
if (isset($_SESSION['ingredient']) && !empty($_SESSION['ingredient'])) {
    $ingredient = strtolower($_SESSION['ingredient']); // Convertir el ingrediente a minúsculas

    // Filtrar las cervezas por el ingrediente proporcionado
    $filtered_beers = array_filter($beers, function ($beer) use ($ingredient) {
        foreach ($beer['ingredients']['malt'] as $malt) {
            $maltName = strtolower($malt['name']); // Convertir el nombre del ingrediente de malta a minúsculas
            if (strpos($maltName, $ingredient) !== false) {
                return true;
            }
        }
        foreach ($beer['ingredients']['hops'] as $hops) {
            $hopsName = strtolower($hops['name']); // Convertir el nombre del ingrediente de lúpulo a minúsculas
            if (strpos($hopsName, $ingredient) !== false) {
                return true;
            } 
        }
        return false;
    });

//   // Imprimir el contenido de $_POST
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// // Imprimir el contenido de $_SESSION
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// Aplicar ordenamiento si se selecciona una opción de ordenamiento
if (isset($_SESSION['orden'])) {
    $orden = $_SESSION['orden'];
    switch ($orden) {
        case 'name_asc':
            usort($filtered_beers, function ($a, $b) {
                return strcasecmp($a['name'], $b['name']);
            });
            break;
        case 'name_desc':
            usort($filtered_beers, function ($a, $b) {
                return strcasecmp($b['name'], $a['name']);
            });
            break;
        case 'abv_asc':
            usort($filtered_beers, function ($a, $b) {
                if ($a['abv'] == $b['abv']) {
                    return 0;
                }
                return ($a['abv'] < $b['abv']) ? -1 : 1;
            });
            break;
        case 'abv_desc':
            usort($filtered_beers, function ($a, $b) {
                if ($a['abv'] == $b['abv']) {
                    return 0;
                }
                return ($a['abv'] < $b['abv']) ? 1 : -1;
            });
            break;
        case 'ph_asc':
            usort($filtered_beers, function ($a, $b) {
                if ($a['ph'] == $b['ph']) {
                    return 0;
                }
                return ($a['ph'] < $b['ph']) ? -1 : 1;
            });
            break;
        case 'ph_desc':
            usort($filtered_beers, function ($a, $b) {
                if ($a['ph'] == $b['ph']) {
                    return 0;
                }
                return ($a['ph'] < $b['ph']) ? 1 : -1;
            });
            break;

            case 'attenuation_low':
                // Filtra las cervezas con un nivel de attenuación menor a 78
                $filtered_beers = array_filter($filtered_beers, function ($beer) {
                    return floatval($beer['attenuation_level']) < 78;
                });
                break;

                

            case 'attenuation_high':
            // Filtra las cervezas con un nivel de attenuation mayor a 78.1
            $filtered_beers = array_filter($filtered_beers, function ($beer) {
                return floatval($beer['attenuation_level']) > 78.1;
            });
            break;





             case 'defecto':
                shuffle($filtered_beers);
                break;

                case 'first_old':
                    usort($beers, function ($a, $b) {
                        $dateA = DateTime::createFromFormat('m/Y', $a['first_brewed']);
                        $dateB = DateTime::createFromFormat('m/Y', $b['first_brewed']);
                
                        if ($dateA == $dateB) {
                            return 0;
                        }
                        return ($dateA < $dateB) ? -1 : 1;
                    });
                    break;
                    
                case 'first_new':
                    usort($beers, function ($a, $b) {
                        $dateA = DateTime::createFromFormat('m/Y', $a['first_brewed']);
                        $dateB = DateTime::createFromFormat('m/Y', $b['first_brewed']);
                
                        if ($dateA == $dateB) {
                            return 0;
                        }
                        return ($dateA > $dateB) ? -1 : 1; // Cambiamos el orden de comparación aquí
                    });
                    break;
            
                    





        default:
        
            break;
    }
} else {
    // Si no se proporciona un ingrediente, mostrar todas las cervezas
    
    shuffle($filtered_beers);
                
}

// Mostrar las cervezas filtradas o el mensaje de error
if (empty($filtered_beers)) {
    echo "<div style='
    margin-left: 390px; /* Más a la derecha */
    width: 800px; /* Ancho del cuadro */
    height: 300px; /* Altura del cuadro */
    display: flex; /* Activar el modelo de caja flexible */
    justify-content: center; /* Centrar horizontalmente */
    align-items: center; /* Centrar verticalmente */
    '>
    <div style='
        background: linear-gradient(to bottom, #f5d7ff, #d5a3ff); /* Fondo de degradado lila con ligero amarillo */
        color: #000; /* Color de texto negro para contrastar */
        padding: 20px; 
        border: 2px solid #8B4513; /* Borde café */
        border-radius: 10px; 
        margin-top: 50px; /* Separación del cuadro del contenido */
        font-size: 36px; /* Letra más grande */
        font-weight: bold; /* Negritas */
        text-align: center; /* Centrado */
        text-shadow: 2px 2px 2px rgba(0,0,0,0.5); /* Bordes en las letras */
        box-shadow: 0 4px 6px rgba(0,0,0,0.1); /* Sombra del cuadro */
        display: flex; /* Activar el modelo de caja flexible */
        flex-direction: column; /* Alinear los elementos en columna */
        justify-content: center; /* Centrar verticalmente */
        position: relative; /* Posición relativa para el borde adicional */
        overflow: hidden; /* Ocultar el exceso del borde principal */
        '>
        <div style='
            position: absolute; /* Posición absoluta para el borde adicional */
            top: -10px; /* Posición superior para superponer el borde */
            left: -10px; /* Posición izquierda para superponer el borde */
            right: -10px; /* Posición derecha para superponer el borde */
            bottom: -10px; /* Posición inferior para superponer el borde */
            border: 10px solid #4d2600; /* Borde café oscuro */
            border-radius: 20px; /* Radio de borde para que coincida con el borde principal */
        '></div>
        <img src='css/images/vikingo.png' alt='' style='margin: 0 auto 10px auto; display: block; max-width: 50%; max-height: 50%;'> <!-- Centrar la imagen horizontalmente y verticalmente -->
        <div style='margin-top: auto;'> <!-- Alinear el texto hacia abajo -->
            Ingredient not found! :(
        </div>
    </div>
  </div>";
} else {
    // Mostrar las cervezas filtradas
    foreach ($filtered_beers as $beer) {
        echo '<div class="description">';
        echo "<h2><span class='beer-name1'>{$beer['name']}</span></h2>";
        echo "<img src='{$beer['image_url']}' alt='{$beer['name']}' class='beer-image' loading='lazy'>";
        echo "<br>";
        echo "<br>";
        echo "<p class=\"beer-tagline\">\"{$beer['tagline']}\"</p>";
        echo "<br>";
        echo "<p class=\"first-brewed\">First brewed: {$beer['first_brewed']}</p>";
        echo "<br>";
        echo "<p class=\"beer-description\">{$beer['description']}</p>";
        echo "<br>";
        echo "<p class=\"beer-description\"><strong>ABV:</strong> {$beer['abv']}</p>";
        echo "<br>";
        echo "<p class=\"beer-description\"><strong>pH:</strong> {$beer['ph']}</p>";
        echo "<br>";

        echo "<p class=\"beer-description\"><strong>Attenuation level:</strong> {$beer['attenuation_level']}%</p>";
        echo "<br>";
        

        echo "<br>";
        echo "<p class=\"beer-description2\"><strong>Do you know what it's made of?</strong> </p>";
        echo "<br>";
        echo "<p class=\"beer-description2\"><strong>Let's find it out!</strong> </p>";

        // Mostrar los ingredientes en una tabla con estilos CSS
        echo "<div class=\"beer-ingredients-container\">";
        echo "<table class=\"beer-ingredients\">";
        echo "<tr><th>Ingredients</th><th>Type</th></tr>";

        // Array para almacenar los nombres de los ingredientes mostrados
        $ingredientes_mostrados = [];

        // Mostrar los ingredientes de malta
        foreach ($beer['ingredients']['malt'] as $malt) {
            $nombre_ingrediente = $malt['name'];
            if (!in_array($nombre_ingrediente, $ingredientes_mostrados)) {
                echo "<tr><td>$nombre_ingrediente</td><td>Malt</td></tr>";
                // Agregar el nombre del ingrediente al array de ingredientes mostrados
                $ingredientes_mostrados[] = $nombre_ingrediente;
            }
        }

        // Mostrar los ingredientes de lúpulo
        foreach ($beer['ingredients']['hops'] as $hops) {
            $nombre_ingrediente = $hops['name'];
            if (!in_array($nombre_ingrediente, $ingredientes_mostrados)) {
                echo "<tr><td>$nombre_ingrediente</td><td>Hops</td></tr>";
                // Agregar el nombre del ingrediente al array de ingredientes mostrados
                $ingredientes_mostrados[] = $nombre_ingrediente;
            }
        }

        echo "</table>";
        echo "</div>";

        echo "<br>";
        echo "<p class=\"beer-description\"><strong>Food Pairing:</strong></p>";
        echo "<br>"; // Agregado para envolver los elementos de food pairing en una lista
        foreach ($beer['food_pairing'] as $pairing) {
            echo "<li class=\"beer-description\">{$pairing}</li>";
        }
         // Cierre de la lista
        echo "<br>";
        echo "<p class=\"beer-description\"><strong>Brewer's Tips: </strong>{$beer['brewers_tips']}</p>";
        echo "<br>";
        echo "<p class=\"beer-description\"><strong>Contributed By: </strong>{$beer['contributed_by']}</p>";
        echo '</div>';
    }
}}
?>
