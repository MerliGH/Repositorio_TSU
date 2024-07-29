<?php
include_once('session.php');

$json = file_get_contents('https://api.punkapi.com/v2/beers?authuser=0');
$beers = json_decode($json, true);

$total_to_display = 25;
shuffle($beers);
$beers = array_slice($beers, 0, $total_to_display);



// Aplicar ordenamiento si se selecciona una opción de ordenamiento
if (isset($_SESSION['orden'])) {
    $orden = $_SESSION['orden'];
    switch ($orden) {
        case 'name_asc':
            usort($beers, function ($a, $b) {
                return strcasecmp($a['name'], $b['name']);
            });
            break;
        case 'name_desc':
            usort($beers, function ($a, $b) {
                return strcasecmp($b['name'], $a['name']);
            });
            break;
        case 'abv_asc':
            usort($beers, function ($a, $b) {
                if ($a['abv'] == $b['abv']) {
                    return 0;
                }
                return ($a['abv'] < $b['abv']) ? -1 : 1;
            });
            break;
        case 'abv_desc':
            usort($beers, function ($a, $b) {
                if ($a['abv'] == $b['abv']) {
                    return 0;
                }
                return ($a['abv'] < $b['abv']) ? 1 : -1;
            });
            break;
        case 'ph_asc':
            usort($beers, function ($a, $b) {
                if ($a['ph'] == $b['ph']) {
                    return 0;
                }
                return ($a['ph'] < $b['ph']) ? -1 : 1;
            });
            break;
        case 'ph_desc':
            usort($beers, function ($a, $b) {
                if ($a['ph'] == $b['ph']) {
                    return 0;
                }
                return ($a['ph'] < $b['ph']) ? 1 : -1;
            });
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
        




            case 'defecto':
                shuffle($beers);        
                break;

                


        default:
            // No hacer nada si no se selecciona un orden válido
            break;
    }
}elseif (!isset($_SESSION['ingredient'])) {
    // Si no se ha seleccionado ningún orden y no se ha aplicado ningún filtro de búsqueda,
    // mezclar aleatoriamente las cervezas
    shuffle($beers);
}



foreach ($beers as $beer) {
    echo '<div class="description">';
    echo "<h2><span class='beer-name1'>{$beer['name']}</span></h2>";
    echo "<img src='{$beer['image_url']}' alt='{$beer['name']}' class='beer-image' loading='lazy'>";
    echo "<br><br>";
    echo "<p class=\"beer-tagline\">\"{$beer['tagline']}\"</p><br>";
    echo "<p class=\"first-brewed\">First brewed: {$beer['first_brewed']}</p><br>";
    echo "<p class=\"beer-description\">{$beer['description']}</p><br>";
    echo "<p class=\"beer-description\"><strong>ABV:</strong> {$beer['abv']}</p><br>";
    echo "<p class=\"beer-description\"><strong>pH:</strong> {$beer['ph']}</p><br><br>";
    echo "<p class=\"beer-description2\"><strong>Do you know what it's made of?</strong> </p><br>";
    echo "<p class=\"beer-description2\"><strong>Let's find out!</strong> </p>";

    // Mostrar los ingredientes en una tabla con estilos CSS
    echo "<div class=\"beer-ingredients-container\">";
    echo "<table class=\"beer-ingredients\">";
    echo "<tr><th>Ingredients</th><th>Type</th></tr>";

    // Mostrar los ingredientes de malta
    foreach ($beer['ingredients']['malt'] as $malt) {
        echo "<tr><td>{$malt['name']}</td><td>Malt</td></tr>";
    }

    // Mostrar los ingredientes de lúpulo
    foreach ($beer['ingredients']['hops'] as $hops) {
        echo "<tr><td>{$hops['name']}</td><td>Hops</td></tr>";
    }

    echo "</table>";
    echo "</div>";

    echo "<br><p class=\"beer-description\"><strong>Food Pairing:</strong></p>";
    echo "<br>";
    foreach ($beer['food_pairing'] as $pairing) {
        echo "<li class=\"beer-description\">{$pairing}</li>";
    }
    echo "<br>";
    echo "<p class=\"beer-description\"><strong>Brewer's Tips: </strong>{$beer['brewers_tips']}</p><br>";
    echo "<p class=\"beer-description\"><strong>Contributed By: </strong>{$beer['contributed_by']}</p>";
    echo '</div>';
}
?>
