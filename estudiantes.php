<?php include('boot.php'); ?>
<?php include('conexion.php'); ?>

<?php

session_start();



if ($_SESSION['tipo'] == 'maestro') {
    # code...
    
if ($_POST) {

    $año = $_POST['año'];
    $seccion = $_POST['seccion'];

    $objConexion = new conexion();
    $resultado = $objConexion->consultar("SELECT * FROM `users` WHERE tipo='estudiante' AND año = '$año' AND seccion = '$seccion'");
}


}else{

    header('location:index.php');

}




?>

<!doctype html>
<html lang="en">

<head>
    <title>Estudiantes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>

<body>

    <div class="container">
        <div class="row">

        <a class="btn btn-primary" href="index.php">Inicio</a>

        
            <div class="col-6 mt-2">

                <div class="card">
                    <div class="card-header">
                    <h2>Buscar alumnos</h2>

                    </div>
                    <div class="card-body">
                    <form action="" method="post">
              Año:  <select class="form-select" name="año" id="">
                    <option value="1">1er</option>
                    <option value="2">2do</option>
                    <option value="3">3ero</option>
                    <option value="4">4to</option>
                    <option value="5">5to</option>


                </select>
               Seccion: <select class="form-select mt-2" name="seccion" id="">
                    <option value="a">A</option>
                    <option value="b">B</option>



                </select>



                    </div>
                    <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-primary"> Buscar</button>
                    </div>
                </div>
                </form>

            </div>

            <div class="col-6 fs-5" style="color:white;">

        <?php
        if ($_POST) {



            foreach ($resultado as $res) {

                echo $res['usuario'] . " ";
                echo $res['apellido'] . " ";
                echo $res['año'];
                echo $res['seccion'] . "<br> ";



        ?>



        <?php }
        } ?>
        </div>
        </div>

    </div>
</body>

</html>