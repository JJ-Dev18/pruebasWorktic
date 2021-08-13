<?php
 include_once '../db.php';
  session_start();
  if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $username =$_POST['username'];
    $password = md5($_POST['password']);
    $rol = $_POST['rol'];
    $db = new DB();
    $query = $db->connect()->prepare("UPDATE usuarios SET nombre = ?, username = ?, password = ? , rol_id = ? WHERE id = ?;");  
    $resultado= $query->execute([$nombre,$username,$password,$rol,$id]);
    if($resultado != true){
      echo 'error al editar usuario';
     
    }
    else {
      $_SESSION['message_success'] = 'Usuario modificado';
      $_SESSION['message_type'] = 'warning';
      
      header('location: users.php');
    }
    // $query->execute();  
    // echo  '<script language="javascript">
    //                 window.onload = function() {
    //                     alert("agregado");
    //                 }
    //             </script>';
    
  }

?>