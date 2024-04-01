<?php
    class controladorFormularios{

        // Creamos el metodo ctrFormulario para recibir los datos del formulario
       static public function ctrFormulario(){
            // Dentro del metodo comprobamos si existe una variable tipo post dentro del formulario
            if(isset($_POST['registroNombre'])){
                // Si existe la variable, devuelve el valor de la variable post
                return "ok";
            }
            
        }
    }
?>