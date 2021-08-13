<?php 
 session_start();
 if(!isset($_SESSION['rol'])){
   header ('location : login.php');
 }
 else {
   if($_SESSION['rol'] != 3){
     header('location : login.php');
   }
 }

?>

   <?php include('../home.php') ?> 
   
