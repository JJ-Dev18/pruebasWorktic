<?php
 include_once '../db.php';
  session_start();
  if(isset($_POST['agregar'])){
    $nombre = $_POST['nombre'];
    $username =$_POST['username'];
    $password = $_POST['password'];
    $passFuerte = password_hash($password,PASSWORD_DEFAULT);
    $rol = $_POST['rol'];
    $db = new DB();
    $query = $db->connect()->prepare("INSERT INTO usuarios (nombre,username,password,rol_id) VALUES ('$nombre','$username','$passFuerte',$rol)");  
    $resultado= $query->execute();
    if($resultado != true){
      echo 'error al agregar usuario';
    }
    else {
      $_SESSION['message_success'] = 'Usuario agregado';
      $_SESSION['message_type'] = 'success';
      header('location: ../users/users.php');

    }
    // $query->execute();  
    // echo  '<script language="javascript">
    //                 window.onload = function() {
    //                     alert("agregado");
    //                 }
    //             </script>';
    
  }

?>