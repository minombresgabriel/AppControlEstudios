<?php
include ('boot.php');
include ('conexion.php');


session_start();




?>


<!doctype html>
<html lang="en">

<head>
  <title>Inicio</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->

</head>



<body>

<div class="container">


<div class="row">
<a class="btn btn-primary " href="index.php">Inicio</a>

<div class="col-lg-4 text-center">

</div>

  <div class="col-lg-4 text-center">





  <?php
  if ($_SESSION) {
    ?>
    <?php
      
      if($_SESSION['tipo'] == "maestro" ){?>



      <a class="btn btn-outline-primary  mt-2" href="maestros.php">Registrar Maestros</a>
      <a class="btn btn-outline-primary  mt-2" href="estudiantes.php">Ver estudiantes</a>



      <?php

      }


      ?>
      <br><br><br><br><br><br>

      <a class="btn btn-outline-primary mt-2 w-75 p-4" href="perfil.php">Perfil</a>
      <a class="btn btn-outline-primary mt-2 w-75 p-4" href="materias.php">Evaluaciones</a>

    <a class="btn btn-outline-primary mt-2 w-75 p-4" href="anotacion.php">Crear Apunte</a>

    <a class="btn btn-outline-danger mt-2 w-75 p-4" href="cierre.php">Cerrar sesion</a>

    
  <?php } else { ?>
    <br><br><br><br><br><br><br><br><br>
    <a class="btn btn-outline-primary mt-2 w-75 p-4" href="login.php">Login</a>
   <a class="btn btn-outline-primary mt-2 w-75 p-4" href="registro.php">Registro</a>

  <?php

  }  ?>
  
  <div class="mt-2" style="color:white;">
  <?php

if ($_SESSION) {
  echo $_SESSION['correo']." | ";
  echo  $_SESSION['tipo']." | ";

  if ($_SESSION['tipo'] == 'estudiante') {

    echo  $_SESSION['año'];
    echo  $_SESSION['seccion'];

  }

}







?>
</div>


</div>



<div class="col-lg-4 text-center">
  


</div>
</div>





</div>







</body>

</html>