  <!-- traer los valores para poner en los inputs -->
 <?php
    if(isset($_GET["id"])){
        $item = "id";
        $valor = $_GET["id"];
        //reutilizamos el metodo ctrSeleccionarRegistro para seleccionar el registro que queremos editar
        //Al cual le pasaremos dos parametros el item y el valor declarados arriba
        $usuario = controladorFormularios::ctrSeleccionarRegistros( $item, $valor);
        //$usuario nos devolbera un array con los datos del usuario que queremos editar
    }
  ?>
  




<div class="d-flex justify-content-center">
<!-- declaramos el metodo que usaremos dentro de la etiqueta from en este caso como enviamos datos es post -->
    <form class="p-5 bg-light" method="post">
        <div class="mb-3">
            <h1>Registro</h1>
        </div>
        <div class="form-group input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <!-- con la etiqueta name declaramos la variable post que aqui queremos actualizar los datos de la base de datos
            que enviaremos al metodo actualizar -->
            <input type="text" class="form-control" id="nombre" placeholder="Enter nombre" name="actualizarNombre" value="<?php echo $usuario["nombre"]; ?>">
        </div>

        <div class="form-group input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="actualizarEmail" value="<?php echo $usuario["email"]; ?>">
        </div>

        <div class="form-group input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
            <!-- con la etiqueta name declaramos la variable post -->
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="actualizarPswd">
            <!-- con la etiqueta input type hidden declaramos una variable que no se mostrara en el formulario pero que se enviara al metodo actualizar -->
            <input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>">
            <input type="hidden" name="idUsuario" value="<?php echo $usuario["id"]; ?>">
            
        </div>

    <?php
        //Instanciamos el metodo actualizar los datos
        $actualizar = new ControladorFormularios();
        $actualizar -> ctrActualizarRegistro();
    ?>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>


