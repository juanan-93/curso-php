<?php
// creamos un condicional para que si la variable de sesion validarIngreso no es igual a ok nos redirija a la pagina de ingreso     
// primero comprueba si la variable de sesion validarIngreso esta definida
// si esta definida comprueba si es diferente de ok
// si es diferente de ok nos redirige a la pagina de ingreso
if(!isset($_SESSION["validarIngreso"])){
      if($_SESSION["validarIngreso"] != "ok"){
            echo '<script>
            window.location = "index.php?pagina=ingreso";
            </script>';
            return;
      }
//si no existen variables de sesion validarIngreso nos redirige a la pagina de ingreso
}else{
      echo '<script>
      window.location = "index.php?pagina=ingreso";
      </script>';
      return;
}
      

//Crearemos un objeto que le haga al controlador desde la vista
$usuario= ControladorFormularios::ctrSeleccionarRegistros();


?>


<table class="table table-striped">
         <thead>
              <tr>
                     <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
            <!-- //A continuacion recorreremos el array que nos devulve $usuario con un foreach 
                  por cada uno de los $usuarios y por cada uno de sus indices coge su valores
                  englobando toda la tabla como se ve  -->
            <?php foreach($usuario as $key => $value): ?>
                  <tr>
                  <!-- dentro de cada td mostraremos los datos de cada ususario primero poniendo siempre las etiquetas php  y debtro de este
                        poniendo los datos que queremos que nos muestre con un echo$value[y el nombre del campo que quremos mostrar] -->
                        <!-- en la columna que mostramos los numeros le decimos que imprima la key que es la posicion del array -->
                    <td><?php echo($key+1)?></td>  
                    <td><?php echo$value["nombre"]?></td>
                    <td><?php echo$value["email"]?></td>
                    <td>01/03/2025</td>
                        <td>
                              <div class="btn-group">
                                    <a href="#" class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                              </div>
                        </td>
                  </tr>

            <?php endforeach?>
    
            </tbody>
</table>