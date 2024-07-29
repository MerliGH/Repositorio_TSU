<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>~ ★ Viking beer Guide ★ ~</title>
  
  <link rel="stylesheet" href="css/styles3.css">
  <!--  AIzaSyAKyTn5ITMSyp5mhw_iaGrgKtxbBbVPyY4  -->
  <!-- AIzaSyD-_AIc6mVWAMeaJ6sNqwRgCNQqjQOd23k  -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKyTn5ITMSyp5mhw_iaGrgKtxbBbVPyY4&callback=initMap"></script>

</head>
<body>

<div class="header2">
  
<h3>~ The online Viking tavern where true connoisseurs know about indie beer. ~</h3>
</div>


<div class="header">
    <div class="menu"> 
        <img src="css/images/casco.png" alt="Casco Vikingo" class="casco" onclick="redirigirIndex()">
        
        <a href="indexprueba.php" class="titulo">
            Viking beer Guide
        </a>
        
        <img src="css/images/cerveza3.png" alt="Cheve Vikingo" class="cheve" onclick="redirigirIndex()">

        <script>
        function redirigirIndex() 
        {
          window.location.href = "indexprueba.php";
        }
        </script>

<a href="indexprueba.php">FEED</a>
        <a href="knowingmore.php">KNOW YOUR BEER</a>
        <a href="cervecerias.php">BREWERIES</a>
        <a href="comentarios.php">COMMENTS</a>
    </div>
</div>


<h1 style="
margin-top:40px;
color: white; 
font-family: 
Arial, sans-serif; 
font-style: italic;
font-size: 47px;
  text-shadow: 8px 8px 16px rgba(102, 51, 0, 0.8); 

text-align: center;"


>Discover where these beers are brewed! Explore their brewery here!</h1>



<?php




$url = "api.json";
$json = file_get_contents($url);
$data = json_decode($json, true);

$available_indexes = array_keys($data);
shuffle($available_indexes);

$random_indexes = array_slice($available_indexes, 0, 25);
//Tomar cuatro índices aleatorios del array de datos

foreach ($random_indexes as $beer_index) {
    $beer = $data[$beer_index];
    echo "<div class='row'>";
    echo "<div class='description2'>";
    echo "<div class='map-container' id='map-{$beer_index}'></div>";
    echo "<div class='text-container'>";
    echo "<div class='text-box'>";
    
    echo "<h2>{$beer['name']}</h2>";
    echo "<p class='description-text2'>{$beer['description']}</p>";
    echo "<p class='description-text2'>Latitude: {$beer['place']['latitude']}</p>";
    echo "<p class='description-text2'>Longitude: {$beer['place']['longitude']}</p>";
    echo "</div>";
    echo "</div>";
    echo "<div class='image-container'>";


    
    echo "<div class='beer-image'>";
    echo "<img src='{$beer['image_url']}' alt='{$beer['name']}'>";

    
    echo "</div>";
    echo "</div>";
    echo "</div>";

    // Script para inicializar el mapa
    echo "<script>
            function initMap{$beer_index}() {
                var map = new google.maps.Map(document.getElementById('map-{$beer_index}'), {
                    zoom: 14,
                    center: { lat: {$beer['place']['latitude']}, lng: {$beer['place']['longitude']} }
                });
                var marker = new google.maps.Marker({
                    position: { lat: {$beer['place']['latitude']}, lng: {$beer['place']['longitude']} },
                    map: map,
                    title: 'Beer Location'
                });
            }
            initMap{$beer_index}();
          </script>";
}



?>

  
  
<footer>
  <div class="footer-container">
    <div class="footer-top">
      <div class="footer-column">
        <img src="css/images/logo.png" alt="Logo" class="logo">
      </div>
      <div class="footer-column">
        <div class="social-contact-container">
          <h2>SOCIAL NETWORKS</h2>
          <div class="social-icons">
            <div class="social-item">
              <a href="#"><img src="css/images/facebook.png" alt="Facebook"></a>
              <div class="data">
                <p>Merwin Beer Dev-Ind </p>
              </div>
            </div>
            <div class="social-item">
              <a href="#"><img src="css/images/youtube.png" alt="Youtube"></a>
              <div class="data">
                <p>MW_root_beer_data</p>
              </div>
            </div>
            <div class="social-item">
              <a href="#"><img src="css/images/twitter.png" alt="Twitter"></a>
              <div class="data">
                <p>@merwinDevInc_beerProyects</p>
              </div>
            </div>
            <div class="social-item">
              <a href="#"><img src="css/images/instagram.png" alt="Instagram"></a>
              <div class="data">
                <p>Merwin_beer_and_food</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-column">
        <div class="social-contact-container2">
          <h2>CONTACT US</h2>
          <div class="contact-info">
            <div class="contact-item">
              <a href="#"><img src="css/images/phone.png" alt="Telefono"></a>
              <div class="phone-numbers">
                <p>(+52) 664 731 6217</p>
                <p>(+52) 664 462 4525</p>
              </div>
            </div>
            <div class="contact-item">
              <a href="#"><img src="css/images/email.png" alt="Email"></a>
              <p>merwin_gh@incorporation-indev.com</p>
            </div>
            <div class="contact-item">
              <a href="#"><img src="css/images/location.png" alt="Location"></a><br>
              <p>Castello Blanco Street, #3489, Aqua Avenue, Postal code #22526</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<footer class="footer2">
  <div class="footer-container2">
    <div class="footer-top">
      <div class="footer-column">
        <h3> => © All rights reserved ~ Higuera Sanchez Dulce Mariela ~ 4A-TSU-DSM ~ Beer viking guide <= </h3>
      </div>
    </div>
  </div>
</footer>
</body>
</html>
