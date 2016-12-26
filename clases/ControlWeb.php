<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto_daw1/modelos/Usuario_modelo.php";


class ControlWeb
{

    function __construct()
    {

    }

    /*Redirecciona a una url dada*/
    public function redireccionar_a($url)
    {
        header("Location: $url");
        exit;
    }

    /*Realiza el proceso de logueo, guardando un array asociativo con los atributos del usuario en sesión*/
    public function login()
    {

        //SE COMPRUEBA QUE LOS CAMPOS NO ESTÉN VACÍOS
        if (empty($_POST['email_usuario'])) {
            print_r("El campo del email de usuario está vacío");
            return false;
        }
        if (empty($_POST['password_usuario'])) {
            print_r("El campo de la contraseña de usuario está vacío");
            return false;
        }

        //SE RECUPERAN LOS CAMPOS DE LA PETICIÓN POST
        $usuario = $_POST['email_usuario'];
        $password = $_POST['password_usuario'];

        //SE INICIA LA SESIÓN SI NO LO ESTÁ
        if (!isset($_SESSION)) {
            session_start();
        }

        //SE CREA EL MODELO PARA COMPROBAR EN DB
        $modelo_usuario = new Usuario_Modelo();

        //SE COMPRUEBAN EN DB LAS CREDENCIALES DE LOGIN
        if (!$modelo_usuario->comprobar_login_usuario($usuario, $password)) {
            return false;
        }

        //SE AÑADE A LA VARIABLE DE SESIÓN UN CAMPO CON EL OBJETO USUARIO DEL USUARIO LOGUEADO
        $_SESSION["usuario_logueado"] = $modelo_usuario->get_usuario_de_email_pass($usuario,$password);

        return true;
    }

    /*Función que, mirando la variable de sesión,
      devuelve true si un usuario está logueado o false en caso contrario */
    public function esta_usuario_logueado()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if (empty($_SESSION["usuario_logueado"])) {
            return false;
        }
        return true;
    }

    function registrar($email, $password, $tipo_usuario, $nombre_usuario, $nombre_completo, $sexo, $descripcion)
    {
        //VALIDAR CAMPOS FORMULARIOS

        $modelo_usuario = new Usuario_Modelo();
        if (!$modelo_usuario->insertar_usuario($email, $password, $tipo_usuario, $nombre_usuario, $nombre_completo, $sexo, $descripcion))
        {
            return false;
        }
        return true;
    }


}//FIN CLASE