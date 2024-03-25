<?php
# Declaracion de una clase
#En la programacio orientada a objetos se crean clases y objetos 
#Clase: Modelo donde se redactan las caracteristicas que tendran los objetos que se comporten de acuerdo a esa clase 

class Coche{
    #dentrto den las clases tenemos que crear las propiedades que son las caracteristicas que tendra el objeto estas pueden ser publicas o privadas

    #Las publicas son las que se pueden acceder desde cualquier parte del codigo SIN NINGUNA RESTRICCION
    #La privada solo se pueden acceder desde la misma clase NO PUEDE SER LLAMADA POR OTRAS CLASES NI HEREDARA A OTRAS CLASES
    public $marca;
    public $modelo;

    #metodo es un algoritmo asociado a un objeto que indica la capacidad de lo que este puede hacer.Es una funcion que hace taresa con las propiedades de la clases
    # la diferencia entre metodo y funcion es que el metodo esta asociado a un objeto y la funcion no.
    # dentro del metodo para llamar a una propiedad se usa $this->nombre de la propiedad
    public function mostrar(){
        echo "<p>Hola soy un $this->marca, modelo $this->modelo</p>";
    }
}

#Declaracion de un ObJETO
#Un objeto es una entidad que tiene propiedades y metodos

$coche1 = new Coche(); 
$coche1->marca = "Toyota";
$coche1->modelo = "Corolla";
$coche1->mostrar();

$coche2 = new Coche();
$coche2->marca = "Hyundai";
$coche2->modelo = "Accent";
$coche2->mostrar();


?>