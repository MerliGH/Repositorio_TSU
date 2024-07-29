<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>~ ★ Viking beer Guide ★ ~</title>
  <link rel="stylesheet" href="css/styles3.css">
  <style>.comments-section {
  background-color: #f8f9fa;
  padding: 20px;
  border-radius: 10px;

}

.comments-section h2 {
  margin-bottom: 15px;
}

.comments-section form {
  margin-bottom: 20px;
}

.comments-section label {
  display: block;
  margin-bottom: 5px;
}

.comments-section input[type="text"],
.comments-section textarea {
  width: 600px ;
  padding: 8px;
  margin-bottom: 10px;
  border-radius: 5px;
  border: 1.2px solid #804000;
}

.comments-section button[type="submit"] {
  background-color: #8B4513;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

.comments-section button[type="submit"]:hover {
  background-color: #0056b3;
}

.comments-section .comentarios {
  margin-top: 20px;
}

.comments-section .comentarios p {
  background-color: #fff;
  border-radius: 5px;
  padding: 10px;
  margin-bottom: 10px;
}

.comments-section .comentarios p strong {
  color: #8B4513;
}

</style>
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
        function redirigirIndex() {
          window.location.href = "indexprueba.php";
        }
        </script>
        <a href="indexprueba.php">FEED</a>
        <a href="knowingmore.php">KNOW YOUR BEER</a>
        <a href="cervecerias.php">BREWERIES</a>
        <a href="comentarios.php">COMMENTS</a>
    </div>
</div>

<div class="comments-section">
  <div class="add-comment">
    <h2>Don't go yet! Let us a message! :)</h2>
    <form action="guardar.php" method="post">
      <label for="nombre">Username:</label>
      <input type="text" id="nombre" name="nombre" required><br>
      <label for="comentario">Comment:</label><br>
      <textarea id="comentario" name="comentario" rows="4" cols="50" required></textarea><br>
      <button type="submit">Send comment</button>
    </form>
  </div>
  
  <div class="comment-list">
    <h2>~ Comments ~</h2>
    <div class="comentarios">
      <?php
      //leer los comentarios del archivo y mostrarlos
      $url = "comments.json";
      $json = file_get_contents($url);
      $data = json_decode($json, true);

      //SI EXISTEN ENTNCES
      if (isset($data['comments'])) {
        //ACCEDE A LOS ELEMENTOS DE L ARREGLO
        $comentarios = $data['comments'];

        //RECORRE EL ARREGLO Y LO MUESTRA
        foreach ($comentarios as $comentario) 
        {
          echo "<p><strong>{$comentario['user']}:</strong> {$comentario['comment']}</p>";
        }
      } 
      else 
      {
        echo "<p>We dont have comments yet! u,u be the first one!</p>.</p>";
      }
      ?>
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
