<?php
#condiciones en php se utilizan para tomar decisiones en el codigo 

$a = 1;
$b = 10;
if($a > $b){
    echo "$a es mayor que $b";}
    else if ( $a == $b){
        echo "son iguales";
    }else{
        echo "$a es menor que $b";
    }

    echo "<br><br>";

    #suiches 

    $dia = "viernes";

    switch($dia){
        #case es como un if
        case 'sabado':
        #la condicion que queremos que se cumpla
        echo "voy a estudiar php";
        #break es para que no siga ejecutando el codigo
        break;

        case 'viernes':
        echo "voy a la fiesta";
        break; 

        case 'domingo':
        echo "voy a descansar";
        break;
        #default es como un else
        default: echo "voy a la universidad";
        
    }

    echo "<br><br>";

    #cilcos para incrementar un valor o para hacer una tarea una serie de veces
    # es decir que n se ha incrementado hasta llegar 

    $n = 1;
    while($n <= 20){
        echo $n;
        $n++;
    }

    echo "<br><br>";

    #ciclo do while es como el anterior solo que le decimos con do que haga algo y luego con while le ponemos la condicion
    $p = 1;

    do{
        echo $p;
        $p++;}
    while($p <= 20);

    echo "<br><br>";

    #ciclo for es como el while pero mas corto en primer lugar en que quieres que se inicie en este caso en 0, en segundo lugar la condicion y en tercer lugar en cuanto quieres que se incremente. El ; es para separar las condiciones

    for($i=1; $i<=20; $i++){
        echo $i;
    }




?>