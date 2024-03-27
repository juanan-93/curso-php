<?php
//  Es el archivo que va a buscar la URL

// riquiere_once es una funcion de php/js que se utiliza para llamar a un archivo que contenga php. Equivale a un import de react
require_once "controladores/plantilla.controlador.php";

// creamos un objeto de la clase ControladorPlantilla
$plantilla = new ControladorPlantilla();
// ejecutamos el metodo ctrTraerPlantilla
$plantilla -> ctrTraerPlantilla();

?>