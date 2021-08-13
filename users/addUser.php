<?php
 include_once '../db.php';
  session_start();
  if(isset($_POST['agregar'])){
    $nombre = $_POST['nombre'];
    $username =$_POST['username'];
    $password = md5($_POST['password']);
    $rol = $_POST['rol'];
    echo $nombre,$username,$password,$rol;
    $db = new DB();
    $query = $db->connect()->prepare("INSERT INTO usuarios (nombre,username,password,rol_id) VALUES ('$nombre','$username','$password',$rol)");  
    $query->execute();
    if(!$query){
      echo 'error al agregar usuario';
    }
    else {
      $_SESSION['message'] = 'Usuario agregado';
      $_SESSION['message_type'] = 'success';

      echo $_SESSION['message'];
    }
    // $query->execute();  
    // echo  '<script language="javascript">
    //                 window.onload = function() {
    //                     alert("agregado");
    //                 }
    //             </script>';
    header('location: ../panels/admin.php');
  }

?>