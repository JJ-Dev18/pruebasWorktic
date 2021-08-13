<?php    
  session_start();
  include('../db.php');
  if(!isset($_SESSION['rol'])){
   header ('location : ../login.php');
 }
 else {
   if($_SESSION['rol'] == 3){
     header('location : ../login.php');
   }
 }
  if(!isset($_GET['id'])){
    header('location : ../login.php');
  }
  $id = $_GET['id'];
  $db = new DB();
  $query = $db->connect()->prepare('SELECT*FROM articulos WHERE id = ?;');
  $query->execute([$id]);
  $articulo = $query->fetch(PDO::FETCH_OBJ);
  $query = $db->connect()->prepare("SELECT*from tipoarticulos");  
 $query->execute();
 $tipos = $query->fetchAll(PDO::FETCH_OBJ);


?>

<?php include('../includes/header.php') ?> 


<div class="container">
<h1>Edit article</h1>
<form action="edit.php" method="POST">
  
     
  <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="nombre" 
        value="<?php echo $articulo->nombre  ?>" class="form-control" id="nombre"  placeholder="nombre"name="nombre">
      </div>
      <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" class="form-control" 
        value="<?php echo $articulo->precio  ?>" id="precio" name='precio' placeholder="precio">
      </div>
      <div class="form-group">
        <label for="categoria">Categoria</label>
         <select class="form-control form-control-sm" name='categoria' id='categoria' value="<?php echo $articulo->id  ?>">
           <?php  foreach($tipos as $tipo){   ?> 
      <option value="<?php echo $tipo->id ?>"><?php  echo $tipo->tipo;   ?></option>
      <?php } ?>
    </select>
    </select>
      </div>
      <input type="hidden" name='id' value='<?php  echo $articulo->id ?>'>
      <button type="submit" class="btn btn-primary" name='edit'>Edit</button>
    
    </form>
</div>
  
<?php include('../includes/footer.php') ?>
