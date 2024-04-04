<?php
    //  Es el archivo que va a buscar la URL

    // riquiere_once es una funcion de php/js que se utiliza para llamar a un archivo que contenga php. Equivale a un import de react
    require_once "controladores/plantilla.controlador.php";
    // para usar eñ controlador de formularios se debe requerir el archivo en index.php para que se pueda usar en la vista de registro y asi poder enviar los datos del formulario
    // se debe requerir el archivo de formularios.controlador.php
    require_once "controladores/formularios.controlador.php";
    // se debe requerir el archivo de formulario.modelo.php y desde index puede ser requerido por otros controladores
    require_once "modelos/formulario.modelo.php";
    // creamos un objeto de la clase ControladorPlantilla
    $plantilla = new ControladorPlantilla();
    // ejecutamos el metodo ctrTraerPlantilla
    $plantilla -> ctrTraerPlantilla();

?>