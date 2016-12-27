<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto_daw1/database/Database.php";

class Publicacion_Modelo
{
    private $conexion;

    /*Constructor en el que se crea la conexión a la DB*/
    public function __construct()
    {
        $database = new Database();
        $this->conexion =  $database->conectar();
    }

    /*Devuelve un array asociativo con todos las publicaciones de la DB*/
    public function get_all_publicaciones()
    {
        $query = "SELECT * FROM Publicacion";
        $resultado = $this->conexion->query($query)->fetch_all(MYSQLI_ASSOC);

        return $resultado;
    }

    /*Devuelve un array asociativo con todos las publicaciones de un perfil de la DB*/
    public function get_publicaciones_perfil($id_perfil)
    {
        $query = "SELECT * FROM Publicacion WHERE id_perfil='$id_perfil'";
        $resultado = $this->conexion->query($query)->fetch_all(MYSQLI_ASSOC);

        return $resultado;
    }

    /*Inserta una publicación en la tabla Publicacion*/
    public function insertar_publicacion($id_publicacion, $titulo, $fecha_creacion, $ruta_recurso_media, $texto, $id_perfil)
    {
        //SI NO EXISTE EL PERFIL NO VA A INSERTAR POR LA FOREIGN KEY!!!!!!!!

        $query = "INSERT INTO Publicacion (id_publicacion, titulo, fecha_creacion, ruta_recurso_media, texto, id_perfil) 
                  VALUES ('$id_publicacion', '$titulo', '$fecha_creacion', '$ruta_recurso_media', '$texto', '$id_perfil')";
        $resultado = $this->conexion->query($query)/* or die ($this->conexion->error . " No se pudo insertar correctamente")*/;
        if (!$resultado) {return false;}
        return true;
    }
}