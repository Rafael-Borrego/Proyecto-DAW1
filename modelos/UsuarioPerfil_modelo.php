<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto_daw1/database/Database.php";

class UsuarioPerfil_modelo
{
    private $conexion;

    /*Constructor en el que se crea la conexión a la DB*/
    public function __construct()
    {
        $database = new Database();
        $this->conexion = $database->conectar();
    }



    /*Inserta una fila de relacion usuario-perfil en la tabla Usuario_Perfil*/
    public function insertar_usuario_perfil($id_usuario, $id_perfil)
    {
        //SI NO EXISTE EL PERFIL O EL USUARIO NO VA A INSERTAR POR LA FOREIGN KEY!!!!!!!!


        $query = "INSERT INTO Usuario_Perfil (id_usuario, id_perfil) 
                  VALUES ($id_usuario, '$id_perfil')";
        $resultado = $this->conexion->query($query) or print_r($this->conexion->error . " No se pudo insertar correctamente");
        if (!$resultado) {
            return false;
        }
        return true;
    }


    /*Función que comprueba si existe relación entre un usuario y un perfil*/
    public function existe_relacion($id_usuario, $id_perfil){
        $query = "SELECT COUNT(*) FROM Usuario_Perfil WHERE id_usuario=$id_usuario AND id_perfil='$id_perfil'";
        $resultado = $this->conexion->query($query)->fetch_row()[0] or print_r($this->conexion->error . " No se pudo insertar correctamente");
        if ($resultado==0) {
            return false;
        }
        return true;
    }

}//FIN CLASE