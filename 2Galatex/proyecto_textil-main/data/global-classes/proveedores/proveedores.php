<?php
include('../../conexion.php');
class proveedores extends conexion
{
	private $codigo;
	private $nombreEmpresa;
	private $numTel;
	private $nombreContact;
	private $apPat;
	private $apMat;
	private $estado;


	public function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}

	public function setNombreEmpresa($nombreEmpresa)
	{
		$this->nombreEmpresa = $nombreEmpresa;
	}

	public function setnumTel($numTel)
	{
		$this->numTel = $numTel;
	}
	public function setNombreContact($nombreContact)
	{
		$this->nombreContact = $nombreContact;
	}
	public function setApPat($apPat)
	{
		$this->apPat = $apPat;
	}
	public function setApMat($apMat)
	{
		$this->apMat = $apMat;
	}

	public function setEstado($estado)
	{
		$this->estado = $estado;
	}

	public function getAllPv()
	{
		//Metodo que realiza la conexion
		$result = $this->conexion();

		//Si se realiza entonces..
		if ($result) {
			$dataset = $this->consulta('SELECT * FROM proveedores');
		} else {
			$dataset = "ERROR";
		}
		return $dataset;
	}

	public function getOnePv($codigoProveedor)
	{
		$result = $this->conexion();
		if ($result) {
			$dataset = $this->consulta("SELECT * FROM proveedores WHERE codigo = '$codigoProveedor'");
		} else {
			$dataset = "ERROR";
		}
		return $dataset;
	}

	public function setProveedor()
{
    $sql = "INSERT INTO proveedores (codigo, nombreEmpresa, numTel, nombreContact, apPat, apMat) 
            VALUES ('" . $this->codigo . "','" . $this->nombreEmpresa . "','" . $this->numTel . "','" . $this->nombreContact . "','" . $this->apPat . "','" . $this->apMat . "')";

    $result = $this->conexion();

    if ($result == true) {
        $newid = $this->insertar($sql);
    } else {
        $newid = 0;
    }
    return $newid;
}


	public function updatePv()
	{
		$sql = "UPDATE proveedores        
                SET nombreContact= '" . $this->nombreContact . "', apPat = '" . $this->apPat . "', apMat = '" . $this->apMat . "'
                WHERE codigo = '" . $this->codigo . "'";

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

	public function eliminarProveedor($codigo)
	{
		$query = "DELETE FROM proveedores WHERE codigo = '" . $codigo . "'";
		$result = $this->delete($query);

		if ($result) {
			echo "Eliminación exitosa";
		} else {
			echo "Error al eliminar el registro";
		}
	}
}
