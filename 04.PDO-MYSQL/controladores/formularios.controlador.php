<?php
    class controladorFormularios{

        // Creamos el metodo ctrFormulario para registrar los datos del formulario
       static public function ctrRegistroFormulario(){
            // Dentro del metodo comprobamos si existe una variable tipo post dentro del formulario
            if(isset($_POST['registroNombre'])){
                //el condicional con el preg_match nos permite comprobar si el nombre lleva caracteres especiales o no
                // para asi evitar cualquier tipo de inyeccion de codigo esdecir mteremos dentro de los parentesis lo que no queremos que lleve
                // el primer parametro son los caracteres que no queremos que la gente nos meta en el formulario y en el mismo dentro de este primero 
                // los caracteres que si queremos que lleve el formulario
                if(preg_match(  '/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['registroNombre'])&&
                    preg_match(  '/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['registroEmail'])&&
                    preg_match(  '/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['registroPswd'])) {
                 // primero declaramos una variable con el nombre de la tabla
                 $tabla = "registros";
                 //Segundo los guardamos los datos dentro de un array
                 $datos = array("nombre" => $_POST['registroNombre'],
                                 "email" => $_POST['registroEmail'],
                                 "password" => $_POST['registroPswd']
                             ); 
 
                 //Tercero  Mandamos los datos al modelo, estos los mandamos a traves de un metodo estatico instanciandolo en el controlador
                 // instanciamos la clase ModeloFormularios y el metodo mdlRegistro dentro de la variable $respuesta para poder devolver $respuesta
                 // a la vista a traves de un return
                 $respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
                 return $respuesta;
                    
                }else{
                    echo '<br><div class="alert alert-danger">Error: El nombre no puede ir vacío o llevar caracteres especiales</div>';
                
                }
            }
        }


        // cremaos el metodo para mostrar los datos del formulario

        static public function ctrSeleccionarRegistros($item, $valor){
           //primero declarmos la tabla para pedir al modelo que nos devuelva los datos de la tabla que se llama registro
            $tabla = "registros";
            //Segundo mandamos la tabla al modelo para solicitar una respuesta que como parametro le mandamos la $tabla de registro
            // y los valores null, null para que nos devuelva todos los registros ya que estamos reutilizando el metodo mdlSeleccionarRegistros
            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
            //Tercero retornamos la respuesta a la vista
            return $respuesta;
        }


        // Creamos el metodo ctrIngreso donde veremos si los datos traidos atraves del modelo coinciden con los datos ingresados

        public function ctrIngreso(){
            
            if(isset($_POST["ingresoEmail"])){
                // declaramos la tabla
                $tabla = "registros";
                // declaramos el item que es el campo de la tabla la columna
                $item = "email";
                // declaramos el valor que es el valor del campo
                $valor = $_POST["ingresoEmail"];
                //solicitamos al modelo que nos devuelva los datos de la tabla registros para comprobar si coinciden con los datos ingresados 
                // reutilizando el metodo mdlSeleccionarRegistros
                $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
                // condicional donde si los datos son correctos nos redirige a la pagina de inicio
                if($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPswd"]){

                    $_SESSION["validarIngreso"] = "ok";

                   // en este echo redirigimos a la pagina de inicio y limpia la cache
                    echo'<script>
                    if(window.history.replaceState){
                        window.history.replaceState(null, null, window.location.href);{
                            window.location = "index.php?pagina=inicio";}
                    }
                    </script>';
                }else{
                    echo '<br><div class="alert alert-danger">Error al ingresar</div>';
                } 
            }
        }

        // Creamos el metodo statico ctrActualizarRegistro para actualizar los datos del formulario

        static public function ctrActualizarRegistro(){
            // Asegúrate de que todos los campos esperados están presentes antes de proceder
            if(isset($_POST["actualizarNombre"], $_POST["actualizarEmail"], $_POST["idUsuario"])){
                // Comprueba si se proporcionó una nueva contraseña y asegúrate de que $password siempre esté definida
                // La variable $tabla declarada a continuacion es la tabla de la base de datos para actualizar los datos
                // se declara al principio para que este disponible en todo el metodo
                $tabla = "registros";
                
                // Comprueba si se proporcionó una nueva contraseña y asegúrate de que $password siempre esté definida
                $password = isset($_POST["actualizarPswd"]) && $_POST["actualizarPswd"] != "" ? $_POST["actualizarPswd"] : $_POST["passwordActual"];
                
                // Prepara los datos para actualizar
                $datos = array( 
                    "id" => $_POST["idUsuario"],
                    "nombre" => $_POST["actualizarNombre"],
                    "email" => $_POST["actualizarEmail"],
                    "password" => $password
                );
                
                // Solicita al modelo que actualice los datos
                $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);
                // para devolver la respuesta a la vista
                return $respuesta;
            } 
           
        }

        public function ctrEliminarRegistro(){
            // Comprueba si se proporcionó un id de usuario para eliminar
            if(isset($_POST["eliminarRegistro"])){
                // declaramos la tabla
                $tabla = "registros";
                // declaramos el valor que es el valor del campo
                $valor = $_POST["eliminarRegistro"];
                
               //solicitamos al modelo que elimine el registro
                $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);
                // para devolver la respuesta a la vista
                if($respuesta == "ok"){
                    echo '<script>
                        if(window.history.replaceState){
                            window.history.replaceState(null, null, window.location.href);
                            window.location = "index.php?pagina=inicio";
                        }
                    </script>';
                }
                return $respuesta;
               
            }
        }
    }
?>