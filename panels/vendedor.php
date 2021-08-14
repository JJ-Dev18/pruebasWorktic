<?php 
 session_start();
 if(!isset($_SESSION['rol'])){
   header ('location: ../login.php');
 }
 else {
   if($_SESSION['rol'] != 2){
     header ('location: ../login.php');
   }
 }

?>
<?php include('../home.php') ?> 
   
<!-- Panel de vendedor  -->
   <div class="col-sm-12 col-md-3 menu__nav">
     <aside>
       <a href="../articles/articles.php" class="col-sm-12 col-md-4 ">
      <div >
      <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../img/articulos.png" class="card-img rounded-start" alt="imagen panel usuarios">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Articulos</h5>
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
    <a href="#" class="col-md-4 col-sm-12">
   <div ">
      <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../img/inventario.jpg" class="card-img rounded-start" alt="imagen inventario">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Stock</h5>
      </div>
    </div>
  </div>
</div>
    </div>

    </a> 
     </aside>
   </div>
  <!-- <div class="row">
    
    <a href="../articles/stock.php" class="col-sm-12 col-md-4 ">
      <div >
      <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../img/stock.jpg" class="card-img rounded-start" alt="imagen panel usuarios">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Stock</h5>
      </div>
    </div>
  </div>
</div>
    </div>
    </a>
    <a href="vendedor.php" class="col-md-4 col-sm-12">
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

    </a> -->
