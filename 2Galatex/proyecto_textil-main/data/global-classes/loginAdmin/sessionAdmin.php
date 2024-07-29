<?php
session_start();
if(isset($_SESSION['nickname'])){
     $menuAdm=true;
     $User= $_SESSION['nickname'].'!';
}else{
   $menuAdm=false;
    $User='';
}
?>


