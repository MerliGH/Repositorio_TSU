<?php
include('../loginu/Session.php');
if ($menuUser == true) {
    unset($_SESSION['shopCart']); //Libera el carrito de compras
}
header('Location: viewCart.php');
?>