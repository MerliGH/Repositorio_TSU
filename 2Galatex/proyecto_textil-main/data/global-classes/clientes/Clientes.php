<?php 
include_once('../../conexion.php');

class clientes extends conexion
{
    private $num;
    private $rfc;
    private $nombreEmpresa;
    private $telEmpresa;
    private $nombreContacto;
    private $apPat;
    private $apMat;
    private $correo;
    private $telContact;
    //Setters para capturar los atributos 
    public function setnum($num)
    {
		$this->num = $num;
	}
    public function setrfc($rfc)
    {
		$this->rfc = $rfc;
	}
    public function setNombreEmpresa($nombreEmpresa)
    {
		$this->nombreEmpresa = $nombreEmpresa;
	}
    public function setTelEmpresa($telEmpresa)
    {
		$this->telEmpresa = $telEmpresa;
	}
    public function setNombreContacto($nombreContacto)
    {
		$this->nombreContacto = $nombreContacto;
	}
    public function setApPat($apPat)
    {
        $this->apPat = $apPat;
    }
    public function setApMat($apMat)
    {
		$this->apMat = $apMat;
	}
    public function setCorreo($correo)
    {
		$this->correo = $correo;
	}
    public function setTelContact($telContact)
    {
        $this->telContact = $telContact;
    }
    //Getters para hacer referencia al objeto y sobreescribir el valor
    public function getNum()
    {
        return $this->num;
    }
    public function getRfc()
    {
        return $this->rfc;
    }
    public function getNombreEmpresa()
    {
        return $this->nombreEmpresa;
    }
    public function getTelEmpresa()
    {
        return $this->telEmpresa;
    }
    public function getNombreContacto()
    {
        return $this->nombreContacto;
    }
    public function getApPat()
    {
        return $this->apPat;
    }
    public function getApMat()
    {
        return $this->apMat;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function getTelContact()
    {
        return $this->telContact;
    }
    //SELECT de Clientes
    public function getAllClientes(){
		$consulta = $this->conexion();
		if($consulta == true)
        {
			$dataset = $this->consulta('select * from clientes');
		}
		else
        {
			$dataset = "Wrong";
		}
		return $dataset;
	}
    //INSERT del cliente 
    public function setUser()
    {
        //insertamos los datos del cliente
        $sql = "INSERT INTO clientes (rfc, nombreEmpresa, telEmpresa, nombreContacto, apPat, apMat, correo, telContact)
        values ('".$this->rfc."','".$this->nombreEmpresa."','".$this->telEmpresa."','".$this->nombreContacto."','".$this->apPat."','".$this->apMat."','".$this->correo."', '".$this->telContact."')";
        
        //echo "<br>";echo $sql;
        $resultado = $this->conexion();
        if ($resultado) 
        {
            $newid = $this->insertar($sql);
        } 
        else 
        {
            $newid = 0;
        }
        return $newid;
    }
    /* Actualizaciones varias para el requerimiento de configuracion de perfil en la tabla Clientes*/ 
    
    public function updateRFC()
    {
        $sql = "UPDATE clientes AS cte
            INNER JOIN usuarios AS u ON u.cliente = cte.num
            SET cte.rfc = '".$this->nuevoRFC."'
                WHERE cte.rfc = '".$this->rfc."'";
        $result = $this->conexion();
     
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
    
    public function setNuevoRFC($nuevoRFC)
    {
        $this->nuevoRFC = $nuevoRFC;
    }
      
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ 
    
    public function updateEmpresa()
    {
        $sql = "UPDATE clientes AS cte
            INNER JOIN usuarios AS u ON u.cliente = cte.num
            SET cte.nombreEmpresa = '".$this->nuevaEmp."'
                WHERE cte.nombreEmpresa = '".$this->nombreEmpresa."'";
        $result = $this->conexion();
     
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
    
    public function setNuevaEmpresa($nuevaEmp)
    {
        $this->nuevaEmp = $nuevaEmp;
    }
        
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ 
        
    public function updateTelEmpresa()
    {
        $sql = "UPDATE clientes AS cte
            INNER JOIN usuarios AS u ON u.cliente = cte.num
            SET cte.telEmpresa = '".$this->nuevoTelEmp."'
                WHERE cte.telEmpresa = '".$this->telEmpresa."'";
        $result = $this->conexion();
    
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
    
    public function setNuevoTelEmp($nuevoTelEmp)
    {
        $this->nuevoTelEmp = $nuevoTelEmp;
    }
     /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ 
     public function updateNombre()
     {
        $sql = "UPDATE clientes AS cte
                INNER JOIN usuarios AS u ON u.cliente = cte.num
                SET cte.nombreContacto = '".$this->nuevoNombre."',
                    cte.apPat = '".$this->nuevoapPat."',
                    cte.apMat = '".$this->nuevoapMat."'
                    
                WHERE cte.nombreContacto= '".$this->nombreContacto."' 
                AND cte.apPat = '".$this->apPat."' 
                AND cte.apMat = '".$this->apMat."' ";
 
         $result = $this->conexion();
      
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
     public function setNuevoNombre($nuevoNombre)
     {
         $this->nuevoNombre = $nuevoNombre;
     }
    
     public function setNuevoapPat($nuevoapPat)
     {
         $this->nuevoapPat = $nuevoapPat;
     }
    
     public function setNuevoapMat($nuevoapMat)
     {
         $this->nuevoapMat = $nuevoapMat;
     }
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ 
    public function updateCorreo()
    {
        $sql = "UPDATE clientes AS cte
            INNER JOIN usuarios AS u ON u.cliente = cte.num
            SET cte.correo = '".$this->nuevoCorreo."'
                WHERE cte.correo = '".$this->correo."'";
        $result = $this->conexion();
     
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
    
    public function setNuevoCorreo($nuevoCorreo)
    {
        $this->nuevoCorreo = $nuevoCorreo;
    }
      
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ 
    public function updateTel()
    {
        $sql = "UPDATE clientes AS cte
            INNER JOIN usuarios AS u ON u.cliente = cte.num
            SET cte.telContact = '".$this->nuevoTel."'
                WHERE cte.telContact  = '".$this->telContact ."'";
        $result = $this->conexion();
     
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
    
    public function setNuevoTel($nuevoTel)
    {
        $this->nuevoTel = $nuevoTel;
    }
      
}
    
?>
