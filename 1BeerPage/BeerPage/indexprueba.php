<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>~ ★ Viking beer Guide ★ ~</title>
  
  <link rel="stylesheet" href="css/styles.css">
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






<div class="descriptions">
      <?php
      
      $url = "api.json";
      $json = file_get_contents($url);
      $data = json_decode($json, true);

      //Tomar cuatro índices aleatorios del array de datos
      $random_indexes = array_rand($data, 4);

      //Cuatro cheves en 2x2
      foreach ($random_indexes as $beer_index) 
      {
          $beer = $data[$beer_index];
          
          //Imagenes de cerveza
          echo "<div class='description'>";
          echo "<img src='{$beer['image_url']}' alt='{$beer['name']}' class='beer-image' loading='lazy'>";
          
          //Texto descriptivo formato en cuadros
          echo "<h2>{$beer['name']}</h2>";
          echo "<p class='description-text'>{$beer['description']}</p>";
            
          //Boton ver mas ... Arreglar redireccionamiento!!!!

          echo "<label for='ver-mas-{$beer['name']}' class='read-more-btn' onclick=\"window.location.href='knowingmore.php?id={$beer['id']}'\">Learn more!</label>";

          
          echo "<div class='ver-mas-content'>";
          echo "</div>";
          echo "</div>";
          
      }
      ?>
</div>

<!--CABEZA FLOTANTE XD-->

<img src="css/images/cabeza.png" alt="Cabeza Vikinga" class="cabeza-vikinga">

<div class="cabeza-container">
    <div class="titulo-container">
        <p>Welcome to the digital tavern, where you'll have the opportunity to discover various indie beers, learn what foods to pair them with, as well as view their information: alcohol percentage, year of production, among other details.</p>
    </div>
</div>

  </div>
</div>

  
  
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
