<?php //pedPaqxLote.php

include_once(__DIR__ .'/../../conexion.php');

class pedPaqxLote extends conexion{
    private $pedido;
    private $paqueteLote;
    private $importe;
    private $cantidad;

    public function setPedido($pedido){
        $this->pedido = $pedido;
    }

    public function setPaqueteLote($paqueteLote){
        $this->paqueteLote = $paqueteLote;
    }

    public function setImporte($importe){
        $this->importe = $importe;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }

    public function getAllPedPaqLote(){
        $consulta = $this->conexion();
        if($consulta == true){
            $dataset = $this->consulta('select * from ped_paqxlote');
        }else{
            $dataset = 'wrong';
        }
        return $dataset;
    }

    public function setPedPaqxLote(){
        $sql = "insert into ped_paqxlote (pedido,paqueteLote,importe,cantidad) VALUES(".$this->pedido.",".$this->paqueteLote.",".$this->importe.",".$this->cantidad.")";
        echo $sql;
        $result = $this->conexion();
		if($result){
			$newid = $this->insertar($sql);
		}else{
			$newid = 0;
		}
		return $newid;
    }


}