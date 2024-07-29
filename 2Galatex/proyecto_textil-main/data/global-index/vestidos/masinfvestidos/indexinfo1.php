<?php //indexinfo1.php
include_once('./../../../global-classes/loginu/Session.php');
include_once('../../../global-classes/vestido/vestidos.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../../css/menuprincipal.css">
	<link rel="stylesheet" href="../../../../css/info.css">
	<title>Document</title>
</head>

<body>
	<div class="banner">
        <a>Ordena en línea, a un sólo click de tu alcance</a>
    </div>
	<!--MENU-->
	<nav class="navar">
	<a class="navbar-brand">Gala<span>Tex</span>.</a>
		<ul class="links">
			<li><a href="../../../../index.php">INICIO</a></li>
			<li><a href="../princ-vestidos.php">VESTIDOS</a></li>
			<?php if($menuUser){
            echo '<li><a href="historialcompras.php">Tus Pedidos</a></li>';
            }
            ?>
		</ul>
		<?php if($menuUser){  ?>
        <a href="./../../../global-classes/loginu/LogOut.php" class="btn agendarcita">Salir</a>
        <a href="./../../../global-classes/Carrito/viewCart.php"><img src="../../../../img/carrito.png" alt="" class="carrito"></a>
		<a href="../../../global-classes/usuarios/index-perfil.php"><img src="../../../../img/usuario.png" alt="" class="carrito"></a>

        <?php }else{ ?>
        <div class="icon">
            <a href="../../../../registro.php" class="btn agendarcita">Registrarse</a>
            <a href="../../../../iniciarSesion.php" class="btn agendarcita">Iniciar Sesión</a>
        </div>
        <?php } ?>
	</nav>
	
	<div class="container-title"> HOLA </div>

	<main>

		
			<div class="mySlides fade">
			<img id = "vestido" src="../../../../img/vestidosimg/V1-Frente.jpg" alt="imagen-producto">
		</div>
		<div class="mySlides fade">
            <img id = "vestido" src="../../../../img/vestidosimg/V1-Detras.jpg">
        </div>
		<a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
            </div>
		<div class="container-info-product">
			<div class="container-price">
			<?php
                include_once('../../../global-classes/vestidos/vestidos.php');
                $miVest = new vestidos();
				$codigoVestido = 'VENBF';
                $dataset = $miVest->getVestidos($codigoVestido);
				if ($dataset != 'wrong') {
                    $registro = mysqli_fetch_assoc($dataset);
                        echo '<section class="oneproduct">';
                        echo '<form method="post" action="../../../global-classes/Carrito/shopCart.php">';
						echo '</section>';
						echo "<br>";
						echo '<input type="hidden" name="txtcodigo" class="sinborde" '.'value="'.$registro['codigo'].'" readonly>';
                        echo "<br>";
						echo '<input type="hidden" name="txtname" class="sinborde" '.'value="'.$registro['nombre'].'" readonly>';
						echo '<br>';
						echo '<input type="hidden" name="txtprice" class="sinborde" '.'value="'.$registro['precioVenta'].'" readonly>';
						echo '<br>';
						echo '<input type="hidden" name="txttalla" class="sinborde" '.'value="'.$registro['talla'].'" readonly>';
						echo '<br>';
						echo '<input type="hidden" name="txtdesc" class="sinborde" '.'value="'.$registro['descripcion'].'" readonly>';
						if ($menuUser){
                            echo "<section class='title'>".'<select name="txtqty">
                                <option value="1" selected> 1</option>
                                <option value="2"> 2</option>
                                <option value="3"> 3</option>
                                <option value="4"> 4</option>
                                <option value="5"> 5</option>
                                </select>';
                            echo '<input type="submit" value="add">'."</section>";
						}	
						echo '</section>'; 
						echo '</form>'; 
					}
				?>
						<div class="container-add-cart">';
						<?php
						if ($menuUser) {
							echo '<button class="btn-add-to-cart">Añadir al carrito</button>';
						}
						?>
						</div>
			<div class="container-description">
				
					<div>
						<?php
						 // Llamar al script PHP
						require_once './scriptxt.php';

						 // Llamar a la función PHP
						 $contenido = leer_archivo_txt('descripcion1.txt');

						 // Insertar el contenido en el apartado de descripción
						 echo $contenido;
						?>
					</div>
				
			</div>

		</div>
	</main>
	<footer>
		<section>
			<p class="foot">&copy;2023 Derechos reservados</p>
			<p class="foot">Privacidad</p>
			<p class="foot">Términos y condiciones</p>
		</section>
	</footer>
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) 
{
  showSlides(slideIndex += n);
}

function currentSlide(n) 
{
  showSlides(slideIndex = n);
}

function showSlides(n) 
{
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");

  if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {
                    slideIndex = slides.length
               }
    for (i = 0; i < slides.length; i++) 
               {
                    slides[i].style.display = "none";  
               }
    for (i = 0; i < dots.length; i++) 
               {
                    dots[i].className = dots[i].className.replace(" active", "");
               }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</body>

</html>