<?php
include ('../../conexion.php');
class Admin extends conexion
{
    private $num;
    private $nombreUser;
    private $password;
    private $category;
    private $cliente;


    public function setNombreUser($nombreUser){
        $this->nombreUser = $nombreUser;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setCategory($category){
        $this->category = $category;
    }

    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    public function getAdmin(){
        $sql = "SELECT * FROM usuarios WHERE nombreUser ='$this->nombreUser'
        AND password ='$this->password' AND categoria='A' ";
        $resultado = $this->conexion();
        if($resultado){
            $dataset = $this->consulta($sql);
            //echo "todo bien";
        }
        else{
            //echo "todo mal";
            $dataset ="Wrong";
        }
        return $dataset;
    }

    public function setUsuario(){
        $sql = "insert into usuarios (nombreUser,password,categoria,cliente)
        values ('".$this->nombreUser."','".$this->password."','A',".$this->cliente.")";
        $resultado = $this->conexion();
        if ($resultado) {
            $newid = $this->insertar($sql);
        } else {
            $newid = 0;
        }
        return $newid;
    }

    /*public function loginUser($nombreUser, $password)
    {
        $resultado = $this->conexion();
        $consulta = "select password from usuarios where nombreUser = '$nombreUser'";
        if ($resultado) {
            $sql = $this->consulta($consulta);
            $fila = mysqli_fetch_assoc($sql);
            $same = password_verify($passw, $fila['txtpass']);
            echo $same;
            if ($same == true) {
                $sqll = "select num, nombreUser, password, cliente from usuarios where
                nombreUser = '$nombreUser'";
                $dataset = $this->consulta($sqll);
                return $dataset;
            }
        } else {
            $dataset = "vacio";
        }
    }*/


}

?>