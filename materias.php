<?php include('conexion.php'); ?>
<?php include('boot.php'); ?>

<?php
session_start();




$id_usuario =  $_SESSION['id'];
$materia = $_SESSION['materia'];
$usuario = $_SESSION['usuario'];
$año = $_SESSION['año'];
$seccionEstudiante = $_SESSION['seccion'];
$correo = $_SESSION['correo'];

if ($_SESSION) {






    if ($_POST) {

        $evaluacion = $_POST['evaluacion'];
        $estimacion = $_POST['estimacion'];
        $año = $_POST['año'];
        $seccion = strtolower($_POST['seccion']);
        $fecha = $_POST['fecha'];
        $newDate = date("d/m/Y", strtotime($fecha));






        if (($materia && $evaluacion && $fecha) != "") {

            $objConexion = new conexion();
            $sql = "INSERT INTO `evaluaciones` (`id`, `id_usuario`, `usuario`,`materia`, `evaluacion`, `estimacion`, `año`, `seccion`, `fecha`) VALUES (NULL, '$id_usuario', '$usuario', '$materia', '$evaluacion', '$estimacion', '$año', '$seccion', '$newDate');";

            $objConexion->ejectutar($sql);
            echo "<script>alert('Se ha subido una evaluacion')</script>";
        } else {

            echo "<script>alert('Uno de los campos esta vacio')</script>";
        }
    }
} else {

    header('location:index.php');
}

if ($_GET) {


    $id = $_GET['borrar'];
    $objConexion = new conexion();
    $sql = "DELETE FROM `evaluaciones` WHERE `evaluaciones`.`id` =" . $id;
    $objConexion->ejectutar($sql);
}

$objConexion = new conexion();




//$resultado = $objConexion->consultar("SELECT * FROM `evaluaciones` WHERE id_usuario = '$id_usuario' ORDER BY `evaluaciones`.`fecha` ASC");
$resultado = $objConexion->consultar("SELECT * FROM `evaluaciones` WHERE (año = '$año' AND seccion = '$seccionEstudiante') 
OR (id_usuario = '$id_usuario')
ORDER BY `evaluaciones`.`fecha` ASC");


?>


<!doctype html>
<html lang="en">

<head>
    <title>Evaluaciones</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>


<body>

    <div class="container">
        <div class="row">
            <a class="btn btn-primary" href="index.php">Inicio</a>
            <div class="col-4">
            </div>
            <div class="col-4 ">
                <br><br>

                <?php
                if ($_SESSION['tipo'] == 'maestro') {


                ?>
                    <div class="card">
                        <div class="card-header text-center">
                            Evaluacion
                        </div>
                        <div class="card-body">
                            <form action="" method="post" class="">

                                Nombre de la materia: <?php echo $materia; ?> <br><br>
                                Evaluacion: <input type="text" class="form-control" name="evaluacion">
                                Valor de nota: <input type="number" min=1 max=20 class="form-control" name="estimacion">


                               Año: <select class="form-select mt-2" name="año" id="">
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


                                Fecha de evaluacion: <input type="date" class="form-control" name="fecha">



                                <button class="btn btn-primary mt-2 w-100" type="submit">Enviar</button>

                            </form>
                        </div>


                    </div>
                <?php }
                ?>


            </div>
        </div>
        <div class="row ">
            <?php
            foreach ($resultado as $res) {

            ?>
                <div class="col-lg-3">
                    <br><br>
                    <div class="card">
                        <div class="card-header">


                            <b class=""> <?php echo $res['materia'] ?></b>

                            <b class=""> <?php echo $res['fecha'] ?></b>
                            <b class="text-danger"> <?php echo $res['año'] ?></b>
                            <b class="text-danger"> <?php echo $res['seccion'] ?></b>


                        </div>
                        <div class="card-body">

                            <?php echo $res['evaluacion'] ?>



                        </div>
                        <div class="">


                            <?php
                            if ($_SESSION['tipo'] == 'maestro') {
                            ?>
                                <a href="?borrar=<?php echo $res['id']; ?>" class="btn btn-danger w-100 ">X</a>

                            <?php
                            } ?>
                        </div>



                    </div>





                </div>


            <?php

            }


            ?>
        </div>

    </div>

</body>

</html>