<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/clases/ControlWeb.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/modelos/Perfil_modelo.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/modelos/Usuario_modelo.php";


/*SE COMPRUEBA SI EL USUARIO ESTÁ LOGUEADO, SI NO LO ESTÁ, SE REDIRECCIONA AL INDEX.PHP*/
$control_web = new ControlWeb();

if (!$control_web->esta_usuario_logueado()) {
    $control_web->redireccionar_a("../index.php");
}

/*SE RECUPERA DE LA VARIABLE DE SESIÓN EL NOMBRE DEL USUARIO LOGUEADO*/
$nombre_usuario_logueado = $_SESSION["usuario_logueado"]["nombre_usuario"];
$modelo_usuarios = new Usuario_Modelo();
$usuario = $modelo_usuarios->get_usuario_de_nombre($nombre_usuario_logueado);

/*CASO QUE HAYA QUE AÑADIR UN PERFIL A LA LISTA DE SEGUIDOS*/
if (isset($_GET["add_perfil"])) {
    if (isset($_GET["id_perfil"])) {
        $modelo_usuarios->add_perfil_a_seguidos($usuario[id_usuario], $_GET["id_perfil"]);
    }
}

/*CASO QUE HAYA QUE QUITAR UN PERFIL DE LA LISTA DE SEGUIDOS*/
if (isset($_GET["del_perfil"])) {
    if (isset($_GET["id_perfil"])) {
        $modelo_usuarios->quitar_perfil_de_seguidos($usuario[id_usuario], $_GET["id_perfil"]);
    }
}

$modelo_perfiles = new Perfil_modelo();
$titulo_vista = "MIS PERFILES";


$array_perfiles = $modelo_usuarios->get_all_perfiles_usuario($usuario["id_usuario"]);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../piezas/metas_head.php"); ?>
    <title><?= $titulo_vista ?></title>
    <!-- Bootstrap CSS-->
    <link href="../recursos/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Propio -->
    <link href="../recursos/css/usuario_mis_perfiles.css" rel="stylesheet">
</head>

<body>
<!--ENVOLTORIO GENERAL-->
<div id="wrapper">
    <!--<div class="capa-transparencia"></div>-->

    <!--MENÚ LATERAL-->
    <?php include("../piezas/menu_lateral.php"); ?>

    <!--ENVOLTORIO CONTENIDO PÁGINA-->
    <div id="page-content-wrapper">

        <!--BOTÓN HAMBURGUESA-->
        <?php include("../piezas/boton_hamburguesa.php"); ?>

        <!--CONTAINER PARA GRID BOOTSTRAP-->
        <div class="container">
            <!--FILA PRINCIPAL BOOTSTRAP-->
            <div class="row">
                <!--COLUMNA PRINCIPAL BOOTSTRAP-->
                <div id="columna-principal"
                     class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">

                    <!--CABECERA TÍTULO VISTA-->
                    <?php include("../piezas/cabecera_titulo_vista.php"); ?>

                    <!--ICONO USUARIO-LOGOUT-->
                    <?php include("../piezas/icono_usuario_logout.php"); ?>

                    <!--CONTENIDO VISTA-->
                    <div class="clearfix">

                        <?php
                        //Si hay algún perfil en la lista de seguidos del usuario
                        if (!empty($array_perfiles)) {
                            foreach (range(0, sizeof($array_perfiles) - 1) as $indice) {
                                include("../piezas/columna_mis_perfiles.php");
                            }
                        } else {
                            print_r("<h4>NO ESTÁS SIGUIENDO A NINGÚN PERFIL</h4>");
                        }
                        ?>
                    </div><!--CONTENIDO VISTA-->

                </div><!--COLUMNA PRINCIPAL BOOTSTRAP-->
            </div><!--FILA PRINCIPAL BOOTSTRAP-->
        </div><!--CONTAINER PARA GRID BOOTSTRAP-->
    </div><!--ENVOLTORIO CONTENIDO PÁGINA-->
</div><!--ENVOLTORIO GENERAL-->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../recursos/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<!--JS Propio (necesita jQuery)-->
<script src="../recursos/js/admin_usuario.js"></script>
</body>

</html>