<?php
  include_once 'db.php';

  session_start();

  if(isset($_GET['cerrar_sesion'])){
     session_unset();
     session_destroy();
  }
   if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: ./panels/admin.php');
            break;

            case 2:
            header('location: ./panels/vendedor.php');
            break;
            case 3:
            header('location: ./panels/contador.php');
            break;

            default:
        }
    }
  if(isset($_POST['username']) ){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $db = new DB();
    $query = $db->connect()->prepare('SELECT*FROM usuarios WHERE username = :username AND password = :password');  
  
    $query->execute(['username' => $username, 'password' => $password]);
    $row = $query->fetch(PDO::FETCH_NUM);
    
    if($row == true){
      $nombre = $row[1];
      $rol = $row[4];
      $_SESSION['rol'] = $rol;
      $_SESSION['nombre'] = $nombre;
      
      
      switch($_SESSION['rol']){
            case 1:
                header('location: ./panels/admin.php');
            break;

            case 2:
            header('location: ./panels/vendedor.php');
            break;
            case 3:
            header('location: ./panels/contador.php');
            break;

            default:
        }
    }
    else {
       $_SESSION['message_success'] = 'Usuario o contrasena incorrectos';
       $_SESSION['message_type'] = 'danger';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login.css">
  <title>Login</title>
</head>
<body>
  
  <div class="container content__login">
    
    <form  action="#" method='POST'>
      <?php if(isset($_SESSION['message_success'])) { ?>
           <div class="alert alert-<?=$_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
             <?=  $_SESSION['message_success']  ;  ?>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
    </button>
  </div>
      <?php unset($_SESSION['message_success'],$_SESSION['message_type']);} ?>
      <img src="./img/logo.png" alt="logo" srcset="" width='200px'>
      
  <div class="form-group mt-2">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control" id="username" " placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  
  <button type="submit" class="btn">Login</button>
</form>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>