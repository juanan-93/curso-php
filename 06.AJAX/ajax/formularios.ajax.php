<?php

    require_once "../controladores/formularios.controlador.php";
    require_once "../modelos/formulario.modelo.php";

    class FetchFormularios {
        //estp es una variable publica que se va a encargar de recibir el valor que se va a validar
        public $validarEmail;
        //esto es un metodo publico que se va a encargar de hacer la validacion del email
        public function fetcValidarEmail() {
            header('Content-Type: application/json');
            $item = "email";
            $valor = $this->validarEmail;
            $respuesta = controladorFormularios::ctrSeleccionarRegistros($item, $valor);

            // En lugar de imprimir el array, devolvemos una respuesta en JSON
            echo json_encode($respuesta);
        }   
    }

    if(isset($_POST["email"])) {
        $valEmail = new FetchFormularios();
        $valEmail -> validarEmail = $_POST["email"];
        $valEmail -> fetcValidarEmail();
    }
