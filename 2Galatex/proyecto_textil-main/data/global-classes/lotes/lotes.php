<?php 
//Catalogo proveedores

include_once ('../../conexion.php');
class lotes extends conexion
{
    //Atributos de clase 
    private $num;
    private $fechaProduccion;
    private $costoProduccion;
    private $cantDefectuosos;
    private $cantVestido;
    private $cantTotalGen;
    private $estado;
    private $cod_vestido;

    public function setNum($num)
    {
        $this->num = $num;
    }

    public function setFechaProduccion($fechaProduccion)
    {
        $this->fechaProduccion = $fechaProduccion;
    }

    public function setCostoProduccion($costoProduccion)
    {
        $this->costoProduccion = $costoProduccion;
    }

    public function setCantDefectuosos($cantDefectuosos)
    {
        $this->cantDefectuosos = $cantDefectuosos;
    }

    public function setCantVestido($cantVestido)
    {
        $this->cantVestido = $cantVestido;
    }

    public function setCantTotalGen($cantTotalGen)
    {
        $this->cantTotalGen = $cantTotalGen;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function setVestido($cod_vestido)
    {
        $this->cod_vestido = $cod_vestido;
    }

    public function setCodVestido($cod_vestido)
    {
        $this->cod_vestido = $cod_vestido;
    }
    
    
    //Sin constructor, porque hereda de la clase conexion

    public function getAllLote(){
        $result = $this->conexion();
        if ($result)
        {
           $dataset = $this->consulta('select * from lotes_vestidos');
        }
        else
        {
			$dataset = "ERROR";
		}
		return $dataset;
    }


    public function getAllPv()
    {
        $result = $this->conexion();
        if ($result)
        {
           $dataset = $this->consulta('select 
            v.*,lv.*,pl.*,fab.*
            from vestidos as v
            INNER JOIN lotes_vestidos AS lv ON v.codigo = lv.cod_vestido
            INNER JOIN paquete_x_lote AS pl ON lv.num = pl.loteVestido 
            INNER JOIN fabricas AS fab ON fab.codigo = v.fabrica
            ');
        }
        else
        {
			$dataset = "ERROR";
		}
		return $dataset;
    }

    public function getOneLote(){
        $consulta = $this->conexion();
        if($consulta == true){
            $dataset = $this->consulta("SELECT cantVestidos FROM lotes_vestidos WHERE cod_vestido = '$this->cod_vestido';");
        }
        else{
            $dataset = "Wrong";
        }
        return $dataset;
    }




     // Método que actualiza el estado a 'NO DISPONIBLE' cuando CANTVESTIDO es igual a 0
    public function actualizarEstado()
    {
        $query = "UPDATE LOTES_VESTIDOS SET ESTADO = 'NO DISPONIBLE' WHERE CANTVESTIDO = 0";
        $this->actualizar($query);
    }
    
    
    //Metodo que hace el INSERT a la tabla materia_prima
    public function insertNewLote()
    {
        $sql = "INSERT INTO lotes_vestidos (cod_vestido, fechaProduccion, cantDefectuosos, cantTotalGen)       
        VALUES ('" . $this->cod_vestido . "','" . $this->fechaProduccion . "',
                 '" . $this->cantDefectuosos . "', '" . $this->cantTotalGen . "')";

    
        //Metodo que realiza la conexion
        $result = $this->conexion();

        //Si se realiza entonces..
        if ($result) {
            $newid = $this->insertar($sql);
        } else {
            $newid = 0;
        }
        return $newid;
    }
}

