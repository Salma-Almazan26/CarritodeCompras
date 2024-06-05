<!--de aqui descargar la bd a un arreglo de objetos -->
<?php
//Utilizando interrogantes para los valores
/*  
$productos = array();

class Articulo{
    public $product;
    public $artista;
    public $precioant;
    public $precioact;
    public $img;

    function __construct($p,$a,$p1,$p2,$i){
        $this->product=$p;
        $this->artista=$a;
        $this->precioant=$p1;
        $this->precioact=$p2;
        $this->img=$i;
    }
}
*/
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>
    <link rel="stylesheet" href="css1/normalize.css">
    <link rel="stylesheet" href="css1/skeleton.css">
    <link rel="stylesheet" href="css1/custom.css">
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/bootstrap.css">
    <script src="js/popper.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>
<body>
<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="four columns">
                <img src="img/logo1.png" id="logo">
            </div>

    
            <div class="one columns u-pull-right"> <a style="float:rigth ;" href="sesion.php" class="button" >Iniciar sesion</a></div>
            <div class="one columns u-pull-right">
                <ul>
                    <li class="submenu">
                            <img src="img/cart.png" id="img-carrito">
                            <div id="carrito">
                                    
                                    <table id="lista-carrito" class="u-full-width">
                                        <thead>
                                            <tr>
                                                <th>Imagen</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    
                                    <a href="#" id="vaciar-carrito" class="button u-full-width">Vaciar Carrito</a>
                                   
                            </div>
                          
                    </li>
                </ul>
                 
            </div>
           
        </div> 
    </div>
    </header>


    <div id="hero">
        <div class="container">
            <div class="row">
                    <div class="six columns">
                        <div class="contenido-hero">
                                <h2>Busca de tu grupo favorito</h2>
                                <p style="text-shadow: 1px 2px 0px black" >Albumes, Lightstick y mas...</p>
                                <form action="#" id="busqueda" method="post" class="formulario">
                                    <input class="u-full-width" type="text" placeholder="¿Que quisieras encontrar?" id="buscador">
                                    <input type="submit" id="submit-buscador" class="submit-buscador">
                                </form>
                        </div>
                    </div>
            </div> 
        </div>
    </div>

    <div class="barra">
        <div class="container">
            <div class="row">
                    <div class="four columns icono icono1">
                        <p>Mas de 20,000 Articulos <br>
                        Encuentra los mejores precios</p>
                    </div>
                    <div class="four columns icono icono2">
                        <p>Completamente originales <br>
                        Con beneficios de preventa</p>
                    </div>
                    <div class="four columns icono icono3">
                        <p>Envios gratis en la compra <br>
                        de mas de 3 articulo</p>
                    </div>
            </div>
        </div>

    </div>


    <!--de aqui comienza a cargar los productos con php-->
    <div id="lista-productos" class="container">
        <h1 id="encabezado" class="encabezado">Articulos de Kpop</h1>
        
        <!--bueno en realidad aqui jajaja con php-->
        

        <?php

        try{
            $conexion=new PDO('mysql:host=localhost:3306;dbname=tienda','root','');
            $enunciado=$conexion->prepare("SELECT * FROM albumes");
            $enunciado->setFetchMode(PDO::FETCH_ASSOC);
            $enunciado->execute();
            
            $cont=1;
            while($row= $enunciado->fetch()){
               // $arr= array($row["producto"], $row["artista"],$row["precioant"],$row["precioact"],$row["img"]);
               ?>
               
               <?php if($cont%3==0)  echo '<div class="row">'; ?>

                    <div class="four columns">
                        <div class="card">
                            <img src="<?php echo $row["img"]; ?>" class="imagen-curso u-full-width">
                            <div class="info-card">
                                <h4><?php echo $row["producto"]; ?></h4>
                                <p><?php echo $row["artista"]; ?></p>
                                <img src="img/estrellas1.png">
                                <p class="precio"><?php echo "$".$row["precioant"]; ?> <span class="u-pull-right "><?php echo "$".$row["precioact"]; ?></span></p>
                                <a href="#" class="u-full-width button-primary button input agregar-carrito" data-id="1">Agregar Al Carrito</a>
                            </div>
                        </div> <!--.card-->
                    </div>

              <?php if($cont%3==0)  echo '</div>'; ?>
                

               <?php
                $cont++;
                
            }
        }catch(PDOException $e){
            echo "error".$e->getMessage();
        }
       
        ?>
         <!--.card-->
            
    
        
        <!--.row-->

    </div>
          
    
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row">
                    <div class="four columns">
                            <nav id="principal" class="menu">
                                <a class="enlace" href="#">Para tu Negocio</a>
                                <a class="enlace" href="#">Conviertete en Instructor</a>
                                <a class="enlace" href="#">Aplicaciones Móviles</a>
                                <a class="enlace" href="#">Soporte</a>
                                <a class="enlace" href="#">Temas</a>
                            </nav>
                    </div>
                    <div class="four columns">
                            <nav id="secundaria" class="menu">
                                <a class="enlace" href="#">¿Quienes Somos?</a>
                                <a class="enlace" href="#">Empleo</a>
                                <a class="enlace" href="#">Blog</a>
                            </nav>
                    </div>
            </div>
        </div>
    </footer>
<script src="js/app.js"></script>
<script src="js/app2.js"></script>

</body>
</html>