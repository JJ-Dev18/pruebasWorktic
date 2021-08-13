<?php 
 include('../db.php');
 session_start();
 if(isset($_GET['id'])){
   $id = $_GET['id'];
   $db = new DB();
   $query = $db->connect()->prepare("DELETE FROM usuarios Where id=$id");
   $result = $query->execute();
   $_SESSION['message_success'] = 'Usuario Eliminado';
   $_SESSION['message_type'] = 'danger';
   header('location: ./users.php');
 
 }

?>