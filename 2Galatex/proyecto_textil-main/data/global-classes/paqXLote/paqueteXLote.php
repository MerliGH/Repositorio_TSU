<?php //paqueteXLote.php
include_once(__DIR__ .'/../../conexion.php');
class paqueteXLote extends conexion
{
    private $num;
    private $cantPaquete;
    private $cantVestidos;
    private $loteVestido;
    
    public function setnum($num){
		$this->num = $num;
	}

    public function setCantPaquete($cantPaquete){
		$this->cantPaquete = $cantPaquete;
	}

    public function setCantVestidos($cantVestidos){
		$this->cantVestidos = $cantVestidos;
	}

    public function setLoteVestido($loteVestido){
		$this->loteVestido = $loteVestido;
	}


	

    public function getAllPaquete(){
		$consulta = $this->conexion();
		if($consulta == true){
			$dataset = $this->consulta('select * from paquete_x_lote');
		}
		else{
			$dataset = "Wrong";
		}
		return $dataset;
	}

	public function getOnePaq($codigoVestido){
		$consulta = $this->conexion();
		if($consulta == true){
			$dataset = $this->consulta("select PL.num from paquete_x_lote as PL
										inner join lotes_vestidos as LV
										on PL.loteVestido = LV.num
										inner join vestidos as ves
										on LV.cod_vestido = ves.codigo
										WHERE ves.codigo = '$codigoVestido'");
		}
		else{
			$dataset = "Wrong";
		}
		return $dataset;
	}


    public function setPaquetes(){
        $sql = "insert into paquete_x_lote (cantPaquete,cantVestidos,loteVestido)
        values(".$this->cantPaquete.",".$this->cantVestidos.",".$this->loteVestido.")";
		$resultado = $this->conexion();
		if($resultado){
			$newid = $this->insertar($sql);
		}else{
			$newid = 0;
		}
		return $newid;
    }


   
}
    

?>