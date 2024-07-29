<?php

include_once '../../conexion.php';


class Compramat extends conexion{
    private $descripcionmp;
    private $nombreMaterial;
    
    public function setDescripcion($descripcionmp)
    {
        $this->descripcionmp = $descripcionmp;
    }

    
    public function obtenerFabricas() {
        $query = "SELECT * FROM fabricas";
        return $this->consulta($query);
    }

    public function obtenerProveedores() {
        $query = "SELECT * FROM proveedores where estado = 'activo'";
        return $this->consulta($query);
    }

    public function obtenerMaterialesProveedor($proveedor) {
        $query = "
            SELECT 
                mp.clave, mp.nombreMaterial, mp.precio, tm.num, tm.nombre, tm.color, tm.descripcion as descripcionmp
            FROM 
                materia_prima AS mp
                INNER JOIN tipo_materiales AS tm ON mp.tipoMaterial = tm.num
            WHERE 
                mp.proveedor = '$proveedor'";
        return $this->consulta($query);
    }

    public function realizarCompra($fabrica, $proveedor, $materiales, $cantidades) {
        $fechaCompra = date("Y-m-d");
        $query = "INSERT INTO compras (fecha, fabrica, proveedor) VALUES ('$fechaCompra', '$fabrica', '$proveedor')";
        $idCompra = $this->insertar($query);

        foreach ($materiales as $key => $material) {
            $cantidad = $cantidades[$key];
            if (!empty($cantidad)) {
                $query2 = "INSERT INTO compra_mat (compra, materiaPrima, cantidad) VALUES ('$idCompra', '$material', '$cantidad')";
                $this->consulta($query2);
            }
        }

        //echo "Compra realizada exitosamente";
    }

    
    public function getAllcomMat(){
		$consulta = $this->conexion();
		if($consulta == true)
    {
			$dataset = $this->consulta('SELECT
            comat.*, mat.*, tip.*
            FROM compra_mat as comat
            inner join materia_prima as mat on comat.materiaPrima = mat.clave
            inner join tipo_materiales as tip on mat.tipoMaterial = tip.num');
		}
		else{
			$dataset = "Wrong";
		}
		return $dataset;
	}
}

?>