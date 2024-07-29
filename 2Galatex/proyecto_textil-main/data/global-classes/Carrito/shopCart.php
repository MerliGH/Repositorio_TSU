<?php //Shopcart.php
include_once('../loginu/Session.php');
include_once('../vestidos/vestidos.php');
include_once('../paqXLote/paqueteXLote.php');
if (!empty($_POST)) {
    if (isset($_POST['txtcodigo']) && isset($_POST['txtqty'])) {
        if (empty($_SESSION['shopCart'])) { //carrito vacio?
            $_SESSION['shopCart'] = array(
                array(
                    "codigo" => $_POST['txtcodigo'],
                    "nombre" => $_POST['txtname'],
                    "talla" => $_POST['txttalla'],
                    "descripcion" => $_POST['txtdesc'],
                    "precioventa" => $_POST['txtprice'],
                    "qty" => $_POST['txtqty'],
                    "num" => $_POST['txtnum']
                )
            );
            print_r($_SESSION['shopCart']);
        } else {
            $i = -1;
            $yaexiste = false;
            $shopCart = $_SESSION['shopCart'];
            foreach ($_SESSION['shopCart'] as $key => $element) {
                $i++;
                if ($element['codigo'] == $_POST['txtcodigo']) {
                    $yaexiste = true;
                    $shopCart[$i]['qty'] += $_POST['txtqty']; //viewCart ya tiene esta operación
                    $element ['qty'] += $_POST['txtqty'];
                    break;
                }
            }

            if ($yaexiste == false) {
                array_push($shopCart, array(
                    "codigo" => $_POST['txtcodigo'],
                    "nombre" => $_POST['txtname'],
                    "talla" => $_POST['txttalla'],
                    "descripcion" => $_POST['txtname'],
                    "precioventa" => $_POST['txtprice'],
                    "qty" => $_POST['txtqty'],
                    "num" => $_POST['txtnum']
                ));
            }
            $_SESSION['shopCart'] = $shopCart;
            print_r($_SESSION['shopCart']);
        }
    }
}

header('Location:../../global-index/vestidos/princ-vestidos.php');
?>
