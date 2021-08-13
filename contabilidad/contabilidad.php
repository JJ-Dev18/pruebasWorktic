<?php
  session_start()
  

?>


<?php include '../home.php' ?>

<form action="reporte.php" method='POST'>

  <input type="text" name='id'>
  <button class='btn btn-success'>Generar Reporte</button>

</form>