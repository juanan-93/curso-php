<?php

    // Para usar el modelo que realiza las conexiones a la base de datos
    require_once "conexion.php";

    class ModeloFormularios{

        // registro
        // recibimos los datos del controlador atraves de parametros recibiremos dos datos el nombre de la tabla y los datos
        static public function mdlRegistro ($tabla, $datos){

            // declaramos la variable $stmt que contendra la conexion a la base de datos a traves de la instancia conexion::conectar()
            // A continucaion de esta declaramos la sentencia sql que insertara los datos en la tabla con ->prepare( y dentro de esta la sentencia sql)
            // Los valores o value estan puestos con :nombre, :email, :password para ponerlos de manera segura o culta ya que atraves de la funcion 
            // bindParam se le asignara un valor a cada uno de estos valores
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, password) VALUES (:nombre, :email, :password)");

            // bindParam asigna un valor a un parametro oculto que solo los que hemos puesto en la sentencia sql pueden ver con :nombre, :email, :password
            // bindParam("nombre del parametro", $variable que contiene el valor, tipo de dato que se pone con la sintaxis PDO::PARAM_STR)las ultimas siglas son el tipo de dato str es de string
            // en este caso asignamos el valor de $datos["nombre"] al parametro :nombre
            $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);

            // si la sentencia se ejecuta correctamente lo sabremos  atraves de la funcion execute() que esta devolvera ture y se ejecutara el codigo return ok
            if($stmt -> execute()){
                return "ok";
            }else{
                // si no se ejecuta correctamente
                print_r(Conexion::conectar()->errorInfo());
            } {
                // Para reforzar la seguridad de la base de datos, se debe cerrar la conexión a la base de datos 
                // ya que si pasa al else esta queda abierta para eso cerraremos la conexion y el objeto $stmt
                // stmt close cierra la conexion a la base de datos
                // $stmt -> close(); no es necesario ta que stmt = null ya cierra la conexion y el objeto stmt pero para que sepas lo que hace
                // stmt = null cierra el objeto stmt
                $stmt = null;
            }
        }

        // metodo mostrar registros y realizar el ingreso
        static public function mdlSeleccionarRegistros($tabla, $item = null, $valor = null){
            
            if($item == null && $valor == null){ //aqui se realiza la consulta para mostrar los registros por completo
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
                if($stmt->execute()){
                    return $stmt->fetchAll();
                }else{
                    print_r(Conexion::conectar()->errorInfo());
                }
            } else {//aqui se realiza la consulta para el ingreso
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");
                $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
                if($stmt->execute()){
                    return $stmt->fetch(); // Utiliza fetch() ya que esperas un único resultado
                }else{
                    print_r(Conexion::conectar()->errorInfo());
                }
            }
            $stmt = null;
        }

        // metodo actualizar registro
        static public function mdlActualizarRegistro($tabla, $datos){
            // declaramos la variable stmt que contendra la conexion a la base de datos a traves de la instancia conexion::conectar()
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, email = :email, password = :password WHERE id = :id");
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
            if($stmt->execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt = null;
        }


    }
?>