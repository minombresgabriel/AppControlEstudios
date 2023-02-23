<?php include('conexion.php'); ?>
<?php include('boot.php'); ?>

<?php
session_start();
 if ($_SESSION) {


}else{

  header('location:index.php');

}


?>


<!doctype html>
<html lang="en">

<head>
  <title>Perfil</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>

<body>

<div class="container">



    <div class="row">
    <a href="index.php" class="btn btn-primary">Inicio</a>

    <div class="col-4">
    </div>

        <div class="col-4">
        <br><br>
        <div class="card">
            <div class="card-header text-center">
                Perfil
            </div>
            <div class="card-body">
                <h4 class="card-title">Correo: <?php echo $_SESSION['correo'] ?></h4>
                <h4 class="card-title">Nombre: <?php echo $_SESSION['usuario'] ?></h4>
                <h4 class="card-title">Año: <?php echo $_SESSION['año'] ?></h4>
                <h4 class="card-title">Seccion: <?php echo $_SESSION['seccion'] ?></h4>

            </div>
           <a href="modificar.php" class="btn btn-info w-100">Modificar</a>

     
        </div>
        <br><br>
 
        

        </div>



        <div class="col-4">
            
        
        
        

        </div>
        <div class="col-4"></div>

    </div>


</div>


</body>

</html>