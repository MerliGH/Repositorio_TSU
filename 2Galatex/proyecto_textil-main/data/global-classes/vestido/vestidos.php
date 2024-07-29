<?php //vestidos.php
include_once('conexion.php');
class vestidos extends conexion
{
    private $codigo;
    private $nombre;
    private $talla;
    private $descripcion;
    private $precioVenta;
    private $fabrica;
    private $loteVestido;

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setTalla($talla){
        $this->talla = $talla;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setPrecioVenta($precioVenta){
        $this->precioVenta = $precioVenta;
    }

    public function setfabrica($fabrica){
        $this->fabrica = $fabrica;
    }

    public function setLoteVestido($loteVestido){
        $this->loteVestido = $loteVestido;
    }
    //Sin constructor, porque hereda de la clase conexion


    //Metodos

    public function getVestidos(){
        $consulta = $this->conexion();
        if($consulta == true){
            $dataset = $this->consulta('select * from vestidos');
        }else{
            $dataset = "Wrong";
        }
        return $dataset;
    }

    public function getAllV(){
        //Metodo que realiza la conexion
        $result = $this->conexion();

        //Si se realiza entonces..
        if ($result)
        {
            $dataset = $this->consulta('select 
            v.*,lv.*,pl.*
            from vestidos as v
            inner join lotes_vestidos as lv on v.`loteVestido` = lv.num 
            inner join paquete_x_lote as pl on lv.num = pl.`loteVestido`');
        }
        else
        {
			$dataset = "ERROR";
		}
		return $dataset;
    }

    public function setVestidos(){
        $sql = "insert into vestidos (nombre,talla,descripcion,precioVenta, fabrica,loteVestido)
        values('".$this->nombre."','".$this->talla."','".$this->descripcion."','".$this->precioVenta."','".$this->fabrica."',".$this->loteVestido.")";
        $resultado = $this->conexion();
        if ($resultado) {
            $newid = $this->insertar($sql);
        } else {
            $newid = 0;
        }
        return $newid; 
    }

}

?>