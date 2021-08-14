<?php 
 include('../db.php');
 session_start();
 if(!isset($_SESSION['rol'])){
   header ('location : ../login.php');
 }
 else {
   if($_SESSION['rol'] == 3 ){
     header('location : ../login.php');
   }
 }
 $db = new DB();
 $query = $db->connect()->prepare("SELECT articulos.id,articulos.nombre,articulos.precio,tipoarticulos.tipo from articulos INNER JOIN tipoarticulos on articulos.categoria = tipoarticulos.id");  
 $query->execute();
 $row = $query->fetchAll(PDO::FETCH_OBJ);
 $query = $db->connect()->prepare("SELECT*from tipoarticulos");  
 $query->execute();
 $tipos = $query->fetchAll(PDO::FETCH_OBJ);


?>

<?php include('../home.php')?> 
<div class="container mt-4">
<h1><a href="../panels/vendedor.php"><i class="fas fa-long-arrow-alt-left"></i></a> Articles </h1>
  <div class="row">
    
      <div class="col-md-4">
  <form action="addArticle.php" method="POST">
  
      <div class="form-group" >
          <?php if(isset($_SESSION['message_success'])) { ?>
           <div class="alert alert-<?=$_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
             <?=  $_SESSION['message_success']  ;  ?>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
    </button>
  </div>
      <?php unset($_SESSION['message_success'],$_SESSION['message_type']);} ?>
        <label for="nombre">Nombre</label>
        <input type="nombre" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="nombre" name="nombre">
      </div>
      <div class="form-group">
        <label for="precio">precio</label>
        <input type="text" class="form-control" id="precio" name='precio' placeholder="precio">
      </div>
      <div class="form-group">
        <label for="categoria">Categoria</label>
     <select class="form-control form-control-sm" name='categoria'id='categoria'>
           <?php  foreach($tipos as $tipo){   ?> 
      <option value="<?php echo $tipo->id ?>"><?php  echo $tipo->tipo;   ?></option>
      <?php } ?>
    </select>
      </div>
      <button type="submit" class="btn btn_add" name='agregar'>Add</button>
    
    </form>
      </div>
    
     <div class="col-md-8 table-scroll">
                              <table class="table" >
                                  <thead class="table-success table-striped" >
                                      <tr>
                                          <th>Nombre</th>
                                          <th>Precio</th>
                                          <th>Categoria</th>
                                          <th></th>
                                          <th></th>
                                      </tr>
                                  </thead>
  
                                  <tbody>
                                    
                                          <?php
                                             foreach ($row as $articulo) {      
                                          ?> 
                                              <tr>
                                                  <th><?php  echo $articulo->nombre?></th>
                                                  <th><?php echo $articulo->precio?></th>
                                                  <th><?php  echo $articulo->tipo?></th>   
                                                  <th><a href="editArticle.php?id=<?php echo $articulo->id ?>" class="btn btn-info">Editar</a></th>
                                                  <th><a href="deleteArticle.php?id=<?php echo $articulo->id ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                              </tr>
                                          <?php 
                                              }
                                          ?>
                                  </tbody>
                              </table>
                          </div>
                        
              
  </div>
</div>