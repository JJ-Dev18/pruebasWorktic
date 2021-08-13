<?php    
  session_start();
  include('../db.php');
  if(!isset($_SESSION['rol'])){
   header ('location : ../login.php');
 }
 else {
   if($_SESSION['rol'] != 1){
     header('location : ../login.php');
   }
 }
  if(!isset($_GET['id'])){
    header('location : ../login.php');
  }
  $id = $_GET['id'];
  $db = new DB();
  $query = $db->connect()->prepare('SELECT*FROM usuarios WHERE id = ?;');
  $query->execute([$id]);
  $persona = $query->fetch(PDO::FETCH_OBJ);


?>

<?php include('../includes/header.php') ?> 


<div class="container">
<h1>Edit users </h1>
<form action="../users/edit.php" method="POST">
  
     
  <div class="form-group">
        <label for="exampleInputEmail1">Nombre</label>
        <input type="nombre" 
        value="<?php echo $persona->nombre  ?>" class="form-control" id="nombre"  placeholder="nombre"name="nombre">
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" 
        value="<?php echo $persona->username  ?>" id="username" name='username' placeholder="username">
      </div>
      <div class="form-group">
        <label for="paswword">Password</label>
        <input type="password" name='password' 
        value="<?php echo $persona->password  ?>" class="form-control" id="password" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="rol">Rol</label>
         <select class="form-control form-control-sm" name='rol' value="<?php echo $persona->rol_id  ?>" id='rol'>
      <option value="1">Administrador</option>
      <option value="2" >Vendedor</option>
      <option value="3">contador</option>
    </select>
      </div>
      <input type="hidden" name='id' value='<?php  echo $persona->id ?>'>
      <button type="submit" class="btn btn-primary" name='edit'>Edit</button>
    
    </form>
</div>
  
<?php include('../includes/footer.php') ?>
