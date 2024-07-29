<?php
include("../loginu/Session.php");
include("../pedidos/pedidos.php");
include("../vestidos/vestidos.php");
include("../pedPaqxLote/pedPaqxLote.php");
include("../paqXLote/paqueteXLote.php"); // Asegúrate de incluir el archivo de la clase paqueteXLote

if (!empty($_SESSION['shopCart']) && $menuUser) {
    $fechaActual = date('Y-m-d');

    $order = new Pedidos;
    $order->setFecha($fechaActual);
    $order->setTotal($_SESSION['total']);
    $order->setCantTotalVest($_SESSION['totalqty']);
    $order->setIva($_SESSION['iva']);
    $order->setSubtotal($_SESSION['subtotal']);
    $order->setCliente($_SESSION['numero']);
    $newid = $order->setPedido();
    $orderPPL = new pedPaqxLote;

    foreach ($_SESSION['shopCart'] as $element) {
        $paqueteXLote = new paqueteXLote();
        $codigoVestido = $element['codigo']; 
        $resultados = $paqueteXLote->getOnePaq($codigoVestido);

        foreach ($resultados as $resultado) {
            $numPaquete = $resultado['num'];
            
            $orderPPL->setPedido($newid);
            $orderPPL->setPaqueteLote($numPaquete);
            $importe = $element['precioventa'] * $_POST['txtqty'];
            $orderPPL->setImporte($importe);
            $orderPPL->setCantidad($element['qty']);
            $orderPPL->setPedPaqxLote();
        }
    }

    unset($_SESSION['shopCart']);
}

header('Location: ../../../index.php');
?>
