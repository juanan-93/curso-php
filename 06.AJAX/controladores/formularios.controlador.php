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
                if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroNombre"]) &&
			        preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registroEmail"]) &&
			         preg_match('/^[0-9a-zA-Z]+$/', $_POST["registroPswd"])){
                 // primero declaramos una variable con el nombre de la tabla
                 $tabla = "registros";
                 //cremaos un token para la seguridad de la pagina web(este token lo tendremos que añadir al modelo para que lo guarde en la base de datos)
                 //md5 es un metodo de encriptacion que nos permite encriptar los datos que se envian a traves de la url
                 //dentro de los parentesis le pasamos los datos que queremos encriptar el simbolo + es para sumar los datos y con los puntos lo concatenamos
                 $token = md5($_POST['registroNombre']. "+" . $_POST['registroEmail']);
                // encriptamos la contraseña con el metodo crypt que nos permite encriptar la contraseña
                // el primer parametro es la contraseña que queremos encriptar y el segundo parametro es la semilla que se le añade a la contraseña
                 $encriptarPassword = crypt($_POST["registroPswd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                 //Segundo los guardamos los datos dentro de un array
                 //guardaremos el token en la base de datos para que cada usuario tenga un token diferente
                 $datos = array( "token" => $token,
                                "nombre" => $_POST['registroNombre'],
                                 "email" => $_POST['registroEmail'],
                                 "password" => $encriptarPassword
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
        public function ctrIngreso() {
            // Comprueba si se envió el formulario de ingreso
            if(isset($_POST["ingresoEmail"])) {
                $tabla = "registros";
                $item = "email";
                $valor = $_POST["ingresoEmail"];
        
                // Obtiene la información del usuario por email
                $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

                // Encripta la contraseña para compararla con la base de datos
                $encriptarPassword = crypt($_POST["ingresoPswd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        
                // Verifica la contraseña (Considera usar password_verify si la contraseña está hasheada)
                if($respuesta && $respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $encriptarPassword) {
                    $_SESSION["validarIngreso"] = "ok";
        
                    // Restablecer intentos fallidos a 0 si el ingreso es exitoso
                    ModeloFormularios::mdlActualizarIntentosFallido($tabla, 0, $respuesta["token"]);
        
                    echo'<script>

                        if(window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                            window.location = "index.php?pagina=inicio";
                        }

                    </script>';
                } else {
                    // Si la respuesta es válida y hay menos de 3 intentos fallidos
                    if($respuesta && $respuesta["intentos_fallidos"] < 3) {

                        $intentos_fallidos = $respuesta["intentos_fallidos"] + 1;

                        ModeloFormularios::mdlActualizarIntentosFallido($tabla, $intentos_fallidos, $respuesta["token"]);

                        echo '<script>
                        if(window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                        </script>';
                        echo '<div class="alert alert-danger">Has introducido mal los datos.</div>';

                    }else{

                        echo '<script>
                        if(window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }

                    </script>';
                    echo '<div class="alert alert-danger">Eres un robot maquina.</div>';
                    }
        
                    
                }
            }
        }
        
        

        // Creamos el metodo statico ctrActualizarRegistro para actualizar los datos registro
        static public function ctrActualizarRegistro() {
            if (isset($_POST["actualizarNombre"])) {
                // Validación de nombre y email
                if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["actualizarNombre"]) &&
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["actualizarEmail"])) {
        
                    // Recuperar datos del usuario existente
                    $usuario = ModeloFormularios::mdlSeleccionarRegistros("registros", "token", $_POST["tokenUsuario"]);
                    $comparaToken = md5($usuario["nombre"] . "+" . $usuario["email"]);
        
                    // Verificar token
                    if ($comparaToken == $_POST["tokenUsuario"]&& $_POST["idUsuario"] == $usuario["id"]) {
                        $tabla = "registros";
        
                        // Preparar contraseña
                        // Si la nueva contraseña no está vacía y es válida, se hashea. De lo contrario, se usa la contraseña actual.
                        $password = "";
                        if (!empty($_POST["actualizarPswd"]) && preg_match('/^[0-9a-zA-Z]+$/', $_POST["actualizarPswd"])) {
                            $password = crypt($_POST["actualizarPswd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                        } else {
                            $password = $_POST["passwordActual"];
                        }
                        // Crear nuevo token para el usuario actualizado
                        $actualizarToken = md5($_POST["actualizarNombre"] . "+" . $_POST["actualizarEmail"]);
                        // Preparar datos para actualizar
                        $datos = array("id" => $_POST["idUsuario"],
                            "token" => $actualizarToken,
                            "nombre" => $_POST["actualizarNombre"],
                            "email" => $_POST["actualizarEmail"],
                            "password" => $password
                        );
        
                        // Actualizar registro
                        $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);
                        return $respuesta;
                    } else {
                        return "error";
                    }
                } else {
                    echo '<div class="alert alert-danger">Error: No puede ir vacío o llevar caracteres especiales los campos.</div>';
                }
            }
        }
        

        // Creamos el metodo ctrEliminarRegistro para eliminar los datos del formulario
        public function ctrEliminarRegistro(){
            // Comprueba si se proporcionó un id de usuario para eliminar
            if(isset($_POST["eliminarRegistro"])){
                    // la linea de codigo de abajo es para que nos devuelva los datos del usuario que queremos editar
                    $usuario = ModeloFormularios::mdlSeleccionarRegistros("registros", "token", $_POST["eliminarRegistro"]);
                    // metemos dentro de la variable $comparaToken el token que nos devuelve el modelo
                    $comparaToken = md5($usuario["nombre"]. "+" . $usuario["email"]);
                    // Comprueba si el token proporcionado coincide con el token del usuario
                    if($comparaToken == $_POST["eliminarRegistro"]){
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
    }
?>