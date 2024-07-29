<?php //Pedidos.php
    include_once(__DIR__ .'/../../conexion.php');
    include_once('usuarios.php');

    class pedidos extends conexion{
        private $num;
        private $fecha;
        private $cantTotalVest;
        private $subtotal;
        private $iva;
        private $total;
        private $cliente;



        //Metodos:get ver el valor, set: colocar valor
        public function setNum($num){
            $this->num = $num;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }

        public function setcantTotalVest($cantTotalVest){
            $this->cantTotalVest = $cantTotalVest;
        }

        public function setsubtotal($subtotal){
            $this->subtotal = $subtotal;
        }

        public function setIVA($iva){
            $this->iva = $iva;
        }

        public function setTotal($total){
            $this->total = $total;
            
        }

        public function setCliente($cliente){
            $this->cliente = $cliente;

        }    

        public function getAllPed(){
		$result = $this->conexion();
		if ($result) {
			$dataset = $this->consulta('SELECT * FROM pedidos');
		} else {
			$dataset = "ERROR";
		}
		return $dataset;
	}

        public function getOnePed(){
            $sql = "SELECT * FROM pedidos
                    WHERE cliente = '".$this->cliente."'";
        $result = $this->conexion();
        if ($result) {
			$dataset = $this->consulta($sql);
		} else {
			$dataset = "ERROR";
		}
		return $dataset;
	    }
        
        public function setPedido(){
            $sql = "insert into pedidos(fecha,cantTotalVest,subtotal,iva,total,cliente) values ('".$this->fecha."',".$this->cantTotalVest.",".$this->subtotal.",".$this->iva.",".$this->total.",".$this->cliente.")";
            $resultado = $this->conexion();
            if($resultado){
                $newid = $this->insertar($sql);
            }
            else{
                $newid = 0;
            }
            return $newid;
        }

    }
?>