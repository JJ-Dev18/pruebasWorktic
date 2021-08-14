<?php 
 session_start();
 if(!isset($_SESSION['rol'])){
   header ('location: ../login.php');
 }
 else {
   if($_SESSION['rol'] != 3 ){
     header ('location: ../login.php');
   }
 }

?>
<!-- Panel de contador  -->
   <?php include('../home.php') ?> 
   
<div class="col-sm-12 col-md-3 menu__nav">
     <aside class="col-sm-12">
       <a href="../contabilidad/contabilidad.php" class="col-sm-12 col-md-4">
      <div >
      <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../img/contabilidad.png" class="card-img rounded-start" alt="imagen panel usuarios">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Contabilidad</h5>
      </div>
    </div>
  </div>
</div>
    </div>
    </a>
    <a href="../ventas/ventas.php" class="col-md-4 col-sm-12">
   <div ">
      <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../img/ventas2.png" class="card-img rounded-start" alt="imagen inventario">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Ventas</h5>
      </div>
    </div>
  </div>
</div>
    </div>

    </a> 
     </aside>
   </div>