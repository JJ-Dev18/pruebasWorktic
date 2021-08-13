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
      echo 'El usuario o contreasena son incorrectos';
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
  
  <title>Login</title>
</head>
<body>
  
  <div class="container">
    <h1>Login</h1>
    <form  action="#" method='POST'>
      
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="username" " placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
  </div>
</body>
</html>