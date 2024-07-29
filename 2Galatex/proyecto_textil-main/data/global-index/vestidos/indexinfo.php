<?php //indexinfo.php
include_once('./../../global-classes/loginu/Session.php');
include('../../global-classes/vestidos/vestidos.php');
include('../../global-classes/lotes/lotes.php');
include('../../global-classes/paqXLote/paqueteXLote.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../css/menuprincipal.css">
	<link rel="stylesheet" href="../../../css/info.css">
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
            <li><a href="./../../../index.php">INICIO</a></li>
            <li><a href="./princ-vestidos.php">VESTIDOS</a></li>
            <?php if($menuUser){
            echo '<li><a href="./../../../historialcompras.php">TUS PEDIDOS</a></li>';
            }
            ?>
        </ul>
        <?php if($menuUser){  
        echo '<br>';    
        echo '<p class = "Usuario">'.$User.'</p>';
        echo '<a href="./../../global-classes/loginu/LogOut.php"><img src="../../../img/salir.png" alt="" class="carrito"></a>';
        echo '<a href="./../../global-classes/Carrito/viewCart.php"><img src="../../../img/carrito.png" alt="" class="carrito"></a>';
        echo '<a href="./../../global-classes/usuarios/index-perfil.php"><img src="./../../../img/usuario.png" alt="" class="carrito"></a>';
        }else{
        echo '<div class="icon">';
            echo '<a href="../../../registro.php" class="btn agendarcita">Registrarse</a>';
            echo '<a href="../../../iniciarSesion.php" class="btn agendarcita">Login</a>';
        echo '</div>';
        } ?>
    </nav>
	
	<?php
	if (isset($_GET['codigo'])) {
		$codigoVestido = $_GET['codigo'];
		$miobjeto = new vestidos();
		$miobjeto->setCodigo($codigoVestido);
		$consulta = $miobjeto->getOnevestido($codigoVestido);



	while ($fila = mysqli_fetch_assoc($consulta)) { ?>
		<div class="container-title"><?= $fila['nombre'] ?></div>
		<main>
			<div class="mySlides fade">
				<img id="vestido" src="../../../img/vestidosimg/<?= $fila['imagen1'] ?>" alt="imagen-producto">
			</div>
			<div class="mySlides fade">
				<img id="vestido" src="../../../img/vestidosimg/<?= $fila['imagen2'] ?>">
			</div>
			<a class="prev" onclick="plusSlides(-1)">❮</a>
			<a class="next" onclick="plusSlides(1)">❯</a>
			<div style="text-align:center">
				<span class="dot" onclick="currentSlide(1)"></span>
				<span class="dot" onclick="currentSlide(2)"></span>
			</div>
			<div class="container-info-product">
				<div class="container-price">
					<h4>Precio</h4>
					<span>$<?= $fila['precioVenta'] ?></span>
				</div>

				<div class="container-details-product">
					<div class="form-group">
						<label>Talla única</label>
						<select id="size">
							<option selected><?= $fila['talla'] ?></option>
						</select>
					</div>
				</div>
				<?php
				$miobjetoLote = new lotes();
				$miobjetoLote->setVestido($fila['codigo']);
				$consultaLote = $miobjetoLote->getOneLote();
				$filaLote = mysqli_fetch_assoc($consultaLote);
				$cantVestidos = $filaLote['cantVestidos'];
        		?>

				<?php
				if($cantVestidos >= 20){
				echo '<p>Cantidad de vestidos disponibles:' .$cantVestidos.'</p>';
				echo '<form method="post" action="../../global-classes/Carrito/shopCart.php">';
				echo '</section>';
				echo '<input type="hidden" name="txtcodigo" class="sinborde" '.'value="'.$fila['codigo'].'" readonly>';
				echo '<input type="hidden" name="txtname" class="sinborde" '.'value="'.$fila['nombre'].'" readonly>';
				echo '<input type="hidden" name="txtprice" class="sinborde" '.'value="'.$fila['precioVenta'].'" readonly>';
				echo '<input type="hidden" name="txttalla" class="sinborde" '.'value="'.$fila['talla'].'" readonly>';
				echo '<input type="hidden" name="txtdesc" class="sinborde" '.'value="'.$fila['descripcion'].'" readonly>';
				echo '<br>';
				if ($menuUser){
                            echo "<section class='title'>".'<select name="txtqty">
                                <option value="20" selected> 20</option>
                                <option value="40"> 40</option>
                                <option value="60"> 60</option>
                                <option value="80"> 80</option>
					    		<option value="100">100</option>
                                </select>';
							echo '<br>&nbsp;&nbsp;&nbsp';
							echo '&nbsp;<button class="btn-add-to-cart">Añadir al carrito</button>';
                        }
				}else{
					echo '<h2>No hay Stock Suficiente para Realizar la Compra</h2>';
					echo '<br>';
				}
				?>
				<div class="container-description">

					<?php
					echo "<br>";
					// Llamar al script PHP
					require_once './scriptxt.php';

					// Llamar a la función PHP
					$contenido = leer_archivo_txt($codigoVestido . '.txt');

					// Insertar el contenido en el apartado de descripción
					echo $contenido;
					?>

				</div>

			</div>
		<?php } ?>
		<?php } ?>
		
		</main>
		<footer>
			<section>
				<p class="foot">&copy;2023 Derechos reservados</p>
				<p class="foot">Privacidad</p>
				<p class="foot">Términos y condiciones</p>
			</section>
		</footer>
		<script src="../../../js/slides.js"></script>

</body>

</html>