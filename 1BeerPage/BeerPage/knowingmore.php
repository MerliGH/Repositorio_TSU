<!-- SE AGREGA ARCHIVO SESSION PARA LA VARIABLE DE SESION QUE AYUDARA A BUSCAR EN LA BARRITA --->
<?php
    include_once('session.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>~ ★ Knowing more! ★ ~</title>
  <link rel="stylesheet" href="css/styles2.css">
</head>
<body>

<div class="header2"><h3>~ The online Viking tavern where true connoisseurs know about indie beer. ~</h3>
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



   

    <section class="search-section">
    <div class="text-container search-text-container">
        <p class="search-text">Hey!!! Know your beer! Search its ingredient here!</p>
    </div>
    <div class="navigation">
        <!-- Aquí puedes colocar tu barra de navegación -->
    </div>
   

    <div class="filter-container">

    <div class="filter-box">
    <form action="buscar2.php" method="post">
        <label for="txtingredient" class="check-text">Filter by Ingredient:</label>
        <input type="text" id="txtingredient" name="txtingredient" placeholder="Search by ingredient">
        <label for="orden" class="check-text">Order by:</label>
        <select id="orden" name="orden">
          
        <option value="defecto" selected disabled>No filter selected</option>
            <option value="name_asc">Name (A-Z)</option>
            <option value="name_desc">Name (Z-A)</option>
            <option value="abv_asc">ABV (Lowest first)</option>
            <option value="abv_desc">ABV (Highest first)</option>
            <option value="ph_asc">pH (Lowest first)</option>
            <option value="ph_desc">pH (Highest first)</option>
            
            <option value="first_old">First brewed (Oldest first)</option>
            <option value="first_new">First brewed (Newiest first)</option>

            
            <option value="attenuation_low">Attenuation (Low level '<' 78% )</option>
            <option value="attenuation_high">Attenuation (High level '>' 78.1%)</option>

        </select>
        <input type="hidden" name="apply_filter" value="1">
        <button type="submit" value="Buscar">Apply</button>
    </form>
</div>
      </div>
</section>




<!-- Incluir el archivo de artículos -->
<div class="cuadritos">
    <?php include('articulos.php'); ?>
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
