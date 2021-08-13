<?php
 include_once '../db.php';
  session_start();
  if(isset($_POST['agregar'])){
    $nombre = $_POST['nombre'];
    $precio =$_POST['precio'];
    $categoria = $_POST['categoria'];
   
    $db = new DB();
    $query = $db->connect()->prepare("INSERT INTO articulos (nombre,precio,categoria) VALUES ('$nombre',$precio,$categoria)");  
    $resultado= $query->execute();
    if($resultado != true){
      echo 'error al agregar producto';
    }
    else {
      $_SESSION['message_success'] = 'Producto agregado';
      $_SESSION['message_type'] = 'success';


    }
    // $query->execute();  
    // echo  '<script language="javascript">
    //                 window.onload = function() {
    //                     alert("agregado");
    //                 }
    //             </script>';
    header('location: stock.php');
  }

?>