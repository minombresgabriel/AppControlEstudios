<?php include('conexion.php'); ?>





<?php

session_start();
$id_usuario =  $_SESSION['id'];

$t = time();
$f =  (date("d-m-Y", $t));
if (empty($id_usuario)) {

    header('location:index.php');
} else {

    if ($_POST) {

        $apunte = $_POST['apuntes'];

        if ($apunte != "") {

            $objConexion = new conexion();
            $sql = "INSERT INTO `apuntes` (`id`, `id_usuario`, `apuntes`, `fecha`) VALUES (NULL, '$id_usuario' , '$apunte', '$f');";
            $objConexion->ejectutar($sql);
      
        } else {

            echo "<script>alert('El apunte esta vacio')</script>";
        }
    }

    if ($_GET) {


        $id = $_GET['borrar'];
        $objConexion = new conexion();
        $sql = "DELETE FROM `apuntes` WHERE `apuntes`.`id` =" . $id;
        $objConexion->ejectutar($sql);
    }
}
$objConexion = new conexion();

$resultado = $objConexion->consultar("SELECT * FROM `apuntes` WHERE id_usuario = '$id_usuario'");



?>

<!doctype html>
<html lang="en">

<head>
    <title>Apuntes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<style>
    .cajas {

        box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    }
</style>

<body>


    <div class="container">
        <div class="row">
        <a href="index.php" class="btn btn-primary">Inicio</a>

            <div class="col-6">

                <br><br>

                <div class="card">
                    <div class="card-header text-center">
                        Añade los apuntes
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <textarea class="form-control" name="apuntes" id="" cols="30" rows="10"></textarea>
                            <button type="submit" class="btn btn-primary w-100 mt-2">Añadir</button>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-6">
                <br><br>


                <?php

                foreach ($resultado as $apuntes_finales) { ?>

                    <div class="bg-info row mt-3 cajas d-flex align-items-center ">
                        
                        <div class="col-6 text-break "> <?php echo $apuntes_finales['apuntes'];  ?>
                        </div>
                        <div class="col-2"> <?php echo $f;?>  </div>
                        <div class="col-4"> <a class=" btn btn-danger w-100 " href="?borrar=<?php echo $apuntes_finales['id']; ?>"> Eliminar</a>
                        </div>  <br><br>
                        
                    </div>
                <?php


                }
                ?>


            </div>
        </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>