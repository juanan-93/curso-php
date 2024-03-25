<?php

#Las funciones sin parametros

function saludo(){
    echo "hola mundo";
}
#Para ejecutar la funcion se debe llamar a la funcion
saludo();

#funciones con parametros

function despedida($nombre){
    echo "<br><br>";
    echo "HASTA LUEGO $nombre";
    echo "<br><br>";
}   

#Para ejecutar la funcion se debe llamar a la funcion y pasarle el parametro
despedida("juan");

#funciones con retorno son parecidas a las funciones con parametros se diferencain en que estas devuelven un valor

function retorno($retornar){
    return $retornar;
}

echo retorno("retornar");


?>