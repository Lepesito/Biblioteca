<?php
session_start(); 


if(isset($_SESSION['tipo'])){
    
    unset($_SESSION['tipo']);
    
    header("Location: iniciosesion.php");
    exit(); 
}
?>