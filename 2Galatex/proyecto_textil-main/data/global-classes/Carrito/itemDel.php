<?php //itemDel.php
include('../loginu/Session.php');
if(!empty($_SESSION['shopCart']) && $menuUser){
    $shopCart = $_SESSION['shopCart'];
    if (count($shopCart) == 1){
        unset($_SESSION['shopCart']);
        header('Location: ../../../index.php');
    }
    else{
        $temp = array();
        foreach($shopCart as $element){
            if ($element['codigo'] != $_GET['cod']){
                array_push($temp, $element);
            }
        }
        $_SESSION['shopCart'] = $temp;
        header('Location: viewCart.php');
    }
} 
else{
    header('Location: ../../../index.php');
} 

?>

