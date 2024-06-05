<?php
 
 if(isset($_POST['submit'])){

 try{
    $conexion=new PDO('mysql:host=localhost:3306;dbname=tienda','root','');
    //$enunciado=$conexion->prepare("INSERT INTO `albumes` (`producto`, `artista`, `precioant`, `precioact`, `img`) values (?,?,?,?,?)");
    $enunciado=$conexion->prepare("INSERT INTO albumes(producto, artista, precioant, precioact, img) values (?,?,?,?,?)");
    
    $p=$_POST['producto1'];
    $p=filter_var($p, FILTER_SANITIZE_STRING);
    $a=$_POST['artista1'];
    $a=filter_var($a, FILTER_SANITIZE_STRING);
    $pr=$_POST['precioant1'];
    $pr=filter_var($pr, FILTER_SANITIZE_STRING);
    $prb=$_POST['precioact1'];
    $prb=filter_var($prb, FILTER_SANITIZE_STRING);
    $i=$_POST['img1'];
    $i=filter_var($i, FILTER_SANITIZE_STRING);

    $enunciado->bindParam(1,$p);
    $enunciado->bindParam(2,$a);
    $enunciado->bindParam(3,$pr);
    $enunciado->bindParam(4,$prb);
    $enunciado->bindParam(5,$i);


    $enunciado->execute();
}catch(PDOException $e){
    echo "error".$e->getMessage();
}

 }
 if(isset($_POST['back'])){
    
    header("location: index.php");

 }

/*
  if(isset($_POST['submit'])){

  try{
    $conexion=new PDO('mysql:host=localhost:3308;dbname=tienda','root','');
    $enunciado=$conexion->prepare("INSERT INTO albumes(producto,artista,precioant,precioact,img) values (?,?,?,?,?)");
   
  

        print_r($_POST);

       $producto1="uber";
     //   $producto1=filter_var($producto1, FILTER_SANITIZE_STRING);

        $artista1="salma";
     //   $artista1=filter_var($artista1, FILTER_SANITIZE_STRING);

        $precioant1="1000";
     //   $precioant1=filter_var($precioant1, FILTER_SANITIZE_STRING); 

        $precioact1="800";
     //   $precioact1=filter_var($precioact1, FILTER_SANITIZE_STRING);

        $img1="imagen";
     //   $img1=filter_var($img1, FILTER_SANITIZE_STRING);


        $enunciado->bindParam(1,$producto1);
        $enunciado->bindParam(2,$artista1);
        $enunciado->bindParam(3,$precioant1);
        $enunciado->bindParam(4,$percioact1);
        $enunciado->bindParam(5,$img1);
        
        $enunciado->execute();

        
    }catch(PDOException $e){
        echo "error".$e->getMessage();
    }
}
*/


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
                    <h2 class="title">Insertar Productos</h2>
                  
                    <form action="" method="POST">
                        <div class="input-group">
                            
                            
                            <input class="input--style-1" type="text" placeholder="Nombre del producto" name="producto1" id="producto1">
                        </div>
                        
                                <div class="input-group">
                                    
                                    <input class="input--style-1" type="text" placeholder="Nombre del artista" name="artista1" id="artista1">
                                </div>

                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Link de la imagen" name="img1" id="img1">
                                </div>

                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Precio anterior" name="precioant1" id="precioant1">
                                </div>

                                <div class="input-group">
                            
                                    <input class="input--style-1" type="text" placeholder="Precio actual" name="precioact1" id="precioact1">
                                </div>
                          
                          
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--color" type="submit" name="submit">Agregar</button>
                        
                            <button class="btnback btn btn--radius btn--color" type="submit" name="back">Pagina principal</button>
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























