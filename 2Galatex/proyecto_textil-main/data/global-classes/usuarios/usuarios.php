<?php 
include_once ('../../conexion.php');
class usuarios extends conexion
{
    private $num;
    private $nombreUser;
    private $password;
    private $category;
    private $cliente;
    //Se agrega columna estado, por default activo para la parte de dar de baja la cuenta
    private $estado;
    
    public function getNum() 
    {
        return $this->num;
    }
    
    public function setNombreUser($nombreUser)
    {
        $this->nombreUser = $nombreUser;
    }
    public function getNombreUser()
    {
        return $this->nombreUser;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }
    public function getCliente()
    {
        return $this->cliente;
    }
    
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    //Actualize la funcion porque no me permitia hacer el SELECT del usuario Loggeado :)
    public function getUser() 
    {
        $sql = "SELECT u.*, c.*
                FROM usuarios u
                INNER JOIN clientes c ON u.cliente = c.num
                WHERE u.nombreUser 
                ='$this->nombreUser' AND  u.password = '$this->password' AND u.categoria='C'";
        $resultado = $this->conexion();
        if($resultado)
        {
            //Se realiza la consulta
            $dataset = $this->consulta($sql);
    
            //Cuenta si hay registros segun el conjunto de datos
            if ($dataset && mysqli_num_rows($dataset) > 0) 
            {
                return $dataset;  //Devuelve ese conjunto de datos
            } 
            else 
            {
                return false;
            }
        }
        else 
        {
            return "Wrong";
        }
    }

    


    public function getPasswordRecovery(){
        $sql= "select nombreUser from usuarios where nombreUser = '$this->nombreUser'";
        $resultado = $this->consulta($sql);
        if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        return $fila;
        } 
        else {
        return null;
        }
    }
    public function updatePassword($newPassword) 
    {
        $sql = "UPDATE usuarios SET password = '$newPassword' WHERE nombreUser = '$this->nombreUser' ";
        echo $sql;
        $resultado = $this->conexion();
            if($resultado)
            {
                $answer = $this->actualizar($sql);
                if (!$answer) 
                {
                    echo "Error en la consulta: " . mysqli_error($this->conexion());
                }
            }
            else
            {
                $answer = false;
            }
            return $answer;
        }
    public function setUsuario(){
        $sql = "insert into usuarios (nombreUser,password,categoria,cliente)
        values ('".$this->nombreUser."','".$this->password."','C',".$this->cliente.")";
        //echo "<br>";echo $sql;
        $resultado = $this->conexion();
        if ($resultado) {
            $newid = $this->insertar($sql);
        } else {
            $newid = 0;
        }
        return $newid;
    }
///////////////////////////////////////////////////////////////////////////////////////////////
    
    /* Actualizaciones de usuario y password para el requerimiento de configuracion de perfil */ 
    public function updateNameUser()
    {
        $sql = "UPDATE usuarios AS u
            INNER JOIN clientes AS cte ON u.cliente = cte.num
            SET u.nombreUser = '".$this->nuevoNombreUsuario."'
                WHERE u.nombreUser = '".$this->nombreUser."'";
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
    
    public function setNuevoNombreUser($nuevoNombreUsuario)
    {
        $this->nuevoNombreUsuario = $nuevoNombreUsuario;
    }
    
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ 
    
    public function updatePass()
    {
        $sql = "UPDATE usuarios AS u
            INNER JOIN clientes AS cte ON u.cliente = cte.num
            SET u.password = '".$this->nuevaPass."'
                WHERE u.password = '".$this->password."'";
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
    
    public function setNuevaPassword($nuevaPass)
    {
        $this->nuevaPass = $nuevaPass;
    }
    /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/ 
  
    public function updateEstado()
    {
        
        $sql = "UPDATE usuarios AS u
        INNER JOIN clientes AS cte ON u.cliente = cte.num
        SET u.estado = '".$this->nuevoEstado."',
            u.nombreUser = '".$this->nombreUser."'
            
        WHERE u.estado = '".$this->estado."'
        AND u.nombreUser = '".$this->nombreUser."'  ";
        echo $sql;
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
    
    public function setNuevoEstado($nuevoEstado)
    {
        $this->nuevoEstado = $nuevoEstado;
    }
    
    
}
?>
