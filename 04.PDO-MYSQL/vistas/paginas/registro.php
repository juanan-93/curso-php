  
  
<div class="d-flex justify-content-center">
<!-- declaramos el metodo que usaremos dentro de la etiqueta from en este caso como enviamos datos es post -->
    <form class="p-5 bg-light" method="post">
        <div class="mb-3">
            <h1>Registro</h1>
        </div>
        <div class="form-group input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input type="text" class="form-control" id="nombre" placeholder="Enter nombre" name="registroNombre">
        </div>

        <div class="form-group input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="registroEmail">
        </div>

        <div class="form-group input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
            <!-- con la etiqueta name declaramos la variable post -->
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="registroPswd">
        </div>

        <!-- Declaramos el objeto y instanciamos el metodo para conectar la vista con el controlador -->
        <?php
        // instanciado el objeto de manera no estatica
            // $registro = new controladorFormularios();
            // $registro -> ctrFormulario();

        // instanciado el objeto de manera estatica
        // de manera que se queda dentro de la variable registro almacenando el valor que retorna el metodo ctrFormulario
            $registro = controladorFormularios::ctrRegistroFormulario();
            
            if($registro == "ok"){
                // linea de codigo para limpiar la url y el local storage esta linea es en js la que se encuentra entre las dos etiquetas script
                echo "<script>
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);
                    }</script>";

               echo "<div class='alert alert-success'>El usuario ha sido registrado</div>";
            }
            
        ?>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>


