

<?php
    class Conexion{
         // creamos un metodo estatico para poder llamarlo sin instanciar la clase
         public static function conectar(){
            // creamos una instancia de la clase PDO
            // A continuacion por parametros le pasamos el nombre del servidor, el nombre de la base de datos, el usuario y la contraseña
            // estos parametros se colocan de la siguiente manera dejando fijo del igual hacia atras  mysql:host=aqui va el nombre de tu servidor;dbname=aqui va el nombre de tu base de datos,
            // luego el usuario y la contraseña. Al usar un servidro local usaremos el de phpmyadmin que por defecto viene sin contraseña y los puedes ver en el 
            // en el apartado cuentas de usuario. Este se pone de diferente manera sin poner iguales directamente los parametrossi no hay contraseña se deja el campo vacio
            $link = new PDO("mysql:host=localhost;dbname=curso-php","root","");
            // para que se pueda visualizar los caracteres especiales como las tildes y las ñ se coloca el siguiente codigo
            $link->exec("set names utf8");
            return $link;
            
         }
 
    }
?>