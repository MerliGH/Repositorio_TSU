<?php 
//Catalogo proveedores

include_once ('../../conexion.php');
class proveedor extends conexion
{
    //Atributos de clase 
    private $codigo;
    private $nombreEmpresa;
    private $numTel;
    private $nombreContact;
    private $apPat;
    private $apMat;
    


    
    public function getAllPv()
    {
        //Metodo que realiza la conexion
        $result = $this->conexion();

        //Si se realiza entonces..
        if ($result)
        {
            $dataset = $this->consulta('SELECT * FROM proveedores');
        }
        else
        {
			$dataset = "ERROR";
		}
		return $dataset;
    }

        
    }




?>