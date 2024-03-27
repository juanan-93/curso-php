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
              <li class="nav-item">
                <!-- Las variables get: son variables que se pasan con parametros url tambien conocido como cadena de consultas a traves de la url
                La primera variable se ciera con ? la que las continuan se cierran con el simbolo &. Esto lo colocaremos en el href
                Primero le decimos donde tiene que ir a nuestra pagina principal index.php y luego de claramos las variables gets-->

                <a class="nav-link " href="index.php?pagina=registro">Registro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="index.php?pagina=inicio">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?pagina=salir">salir</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?pagina=ingreso">Ingreso</a>
              </li>
            </ul>
      </div>
    </div>


<div class="container-fluid">

  <div class="container py-5">
    <?php
     #isset: isset() es una funcion que nos permite saber si una variable esta definida o es null
     #$_GET: es una variable super global que se utiliza para recoger datos enviados por el metodo GET.
     #Lo escribimos asi $_GET["pagina"] para ver que si existe la variable pagina en la url usando isset pagina que es el nombre que lo hemos definido en la variable

     if(isset($_GET["pagina"])){
        if($_GET["pagina"] == "registro" ||
           $_GET["pagina"] == "ingreso" ||
           $_GET["pagina"] == "inicio" ||
           $_GET["pagina"] == "salir"){
      // Los dos puntos utilizado en el include en rojo son para concatenar el valor del get en este caso con el valor de la pagina
            include "paginas/".$_GET["pagina"].".php";
          }

     }else{
      // Si no existe la variable get pagina entonces se cargara la pagina de inicio
      // el include es para incluir el archivo de la pagina de inicio y renderizarla en la plantilla
      include "paginas/registro.php";

     }
    ?>
  </div>

</div>

    
</body>
</html>