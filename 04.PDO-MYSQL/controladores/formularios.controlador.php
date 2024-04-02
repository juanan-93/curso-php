<?php
    class controladorFormularios{

        // Creamos el metodo ctrFormulario para recibir los datos del formulario
       static public function ctrFormulario(){
            // Dentro del metodo comprobamos si existe una variable tipo post dentro del formulario
            if(isset($_POST['registroNombre'])){
                // Mandamos los datos al modelo
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
            }
            
        }

        // cremaos el metodo para mostrar los datos del formulario

        static public function ctrSeleccionarRegistros(){
           //primero declarmos la tabla para pedir al modelo que nos devuelva los datos de la tabla que se llama registro
              $tabla = "registros";
                //Segundo mandamos la tabla al modelo para solicitar una respuesta que como parametro le mandamos la $tabla de registro
                // y los valores null, null para que nos devuelva todos los registros ya que estamos reutilizando el metodo mdlSeleccionarRegistros
                $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, null, null);
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
        
    }
?>