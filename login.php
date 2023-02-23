<?php include('conexion.php') ?>
<?php
session_start();

if ($_POST) {


    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $objConexion = new conexion();
    $resultado = $objConexion->consultar("SELECT * FROM `users` WHERE correo = '$correo'");




    foreach ($resultado as $res) {
    }






        if (($correo && $password) != "") {



            if ((!empty($resultado)) && ($correo == $res['correo'] && $password == $res['password'])) {


                echo "<script>alert('Bienvenido')</script>";
                $_SESSION['correo'] = $correo;
                $_SESSION['usuario'] = $res['usuario'];
                $_SESSION['id'] = $res['id'];
                $_SESSION['tipo'] = $res['tipo'];
                $_SESSION['materia'] = $res['materia'];
                $_SESSION['año'] = $res['año'];
                $_SESSION['seccion'] = $res['seccion'];





                header('location:index.php');
            } else {
                echo "<script>alert('No existe')</script>";
            }
        } else {

            echo "<script>alert('Debe llenar todo los campos')</script>";
        }
    }













$objConexion = new conexion();
$resultado = $objConexion->consultar("SELECT * FROM `users`");



?>


<!doctype html>
<html lang="en">

<head>
    <title>Ingresar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="container ">
        <div class="row">
        <a href="index.php" class="btn btn-primary">Inicio</a>

            <div class="col-4">
            </div>
            <div class="col-4">
                <br><br><br>
                <div class="card">
                    <div class="card-header text-center">
                        Loguearse
                    </div>
                    <div class="card-body">

                        <form action="" method="post">

                            Correo <input type="text" class="form-control" name="correo"> <br>
                            Password <input type="text" class="form-control" name="password"><br>
                            <button type="submit" class="btn btn-primary w-100">Loguearse</button>

                        </form>

                    </div>


                </div>
            </div>
            <div class="col-4"></div>

        </div>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>