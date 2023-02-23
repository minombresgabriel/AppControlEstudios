<?php include('conexion.php') ?>

<?php





if ($_POST) {



  $usuario = $_POST['usuario'];
  $apellido = $_POST['apellido'];
  $año = $_POST['año'];
  $seccion = $_POST['seccion'];
  $correo = $_POST['correo'];
  $password = $_POST['password'];
  $cedula = $_POST['cedula'];

  $bandera = false;
  $objConexion = new conexion();
  $resultado = $objConexion->consultar("SELECT * FROM `users`");

  foreach ($resultado as $res) {

    if ($correo == $res['correo']) {

      $bandera = true;
    }
  }


  if ($bandera == false) {


    if (($usuario && $apellido  && $año && $seccion && $correo && $password  && $cedula) != "") {

      $objConexion = new conexion();
      $sql = "INSERT INTO `users` (`id`, `usuario`, `apellido`, `año`, `seccion`, `correo`, `password`, `cedula` , `materia`, `tipo`) VALUES (NULL, '$usuario', '$apellido', '$año', '$seccion', '$correo', '$password', '$cedula', '-', 'estudiante');";

      $objConexion->ejectutar($sql);
      header('location:login.php');
    } else {

      echo "<script>alert('Uno de los campos esta vacio')</script>";
    }
  } else {

    echo "<script>alert('Ese nombre de usuario ya existe. Pruebe con otro ')</script>";
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Registro</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

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
            Registrar Alumno
          </div>
          <div class="card-body">
            <form action="" method="post">
              Usuario: <input type="text" class="form-control" name="usuario"> <br>
              Apellido: <input type="text" class="form-control" name="apellido"><br>
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

              Correo: <input type="text" class="form-control" name="correo"> <br>
              Password: <input type="text" class="form-control" name="password"> <br>
              Cedula: <input type="text" class="form-control" name="cedula"> <br>


  
              <button type="submit" class="btn btn-primary w-100">Registrar</button>
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