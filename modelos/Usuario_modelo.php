<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto_daw1/database/Database.php";

class Usuario_Modelo
{
    private $conexion;

    /*Constructor en el que se crea la conexión a la DB*/
    public function __construct()
    {
        $database = new Database();
        $this->conexion =  $database->conectar();
    }

    /*Devuelve un array asociativo con todos los usuarios de la DB*/
    public function get_array_usuarios()
    {
        $query = "SELECT * FROM Usuario";
        $resultado = $this->conexion->query($query)->fetch_all(MYSQLI_ASSOC);

        return $resultado;
    }

    /*Comprueba si existen las credenciales de logueo (email, password) en la DB*/
    public function comprobar_login_usuario($email, $password)
    {
        $query = "SELECT email, contrasena FROM Usuario WHERE email='$email' AND contrasena='$password'";

        $num_resultados = $this->conexion->query($query)->num_rows;

        if ($num_resultados<=0) {return false;}
        else {return true;}
    }

    /*A partir de un id de usuario, devuelve un array asociativo con sus atributos*/
    public function get_usuario_de_id($id)
    {
        $query = "SELECT * FROM Usuario WHERE id_usuario='$id'";

        $resultado = $this->conexion->query($query);

        if ($resultado->num_rows<=0){return false;}

        $usuario = $resultado->fetch_assoc();
        return $usuario;
    }

    /*A partir de email y password de usuario, devuelve un array asociativo con sus atributos*/
    public function get_usuario_de_email_pass($email, $password)
    {
        $query = "SELECT * FROM Usuario WHERE email='$email' AND contrasena='$password'";

        $resultado = $this->conexion->query($query);

        if ($resultado->num_rows<=0){return false;}

        $array_usuario = $resultado->fetch_assoc();

        return $array_usuario;
    }

    /*Inserta un usuario nuevo en la tabla Usuarios*/
    public function insertar_usuario($email, $password, $tipo_usuario, $nombre_usuario, $nombre_completo, $sexo, $descripcion)
    {
        $query = "INSERT INTO Usuario (email, contrasena, tipo_usuario, nombre_usuario, nombre_completo, sexo, descripcion) 
                  VALUES ('$email', '$password', '$tipo_usuario', '$nombre_usuario', '$nombre_completo', '$sexo', '$descripcion')";
        $resultado = $this->conexion->query($query);// or die ($this->conexion->error . "Data cannot be inserted");;
        if (!$resultado) {return false;}
        return true;
    }
}