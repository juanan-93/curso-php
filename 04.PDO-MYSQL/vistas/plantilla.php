<?php
//Es la funcion que le dice al navegador que vamos a trabajar con variables de sesion
// estas se usaran cuando el usuario se loguee coincidan los datos correctamente
// con esto privatizamos la pagina de inicio
  session_start();
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ejemplo mvc</title>

        

        <!-- plugin CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- plugin JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://kit.fontawesome.com/6959075f0b.js" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container-fluid">
        <h3 class="text-center py-3">LOGO</h3>
    </div>

    <!-- botonera -->
    <div class="container-fluid bg-light">

      <div class="container">
          <ul class="nav nav-pills nav-justified">
            <!-- que el color tenga el color azul segun su url -->

            <!-- Las variables get: son variables que se pasan con parametros url tambien conocido como cadena de consultas a traves de la url
            La primera variable se ciera con ? la que las continuan se cierran con el simbolo &. Esto lo colocaremos en el href
            Primero le decimos donde tiene que ir a nuestra pagina principal index.php y luego de claramos las variables gets tenemos en cuenta que dentro 
           de las condiciones ya le habimaos dado anterior mente el valor get a cada li y los metems en un echo para imprimir-->
            <?php
              if(isset($_GET["pagina"])){
                
                if($_GET["pagina"] == "registro"){
                  echo '<li class="nav-item">
                          <a class="nav-link active" href="index.php?pagina=registro">Registro</a>
                        </li>';
                }else{
                  echo '<li class="nav-item">
                          <a class="nav-link" href="index.php?pagina=registro">Registro</a>
                        </li>';
                }

                if($_GET["pagina"] == "inicio"){
                  echo '<li class="nav-item">
                          <a class="nav-link active" href="index.php?pagina=inicio">Inicio</a>
                        </li>';
                }else{
                  echo '<li class="nav-item">
                          <a class="nav-link" href="index.php?pagina=inicio">Inicio</a>
                        </li>';
                }

                if($_GET["pagina"] == "salir"){
                  echo '<li class="nav-item">
                          <a class="nav-link active" href="index.php?pagina=salir">Salir</a>
                        </li>';
                }else{
                  echo '<li class="nav-item">
                          <a class="nav-link" href="index.php?pagina=salir">Salir</a>
                        </li>';
                }

                if($_GET["pagina"] == "ingreso"){
                  echo '<li class="nav-item">
                          <a class="nav-link active" href="index.php?pagina=ingreso">Ingreso</a>
                        </li>';
                }else{
                  echo '<li class="nav-item">
                          <a class="nav-link" href="index.php?pagina=ingreso">Ingreso</a>
                        </li>';
                }
              }else{
                echo '<li class="nav-item">
                          <a class="nav-link" href="index.php?pagina=registro">Registro</a>
                        </li>';
                echo '<li class="nav-item">
                          <a class="nav-link" href="index.php?pagina=inicio">Inicio</a>
                        </li>';
                echo '<li class="nav-item">
                          <a class="nav-link" href="index.php?pagina=salir">Salir</a>
                        </li>';
                echo '<li class="nav-item">
                          <a class="nav-link" href="index.php?pagina=ingreso">Ingreso</a>
                        </li>';

              }

            ?>

            </ul>
      </div>
    </div>


<div class="container-fluid">

  <div class="container py-5">
    <?php
     #isset: isset() es una funcion que nos permite saber si una variable esta definida o es null
     #$_GET: es una variable super global que se utiliza para recoger datos enviados por el metodo GET.
     #Lo escribimos asi $_GET["pagina"] para ver que si existe la variable pagina en la url usando isset pagina que es el nombre que lo hemos definido en la variable

     // Verificamos si la variable "pagina" está presente en la URL (GET request).
      if(isset($_GET["pagina"])){
        // Comprobamos si el valor de "pagina" es uno de los esperados.
        if($_GET["pagina"] == "registro" ||
          $_GET["pagina"] == "ingreso" ||
          $_GET["pagina"] == "inicio" ||
          $_GET["pagina"] == "salir"){
            // Si es así, incluimos el archivo correspondiente a esa página.
            // Concatenamos el valor de $_GET["pagina"] con el path y la extensión .php para formar el nombre del archivo.
            include "paginas/".$_GET["pagina"].".php";
        }else{
            // Si "pagina" no es ninguno de los valores esperados, mostramos una página de error 404.
            include "paginas/error404.php";
        }
      } else {
        // Si la variable "pagina" no está presente en la URL, mostramos la página de registro por defecto.
        include "paginas/registro.php";
      }
    ?>
  </div>

</div>

    
</body>
</html>