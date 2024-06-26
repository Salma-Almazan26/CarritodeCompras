<?php
//Utilizando interrogantes para los valores 
if(isset($_POST['submit'])){
    try{
        $conexion=new PDO('mysql:host=localhost:3306;dbname=tienda','root','');
        $enunciado=$conexion->prepare("SELECT * FROM usuarios");
        $enunciado->setFetchMode(PDO::FETCH_ASSOC);
        $enunciado->execute();

        while($row= $enunciado->fetch()){
            $nombre=$row["nombre"];
            $password=$row["password"];
        }
        $usuario=$_POST['usuario'];
        $numero=$_POST['password'];



        if($nombre==$usuario && $password==$numero){

            session_start();

            $_SESSION['nombre']=$nombre;

            header("location: agregar.php");

        }
        else{
            echo '<script>
            alert ("Revisa tus respuestas");
            </script>';
        }
        
    
    }

    catch(PDOException $e){
        echo "error".$e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Iniciar Sesion</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div  class="card card-1">
              <div class="card-heading">
             

              </div>
                <div class="card-body">
                    <h2 class="title">Iniciar Sesión</h2>
                  
                    <form action="" method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Usuario" id="usuario" name="usuario">
                        </div>
                        
                                <div class="input-group">
                                    <input class="input--style-1" type="password" placeholder="Contraseña" id="contraseña" name="password">
                                </div>
                          
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--color" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Main JS-->
 <!--<script src="js/global.js"></script>-->   

</body>

</html>



