<?php 
//Catalogo proveedores

include_once ('../../conexion.php');
class pagos extends conexion
{
    //Atributos de clase 
    private $num;
    private $fecha;
    private $cantPagada;
    private $concepto;
    private $referenciaBancaria;
    private $saldo;
    private $pedido;

    


    
    public function getAllpag()
    {
        //Metodo que realiza la conexion
        $result = $this->conexion();

        //Si se realiza entonces..
        if ($result)
        {
            $dataset = $this->consulta('SELECT pag.*, ped.*, cli.* 
            FROM pagos as pag
            inner join pedidos as ped on pag.pedido = ped.num
            inner join clientes as cli on ped.cliente = cli.num
');
        }
        else
        {
			$dataset = "ERROR";
		}
		return $dataset;
    }

        
    }




?>