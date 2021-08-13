
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <!--Fontawesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- Css -->
  <link rel="stylesheet" href="../css/style.css">
  <title>Panaderia Do;a Juana</title>
</head>
<body>

<nav class="navbar navbar-light ">
  <a class="navbar-brand" href="#">
    <img src="../img/logo.png" width="50" height="50" alt="logo">
    <?php echo $_SESSION['nombre']; ?>
  </a>
  <a class='cerrarsesion' href="../loggout.php">Cerrar sesion</a>
</nav>