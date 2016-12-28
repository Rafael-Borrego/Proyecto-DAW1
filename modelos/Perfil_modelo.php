<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto_daw1/database/Database.php";

class Perfil_modelo
{
    private $conexion;

    /*Constructor en el que se crea la conexión a la DB*/
    public function __construct()
    {
        $database = new Database();
        $this->conexion =  $database->conectar();
    }

    /*Devuelve un array asociativo con todos los perfiles de la DB*/
    public function get_all_perfiles()
    {
        $query = "SELECT * FROM Perfil";
        $resultado = $this->conexion->query($query)->fetch_all(MYSQLI_ASSOC);

        return $resultado;
    }

    /*Devuelve un array asociativo con todos los perfiles de la DB ordenados por nombre de perfil*/
    public function get_pag_perfiles($filas_por_pagina, $offset)
    {
        $query = "SELECT * FROM Perfil ORDER BY nombre_perfil LIMIT $filas_por_pagina OFFSET $offset";
        $resultado = $this->conexion->query($query)->fetch_all(MYSQLI_ASSOC) or die ($this->conexion->error . " No se pudieron recuperar los datos correctamente");

        return $resultado;
    }

    /*Devuelve un array asociativo con todos los perfiles de la DB para una categoría*/
    public function get_perfiles_categoria($categoria)
    {
        $query = "SELECT * FROM Perfil WHERE categoria='$categoria'";
        $resultado = $this->conexion->query($query)->fetch_all(MYSQLI_ASSOC);

        return $resultado;
    }


    /*A partir de un id de perfil, devuelve un array asociativo con sus atributos*/
    public function get_perfil_de_id($id)
    {
        $query = "SELECT * FROM Perfil WHERE id_perfil='$id'";

        $resultado = $this->conexion->query($query);

        if ($resultado->num_rows<=0){return false;}

        $perfil = $resultado->fetch_assoc();
        return $perfil;
    }

    /*A partir de un nombre de perfil, devuelve un array asociativo con sus atributos*/
    public function get_perfil_de_nombre($nombre_perfil)
    {
        $query = "SELECT * FROM Perfil WHERE nombre_perfil='$nombre_perfil'";

        $resultado = $this->conexion->query($query);

        if ($resultado->num_rows<=0){return false;}

        $perfil = $resultado->fetch_assoc();
        return $perfil;
    }


    /*Inserta un perfil nuevo en la tabla Perfil*/
    public function insertar_perfil($id_perfil, $nombre_perfil, $descripcion, $url_imagen, $num_seguidores,
                                     $num_publicaciones, $categoria)
    {
        $query = "INSERT INTO Perfil (id_perfil, nombre_perfil, descripcion, url_imagen, num_seguidores, 
                                      num_publicaciones, categoria) 
                  VALUES ('$id_perfil', '$nombre_perfil', '$descripcion', '$url_imagen', $num_seguidores,
                          $num_publicaciones, '$categoria')";
        $resultado = $this->conexion->query($query)/* or die ($this->conexion->error . " No se pudo insertar correctamente")*/;
        if (!$resultado) {return false;}
        return true;
    }

    /*Actualiza los datos de un perfil*/
    public function actualizar_perfil($id_perfil, $nombre_perfil, $descripcion, $url_imagen, $num_seguidores,
                                      $num_publicaciones, $categoria)
    {
        $query = "UPDATE Usuario 
                  SET id_perfil='$id_perfil', nombre_perfil='$nombre_perfil', descripcion='$descripcion', url_imagen='$url_imagen',
                      num_seguidores='$num_seguidores', num_publicaciones='$num_publicaciones', categoria='$categoria'
                  WHERE id_perfil='$id_perfil'";
        $resultado = $this->conexion->query($query);// or die ($this->conexion->error . " No se pudo actualizar correctamente");;
        if (!$resultado) {return false;}

        return true;
    }
}