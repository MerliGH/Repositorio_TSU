<?php 
include_once(__DIR__ . '/../../conexion.php');
class vestidos extends conexion
{
    private $codigo;
    private $nombre;
    private $talla;
    private $descripcion;
    private $precioVenta;
    private $fabrica;
    private $loteVestido;
    private $imagen1;
    private $imagen2;

    

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }



    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    
    public function setPrecioventa($precioVenta)
    {
        $this->precioVenta = $precioVenta;
    }
    
    public function setFabrica($fabrica)
    {
        $this->fabrica = $fabrica;
    }
    
    public function setLotevestido($loteVestido)
    {
        $this->loteVestido = $loteVestido;
    }

    public function getAllVestidos(){
		$consulta = $this->conexion();
		if($consulta == true){
			$dataset = $this->consulta('SELECT * FROM vestidos  
                                        WHERE imagen1 IS NOT NULL AND imagen2 IS NOT NULL 
                                        order by talla desc
                                        LIMIT 12;');
		}
		else{
			$dataset = "Wrong";
		}
		return $dataset;
	}

    public function getRandomVestidos(){
		$consulta = $this->conexion();
		if($consulta == true){
			$dataset = $this->consulta('SELECT * FROM vestidos
            WHERE imagen1 IS NOT NULL AND imagen2 IS NOT NULL
            ORDER BY RAND() LIMIT 3;');
		}
		else{
			$dataset = "Wrong";
		}
		return $dataset;
	}


    
    public function getOnevestido($codigo){
        $consulta = $this->conexion();
        if($consulta == true){
            $dataset = $this->consulta("SELECT * FROM vestidos WHERE codigo = '$codigo' LIMIT 1;");
        }
        else{
            $dataset = "Wrong";
        }
        return $dataset;
    }


}

?>