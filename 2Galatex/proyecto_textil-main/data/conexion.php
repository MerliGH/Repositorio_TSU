<?php

class conexion{
	//Atributos de la clase que conecta la data con el host 
    private $host;
    private $user;
    private $pass;
    private $bd;
    private $conexion;
    private $dataset;

    //Constructor que toma los valores directos de la BD
    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->pass = "";
        $this->bd = "proyectotextil";
    }
    
	//Metodo que realiza la conexion 
    public function conexion()
    {
        //mysqli_connect es una funcion predeterminada que permite la interaccion de DB con PHP
        $this->conexion = @mysqli_connect($this->host,$this->user,$this->pass,$this->bd);
        return $this->conexion;
    }
    
    //Metodo que ejecuta la consulta
    public function consulta($sql)
    {
        $this->dataset = mysqli_query($this->conexion(), $sql);
        if($this->dataset)
        {
            return $this->dataset;
        }
        else
        {
            return 0;
        }
    }

    //Metodo que realiza la insercion
    public function insertar($sql)
    {
        //Si se realiza la conexion, y arroja un valor distinto a cero, significa que se encontraron datos.
        if(mysqli_query($this->conexion,$sql)>0)
        {
            //Regresara el ID de lo que se acaba de insertar
            $newid = $this->conexion->insert_id;
            //echo "insercion ejecutada";
        }
        else
        {
            echo "insercion no realizada";
            $newid=0;
        }
        return $newid;
    }
    
    //Metodo que actualiza
    public function actualizar($sql){
	    $conexion = $this->conexion();
        if(mysqli_query($this->conexion,$sql)>0)
        {
            //echo "update realizado";
            $answer=true;
        }
        else
        {
            echo "insercion no realizada";
            $answer=false;
        }
        return $answer;
    }

    //Metodo que elimina
    public function delete($sql)
    {
        if(mysqli_query($this->conexion,$sql)>0)
        {
            $answer=true;
        }
        else
        {
            $answer=false;
        }
        return $answer;
    }
    
    //Se agrego un metodo para obtener el password, necesario para hacer el SELECT en perfil-index
    public function getPass($nombreUsuario)
    {
        $sql = "SELECT password FROM usuarios WHERE nombreUser = '$nombreUsuario'";
        $resultado = $this->consulta($sql);

        if ($resultado && mysqli_num_rows($resultado) > 0) 
        {
            $fila = mysqli_fetch_assoc($resultado);
            return $fila['password'];  
        } 
        else 
        {
            return null;
        }
    }
}
?>
