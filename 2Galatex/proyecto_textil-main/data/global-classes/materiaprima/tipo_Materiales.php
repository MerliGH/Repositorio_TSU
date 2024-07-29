<?php 

include_once ('../../conexion.php');
class tipo_Materiales extends conexion
{
    //Atributos de clase 
    private $num;
    private $nombre;
    private $color;
    private $descripcion;
    
    public function setNum($num)
    {
		$this->num = $num;
	}

    public function getNum() {
        return $this->num;
    }

    public function setNombre($nombre)
    {
		$this->nombre = $nombre;
	}

    public function setColor($color)
    {
		$this->color = $color;
	}

    public function setDescripcion($descripcion)
    {
		$this->descripcion = $descripcion;
	}

    public function getAllTipos()
    {

        $result = $this->conexion();

        //Si se realiza entonces..
        if ($result)
        {
            $dataset = $this->consulta (' SELECT 
                                          mp.*, tm.*
                                          FROM materia_prima AS mp
                                          INNER JOIN tipo_materiales AS tm ON mp.tipoMaterial = tm.num
                                       ');
        }
        else
        {
			$dataset = "ERROR";
		}
		return $dataset;
    }



    //Metodo que hace el SELECT a la tabla materia_prima
    public function getTipoMateriales()
{
    $sql = "SELECT mp.*, tm.*
            FROM materia_prima AS mp
            INNER JOIN tipo_materiales AS tm ON mp.tipoMaterial = tm.num
            WHERE tm.num = '$this->num'";

    $result = $this->conexion();

    if ($result)
    {
        $dataset = $this->consulta($sql);

        if ($dataset && mysqli_num_rows($dataset) > 0) 
        {
            return mysqli_fetch_assoc($dataset);  
        } 
        else 
        {
            return "No se pudo obtener la información del usuario.";
        }
    }
    else
    {
        $dataset = "ERROR";
    }
    return $dataset;
}


    //Metodo que hace el INSERT a la tabla materia_prima
    public function insertNewMP()
    {
        $sql = "INSERT INTO materia_prima (num, nombre, color, descripcion, stock, tipoMaterial, proveedor)       
                  VALUES ('".$this->num."','".$this->nombre."','".$this->color."',
                          '".$this->descripcion."',".$this->stock.",
                           ".$this->tipoMaterial.", '".$this->proveedor."')";

        //Metodo que realiza la conexion
        $result = $this->conexion();

        //Si se realiza entonces..
        if ($result)
        {
            $newid = $this->insertar($sql);
        }
        else
        {
			$newid = 0;
		}
		return $newid;
    }

    public function updateColor()
{
    $sql = "UPDATE tipo_materiales
            SET color = '".$this->nuevoColor."'
            WHERE num = '".$this->num."'";
    
    echo "SQL tipo_Materiales: $sql\n";
    
    // Método que realiza la conexión
    $result = $this->conexion();
    
    // Si se realiza entonces...
    if ($result)
    {
        $newid = $this->actualizar($sql);
    }
    else
    {
        $newid = 0;
    }
    return $newid;
}

    
    public function setNuevoColor($nuevoColor)
    {
        $this->nuevoColor = $nuevoColor;
    }

}


/*public function getAllMP()
    {
        
        $sql = "SELECT mp.*, tp.*
                FROM materia_prima AS mp
                INNER JOIN tipo_materiales AS tp ON mp.tipoMaterial = tm.clave
                WHERE mp.clave  
                ='$this->clave' ";

        $result = $this->conexion();

        //Si se realiza entonces..
        if ($result)
        {
            $dataset = $this->consulta($sql);

            if ($dataset && mysqli_num_rows($dataset) > 0) 
            {
                return $dataset;  //Devuelve ese conjunto de datos
            } 
            else 
            {
                return "No se pudo obtener la información del usuario.";
            }
        }
        else
        {
			$dataset = "ERROR";
		}
		return $dataset;
    }*/
?>

