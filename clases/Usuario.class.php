<?php

class Usuario
{
    private $id_usuario;
    private $email;
    private $contrasena;
    private $tipo_usuario;
    private $nombre_usuario;
    private $nombre_completo;
    private $sexo;
    private $descripcion;

    public function __GET($clave){ return $this->$clave; }
    public function __SET($clave, $valor){ return $this->$clave = $valor; }

}