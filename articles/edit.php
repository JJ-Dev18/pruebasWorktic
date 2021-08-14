<?php
 include_once '../db.php';
  session_start();
  if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio =$_POST['precio'];
    $categoria = $_POST['categoria'];
    $db = new DB();
    $query = $db->connect()->prepare("UPDATE articulos  SET nombre = ?, precio = ? , categoria = ? WHERE id = ?;");  
    $resultado= $query->execute([$nombre,$precio,$categoria,$id]);
    if($resultado != true){
      echo 'error al editar articulo';
     
    }
    else {
      $_SESSION['message_success'] = 'Articulo modificado';
      $_SESSION['message_type'] = 'warning';
      
      header('location: articles.php');
    }
    // $query->execute();  
    // echo  '<script language="javascript">
    //                 window.onload = function() {
    //                     alert("agregado");
    //                 }
    //             </script>';
    
  }

?>