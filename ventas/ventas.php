<?php
  session_start();
  include '../db.php';
  $db = new DB();
 
 $query = $db->connect()->prepare("SELECT*from tipoarticulos");  
 $query->execute();
 $tipos = $query->fetchAll(PDO::FETCH_OBJ);


?>


<?php include '../home.php' ?>
<!-- Vista para hacer reportes -->
<div class='content_form_report'>
  <a href="../panels/admin.php" id='atras'><i class="fas fa-long-arrow-alt-left"></i></a>
<form action="#" method='POST' id='form_report'>
  <h3>Ventas <h2>No me dio mas el tiempo</h2></h3>
   
  <button class='btn btn_add mt-4'>Vender</button>

</form>
</div>