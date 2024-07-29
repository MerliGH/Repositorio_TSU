<?php
//Catalogo materia prima

include_once('../../conexion.php');
class matPrima extends conexion
{
    //Atributos de clase 
    private $clave;
    private $nombreMaterial;
    private $fechaRecibido;
    private $descripcionmp;
    private $stock;
    private $precio;
    private $tipoMaterial;
    private $proveedor;
    private $estado;

    //Sin constructor, porque hereda de la clase conexion

    //Setters
    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function setNombreMaterial($nombreMaterial)
    {
        $this->nombreMaterial = $nombreMaterial;
    }

    public function setFechaRecibido($fechaRecibido)
    {
        $this->fechaRecibido = $fechaRecibido;
    }

    public function setDescripcion($descripcionmp)
    {
        $this->descripcionmp = $descripcionmp;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function setID($tipoMaterial)
    {
        $this->tipoMaterial = $tipoMaterial;
    }

    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function getEstado()
    {
        return $this->estado;
    }


    //Metodo que hace el SELECT a la tabla materia_prima
    public function getAllMP()
    {
        $result = $this->conexion();

        if ($result) {
            $dataset = $this->consulta('
            SELECT 
            mp.*, tm.num, tm.nombre, tm.color, tm.descripcion as descripcionmp
            FROM materia_prima AS mp
            INNER JOIN tipo_materiales AS tm ON mp.tipoMaterial = tm.num
        ');
        } else {
            $dataset = "ERROR";
        }
        return $dataset;
    }

    //Metodo que hace el INSERT a la tabla materia_prima
    public function insertNewMP()
    {
        $sql = "INSERT INTO materia_prima (clave, nombreMaterial, fechaRecibido, descripcionmp, stock, precio, proveedor)       
        VALUES ('" . $this->clave . "','" . $this->nombreMaterial . "','" . $this->fechaRecibido . "',
                '" . $this->descripcionmp . "'," . $this->stock . ",
                 '" . $this->precio . "', '" . $this->proveedor . "')";
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

    //Metodo que actualiza el stock
    public function updateMatP()
    {


        $sql = "UPDATE materia_prima        
                SET fechaRecibido = '" . $this->fechaRecibido . "', stock = stock + " . $this->stock . ",  precio = '" . $this->precio . "'
                WHERE clave = '" . $this->clave . "'";

        echo "SQL matPrima: $sql\n";
        // Método que realiza la conexión
        $result = $this->conexion();

        // Si se realiza entonces...
        if ($result) {
            $newid = $this->actualizar($sql);
        } else {
            $newid = 0;
        }
        return $newid;
    }
    /////////////////////////////////////////////////////////////////////////////////
    /*
    public function updateEstado()
    {
        $sql = "UPDATE materia_prima AS mp
            INNER JOIN tipo_materiales AS tm ON mp.tipoMaterial = tm.num
            SET mp.estado = '" . $this->getNuevoEstado() . "',
                mp.clave = '" . $this->clave . "'
            WHERE mp.estado = '" . $this->estado . "'
            AND mp.clave = '" . $this->clave . "'  ";

        echo $sql;
        $result = $this->conexion();

        if ($result) {
            $newid = $this->actualizar($sql);
        } else {
            $newid = 0;
        }
        return $newid;
    }


    public function setNuevoEstado($nuevoEstado)
    {
        $this->nuevoEstado = $nuevoEstado;
    }

    public function getNuevoEstado()
    {
        return $this->nuevoEstado;
    }*/

    public function eliminarProducto()
    {
        $sql = "DELETE FROM materia_prima 
             WHERE clave = '" . $this->clave . "' ";

        // Método que realiza la conexión
        $result = $this->conexion();

        // Si la conexión se realiza con éxito, ejecuta la consulta de eliminación
        if ($result) {
            $resultado = $this->delete($sql);
        } else {
            $resultado = false;
        }

        return $resultado;
    }
}
