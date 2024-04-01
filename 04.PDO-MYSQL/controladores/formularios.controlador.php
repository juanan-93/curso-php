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
    }
?>