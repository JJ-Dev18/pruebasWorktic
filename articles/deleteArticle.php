<?php 
 include('../db.php');
 session_start();
 if(isset($_GET['id'])){
   $id = $_GET['id'];
   $db = new DB();
   $query = $db->connect()->prepare("DELETE FROM articulos Where id=$id");
   $result = $query->execute();
   $_SESSION['message_success'] = 'Articulo Eliminado';
   $_SESSION['message_type'] = 'danger';
   header('location: stock.php');
 
 }

?>