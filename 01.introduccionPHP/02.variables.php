<?php 

#la variabvle en php se defienen con el simbolo de dolar

# variable numerica.
    $numero = 5;
#esto es un ejemplo de variable de texto  concatanada con una variable numerica
echo "esto es el numero $numero";
echo "<br><br>";    

 #variabel de texto
    $texto = "variable de texto";
    echo $texto;

#variable booleana esta devuelkve un valor de true o false
    $booleana = true;
    echo "<br><br>";
    echo $booleana;

    #variable variable de tiopo arreglo
    $colores = array('rojo','amarillo','azul');   
    echo "<br><br>"; 
    echo "el color a mostar es : $colores[2]";
    echo "<br><br>";    

    #variavle arreglo de propiedades 
    $verduras = array( "verdura1"=>"lechuga",);
    echo "estyo es una ensalada de $verduras[verdura1]";
    echo "<br><br>";

    #variable de tipo objeto
    $furtas = (object)["fruta1"=>"pera","fruta2"=>"manzana"];
    echo "esto es una fruta $furtas->fruta1";
    

?>
