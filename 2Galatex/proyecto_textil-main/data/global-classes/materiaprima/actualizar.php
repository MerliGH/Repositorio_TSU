<?php
    include_once('./matPrima.php'); 

    $matPrima = new matPrima();

    $clavesProductos = $matPrima->getAllMP();

    if ($clavesProductos !== "ERROR") 
    {
        $clavesArray = array();
        $clavesArray2 = array();
        $clavesArray3 = array();

        while ($fila = mysqli_fetch_assoc($clavesProductos)) 
        {
            $clavesArray[] = $fila['clave'];
            $clavesArray2[] = $fila['proveedor'];
            $clavesArray3[] = $fila['color'];
        }
    } 
    else 
    {
        $clavesArray = array(); 
        $clavesArray2 = array(); 
        $clavesArray3 = array(); 
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <div class="botag"><a type='button' value='Agregar' href='#'>Vaciar</a></div>

    <title>MATERIA PRIMA</title>
</head>

<body>
<header id="menurapido"></header>
<div class="area"></div>
<nav class="main-menu">
<ul>
<li>
                <a href="../index.php">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                           INICIO
                        </span>
                    </a>
                  
                </li>

                <li class="has-subnav">
                    <a href="../clientes/index-clientes.php">
                        <i class="fa fa-user fa-2x"></i>
                        <span class="nav-text">
                            CLIENTES
                        </span>
                    </a>
                    
                </li>

                <li class="has-subnav">
                    <a href="../pedidos/index-pedidos.php">
                        <i class="fa fa-archive fa-2x"></i>
                        <span class="nav-text">
                            PEDIDOS
                        </span>
                    </a>
                    
                </li>

                <li class="has-subnav">
                    <a href="../pagos/index-pagos.php">
                        <i class="fa fa-credit-card fa-2x"></i>
                        <span class="nav-text">
                            PAGOS
                        </span>
                    </a>
                    
                </li>

                <li class="has-subnav">
                   <a href="../prov/index-prov.php">
                       <i class="fa fa-external-link-square fa-2x"></i>
                        <span class="nav-text">
                            PROVEEDORES
                        </span>
                    </a>
                </li>
                
                <li class="has-subnav">
                   <a href="../prov/index-matp.php">
                        <i class="fa fa-briefcase fa-2x"></i>
                        <span class="nav-text">
                            MATERIA PRIMA
                        </span>
                    </a>
                </li>

                <li class="has-subnav">
                   <a href="../lotes/index-lotes.php">
                        <i class="fa fa-book fa-2x"></i>
                        <span class="nav-text">
                            LOTES DE VESTIDOS
                        </span>
                    </a>
                </li>

            </ul>


            <ul class="logout">
                <li>
                   <a href="../../../index-principal.php">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            SALIR
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
    
        <Main>
        <div id="main-container">
            <h3>Actualizar materia prima</h3>
            <form method="post" action="updateMP.php">
                <table>
                    <tr>
                        <th colspan="2">FAVOR DE RELLENAR LOS CAMPOS SIGUIENTES...</th>
                    </tr>
                    
                    
                    <td>Clave del producto:</td>
                    <td>
                        <!-- Lista desplegable con las claves de productos -->
                        <select name="txtclave">
                            <?php
                            foreach ($clavesArray as $clave) 
                            {
                                echo "<option value='$clave'>$clave</option>";
                            }
                            ?>
                        </select>
                    </td>

                    <tr>
                        <td>Fecha de recibido (Año/Mes/Día):</td>
                        <td><input type="date" name="txtfecha" min="2023-11-16" max="2053-11-16"></td>
                    </tr>

                    
                    <tr>
                        <td>Stock:</td>
                        <td><input type="number" name="txtstock"></td>
                    </tr>
                    <tr>
                        <td>Precio:</td>
                        <td><input type="number" name="txtprecio"></td>
                    </tr>
                    <tr>
                        <td>Proveedor:</td>
                        <td>
                        <select name="txtproveedor">
                        <?php
                            foreach ($clavesArray2 as $clave) 
                            {
                                echo "<option value='$clave'>$clave</option>";
                            }
                        ?>
                        </td>
                        </select>
                    </tr>

                    


                    <p><button type="submit">Enviar formulario</button></p>

                </table>
        </div>
    </Main>

    <footer>
        <section>
            <p class='foot'>&copy;2023 Derechos reservados</p>
            <p class='foot'>Privacidad</p>
            <p class='foot'>Términos y condiciones</p>
        </section>
    </footer>
</body>

</html>