<?php
session_start();
if(isset($_SESSION['nickname'])){
     $menuUser=true;
     $User="Hello ".$_SESSION['nickname'];
}else{
   $menuUser=false;
    $User='';
}
?>