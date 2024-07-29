<?php 
//Catalogo vestidos

include_once ('../../conexion.php');
class paqueteLote extends conexion
{
    //Atributos de clase 
    private $num;
    private $cantPaquete;
    private $cantVestidos;
    private $loteVestido;




    //Sin constructor, porque hereda de la clase conexion

    //Metodos
    public function getAllPl()
    {
        //Metodo que realiza la conexion
        $result = $this->conexion();

        //Si se realiza entonces..
        if ($result)
        {
            $dataset = $this->consulta('select 
            v.*,lv.*,pl.*
            from vestidos as v
            INNER JOIN lotes_vestidos AS lv ON v.codigo = lv.cod_vestido
            INNER JOIN paquete_x_lote AS pl ON lv.num = pl.loteVestido 
            ');
        }
        else
        {
			$dataset = "ERROR";
		}
		return $dataset;
    }

        
        }

