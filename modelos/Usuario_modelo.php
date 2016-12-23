<?php

class Usuario_Modelo
{
    private $conexion;

    public function __construct()
    {
        $database = new Database();
        $this->conexion =  $database->conectar();
    }

    public function get_array_usuarios()
    {

        $resultado = $this->conexion->query("SELECT * FROM Usuario")->fetch_all(MYSQLI_ASSOC);

        $array_usuarios = array();
        

        return $resultado;
    }
}