<?php include('conexion.php'); ?>

<?php
session_start();

if ($_SESSION) {

    $id_usuario = $_SESSION['id'];


    if ($_POST) {
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $bandera = false;
        $objConexion = new conexion();
        $resultado = $objConexion->consultar("SELECT * FROM `users`");
      
        foreach ($resultado as $res) {
      
          if ($correo == $res['correo']) {
      
            $bandera = true;
          }
        }

        if ($bandera == false) {

        if (($correo && $password) != "") {


            $objConexion = new conexion();
            $sql = " UPDATE `users` SET `correo` = '$correo', `password` = '$password' WHERE `users`.`id` = $id_usuario;";
            $objConexion->ejectutar($sql);
            header('location:cierre.php');
        } else {

            echo "<script>alert('Uno de los campos esta vacio')</script>";
        }
    }else{

        echo "<script>alert('Ese nombre de usuario ya existe. Pruebe con otro ')</script>";



    }
}
}else{


    header('location:index.php');



}

?>



<?php include('boot.php'); ?>

<!doctype html>
<html lang="en">

<head>
    <title>Modificacion</title>
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
                <br><br><br>
                <div class="card">
                    <div class="card-header text-center">
                        Modificar Datos
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            Nuevo Correo <input type="text" class="form-control" name="correo"> <br>
                            Nuevo Password <input type="text" class="form-control" name="password"><br>
                            <button type="submit" class="btn btn-primary w-100">Modificar</button>
                        </form>
                    </div>

                </div>

            </div>
            <div class="col-4"></div>

        </div>



</body>

</html>