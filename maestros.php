<?php include('conexion.php'); ?>
<?php include('boot.php'); ?>
<?php

session_start();

if ($_POST) {



    $usuario = $_POST['usuario'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $cedula = $_POST['cedula'];
    $materia = $_POST['materia'];


  
    $bandera = false;
    $objConexion = new conexion();
    $resultado = $objConexion->consultar("SELECT * FROM `users`");
  
    foreach ($resultado as $res) {
  
      if (($correo == $res['correo']) || ($cedula == $res['cedula']) ) {
  
        $bandera = true;
      }
    }
  
  
    if ($bandera == false) {
  
  
      if (($usuario && $apellido  && $correo && $password  && $cedula && $materia) != "") {
  
        $objConexion = new conexion();
        $sql = "INSERT INTO `users` (`id`, `usuario`, `apellido`, `año`, `seccion`, `correo`, `password`, `cedula` , `materia`, `tipo`) VALUES (NULL, '$usuario', '$apellido', '-', '-', '$correo', '$password', '$cedula', '$materia', 'maestro');";
  
        $objConexion->ejectutar($sql);
        header('location:login.php');
      } else {
  
        echo "<script>alert('Uno de los campos esta vacio')</script>";
      }
    } else {
  
      echo "<script>alert('Ese correo de usuario ya existe. Pruebe con otro ')</script>";
    }
  }




?>


<!doctype html>
<html lang="en">

<head>
    <title>Mestros</title>

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
                <br><br><br>
                <div class="card">
                    <div class="card-header text-center">
                        Registrar Maestro nuevo
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            Nombre: <input type="text" class="form-control" name="usuario"> <br>
                            Apellido: <input type="text" class="form-control" name="apellido"><br>
                            Correo: <input type="text" class="form-control" name="correo"><br>
                            Password: <input type="password" class="form-control" name="password"><br>
                            Cedula: <input type="text" class="form-control" name="cedula"><br>
                            Materia: <input type="text" class="form-control" name="materia"><br>




                            <button type="submit" class="btn btn-primary w-100">Registrar</button>
                        </form>
                    </div>

                </div>

            </div>
            <div class="col-4"></div>

        </div>

    </div>

</body>

</html>