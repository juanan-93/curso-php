<?php
#codigo imperatiov o codigo espagueti

$coche1 = (object)["marca"=>"Toyota", "modelo"=>"Corolla"];
$coche2 = (object)["marca"=>"Hyundai", "modelo"=>"Accent"];

function mostrar($coche){
    echo "<p>Hola soy un $coche->marca, modelo $coche->modelo</p>";
}

mostrar($coche1);
mostrar($coche2);


?>