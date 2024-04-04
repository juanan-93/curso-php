  
  
<div class="d-flex justify-content-center">
<!-- declaramos el metodo que usaremos dentro de la etiqueta from en este caso como enviamos datos es post -->
    <form class="p-5 bg-light" method="post">
        <div class="mb-3">
            <h1>Ingreso</h1>
        </div>
        <div class="form-group input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="ingresoEmail">
        </div>

        <div class="form-group input-group mb-3">
            <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
            <!-- con la etiqueta name declaramos la variable post -->
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="ingresoPswd">
        </div>

        <!-- Declaramos el objeto y instanciamos el metodo para conectar la vista con el controlador -->
        <?php 
        // instanciado el objeto de manera no estatica ya que queremos que se ejecute el metodo ctrIngreso
            $ingreso = new controladorFormularios();
            $ingreso -> ctrIngreso();    
        ?>

        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>



