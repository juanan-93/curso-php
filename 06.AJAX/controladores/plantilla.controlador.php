<?php
class ControladorPlantilla{

    // Creamos el metodo para llamar a la platilla
    public function ctrTraerPlantilla(){
        // el include se utiliza para llamar a un archivos que contengan html o php
        include "vistas/plantilla.php";
    }
    // una vez declarado el metodo, se debe llamar en el index.php usando riquiere_once 
    
}

?>