<?php 
//Catalogo vestidos

include_once ('../../conexion.php');
class vestidos extends conexion
{
    //Atributos de clase 
    private $codigo;
    private $nombre;
    private $talla;
    private $descripcion;
    private $precioVenta;
    private $fabrica;
    private $loteVestido;


    //Sin constructor, porque hereda de la clase conexion

    //Metodos
    public function getAllV()
    {
        //Metodo que realiza la conexion
        $result = $this->conexion();

        //Si se realiza entonces..
        if ($result)
        {
            $dataset = $this->consulta('SELECT
           lot.num, lot.fechaProduccion, lot.costoProduccion, lot.cantDefectuosos, lot.cantVestidos, lot.cantTotalGen, lot.cod_vestido, lot.estado,
           pl.num, pl.cantPaquete, pl.loteVestido,
           pl.cantVestidos as CantidadVestidosPaquete,
           mp.*,mv.*,
           v.*, v.descripcion AS descV, v.codigo AS codigov, fab.codigo, fab.nombre as nombreFabrica, fab.colonia, fab.calle, fab.numCalle, fab.numTel, fab.ciudad
           FROM paquete_x_lote as pl
           inner join lotes_vestidos as lot on pl.loteVestido = lot.num
           INNER JOIN vestidos AS v ON v.codigo = lot.cod_vestido
           INNER JOIN fabricas AS fab ON fab.codigo = v.fabrica
           INNER JOIN mat_vestidos AS mv ON mv.vestido = v.codigo
           INNER JOIN materia_prima AS mp ON mp.clave = mv.mat_prima
            ');
        }
        else
        {
			$dataset = "ERROR";
		}
		return $dataset;
    }

        
        }

