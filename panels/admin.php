<?php 
 session_start();
 if(!isset($_SESSION['rol'])){
   header ('location : ./login.php');
 }
 else {
   if($_SESSION['rol'] != 1){
     header('location : ./login.php');
   }
 }
 
  
?>

<?php include('../home.php')?> 
<div class="container">
    
  <form action="../users/addUser.php" method="POST">

    <div class="form-group" >
        <?php if(isset($_SESSION['message'])) { ?>
         <div class="alert alert-<?=$_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
           <?=  $_SESSION['message']  ;  ?>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
  </button>
</div>
    <?php } ?>
      <label for="exampleInputEmail1">Nombre</label>
      <input type="nombre" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="nombre"name="nombre">
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name='username' placeholder="username">
    </div>
    <div class="form-group">
      <label for="paswword">Password</label>
      <input type="password" name='password' class="form-control" id="password" placeholder="Password">
    </div>
    <div class="form-group">
       <select class="form-control form-control-sm" name='rol'>
    <option value="1">Administrador</option>
    <option value="2">Vendedor</option>
    <option value="3">contador</option>
  </select>
    </div>
    <button type="submit" class="btn btn-primary" name='agregar'>Agregar</button>
  
  </form>
  
</div>
   