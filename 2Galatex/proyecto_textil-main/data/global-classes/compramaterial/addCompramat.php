<?php
include_once 'compramat.php';
$compra = new Compramat();
$resultFabricas = $compra->obtenerFabricas();
$resultProveedores = $compra->obtenerProveedores();
$materialesProveedor = array();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aceptar'])) {
    $fabricaSeleccionada = $_POST['fabrica'];
    $proveedorSeleccionado = $_POST['proveedor'];
    $resultMaterialesProveedor = $compra->obtenerMaterialesProveedor($proveedorSeleccionado);
    while ($rowMaterialProveedor = mysqli_fetch_assoc($resultMaterialesProveedor)) {
        $materialesProveedor[] = $rowMaterialProveedor;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['realizar_compra'])) {
    $fabricaSeleccionada = $_POST['fabrica'];
    $proveedorSeleccionado = $_POST['proveedor'];
    $materialesSeleccionados = $_POST['materiales'];
    $cantidadesSeleccionadas = $_POST['cantidades'];
    $compra->realizarCompra($fabricaSeleccionada, $proveedorSeleccionado, $materialesSeleccionados, $cantidadesSeleccionadas);
}

?>