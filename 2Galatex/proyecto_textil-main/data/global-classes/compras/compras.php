<?php 
include_once ('../../conexion.php');
class compras extends conexion
{
    private $num;
    private $fecha;
    private $cantComprada;
    private $subTotal;
    private $iva;
    private $total;
    private $fabrica;
    private $proveedor;
    
    public function setnum($num){
		$this->num = $num;
	}

    public function setfecha($fecha){
		$this->fecha = $fecha;
	}

    public function setcantComprada($cantComprada){
		$this->cantComprada = $cantComprada;
	}

    public function setsubTotal($subTotal){
		$this->subTotal = $subTotal;
	}

    public function setiva($iva){
		$this->iva = $iva;
	}

    public function settotal($total){
        $this->total = $total;
    }

    public function setfabrica($fabrica){
		$this->fabrica = $fabrica;
	}

    public function setproveedor($proveedor){
		$this->proveedor = $proveedor;
	}


    public function getAllcompras(){
		$consulta = $this->conexion();
		if($consulta == true)
    {
			$dataset = $this->consulta('SELECT
            com.*, fab.*, prov.*, cm.*
            FROM compras as com
            INNER JOIN fabricas as fab ON com.fabrica = fab.codigo
            INNER JOIN proveedores as prov ON com.proveedor = prov.codigo
            INNER JOIN compra_mat as cm ON com.num = cm.compra;');
		}
		else{
			$dataset = "Wrong";
		}
		return $dataset;
	}


   
}
    

?>