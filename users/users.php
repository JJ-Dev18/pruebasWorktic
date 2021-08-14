<?php 
 include('../db.php');
 session_start();
 if(!isset($_SESSION['rol'])){
   header ('location : ./login.php');
 }
 else {
   if($_SESSION['rol'] != 1){
     header('location : ./login.php');
   }
 }

 $db = new DB();
 $query = $db->connect()->prepare("SELECT usuarios.nombre,usuarios.id,usuarios.username,usuarios.password,roles.nombre_rol FROM usuarios INNER JOIN roles on usuarios.rol_id=roles.id");  
 $query->execute();
 $row = $query->fetchAll(PDO::FETCH_OBJ);
 $query = $db->connect()->prepare("SELECT*from roles");  
 $query->execute();
 $roles = $query->fetchAll(PDO::FETCH_OBJ);
 
?>

<?php include('../home.php')?> 
<div class="container mt-4">
<h1><a href="../panels/admin.php"><i class="fas fa-long-arrow-alt-left"></i></a>    Usuarios </h1>
  <div class="row">
    
      <div class="col-md-4">
  <form action="../users/addUser.php" method="POST">
  
      <div class="form-group" >
          <?php if(isset($_SESSION['message_success'])) { ?>
           <div class="alert alert-<?=$_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
             <?=  $_SESSION['message_success']  ;  ?>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
    </button>
  </div>
      <?php unset($_SESSION['message_success'],$_SESSION['message_type']);} ?>
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
        <label for="rol">Rol</label>
         <select class="form-control form-control-sm" name='rol' id='rol'>
           <?php  foreach($roles as $rol){   ?> 
      <option value="<?php echo $rol->id ?>"><?php  echo $rol->nombre_rol;   ?></option>
      <?php } ?>
    </select>
      
      </div>
      <button type="submit" class="btn btn_add" name='agregar'>Add</button>
    
    </form>
      </div>
    
     <div class="col-sm-12 col-md-8 table-scroll">
                              <table class="table" >
                                  <thead class="table-success table-striped" >
                                      <tr>
                                          <th>Nombre</th>
                                          <th>Username</th>
                                          <th>Password</th>
                                          <th>Rol</th>
                                          <th></th>
                                          <th></th>
                                      </tr>
                                  </thead>
  
                                  <tbody>
                                    
                                          <?php
                                             foreach ($row as $usuario) {      
                                          ?> 
                                              <tr>
                                                  <th><?php  echo $usuario->nombre?></th>
                                                  <th><?php echo $usuario->username?></th>
                                                  <th><?php  echo $usuario->password?></th>
                                                  <th><?php echo $usuario->nombre_rol?></th>    
                                                  <th><a href="editUser.php?id=<?php echo $usuario->id ?>" class="btn btn-info">Editar</a></th>
                                                  <th><a href="deleteUser.php?id=<?php echo $usuario->id ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                              </tr>
                                          <?php 
                                              }
                                          ?>
                                  </tbody>
                              </table>
                          </div>
                        
              
  </div>
</div>