<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/clases/ControlWeb.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/clases/ScraperInstagram.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/modelos/Perfil_modelo.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/modelos/Publicacion_modelo.php";

function pretty_print($elemento = false)
{
    echo "\n<pre style=\"background: #FFFF99; font-size: 10px;\">\n";
    $elemento = print_r($elemento, true);
    echo $elemento . "\n</pre>\n";
}

/*SE COMPRUEBA SI EL USUARIO ESTÁ LOGUEADO, SI NO LO ESTÁ, SE REDIRECCIONA AL INDEX.PHP*/
$control_web = new ControlWeb();

if (!$control_web->esta_usuario_logueado()) {
    $control_web->redireccionar_a("../index.php");
}

/*SE RECUPERA DE LA VARIABLE DE SESIÓN EL NOMBRE DEL USUARIO LOGUEADO*/
$nombre_usuario_logueado = $_SESSION["usuario_logueado"]["nombre_usuario"];

$titulo_vista = "AÑADIR NUEVO PERFIL";

$modelo_perfiles = new Perfil_modelo();
$modelo_publicaciones = new Publicacion_Modelo();
$realizar_busqueda = false;
$insertar_perfil = false;

/*SI SE HIZO UNA BÚSQUEDA (VIENE EL PARÁMETRO SUBMITTED EN LA PETICIÓN GET)*/
if (isset($_GET["submitted"]) && isset($_GET["expresion"]) && $_GET["expresion"] != '') {
    $realizar_busqueda = true;
}

/*CASO INSERCIÓN DE PERFIL*/
if (isset($_GET["insertar_perfil"]) && isset($_GET["nombre_perfil"]) && $_GET["nombre_perfil"] != '') {
    $insertar_perfil = true;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../piezas/metas_head.php"); ?>
    <title><?= $titulo_vista ?></title>
    <!-- Bootstrap CSS-->
    <link href="../recursos/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Propio -->
    <link href="../recursos/css/admin_nuevo_perfil.css" rel="stylesheet">
    <!--Searchbox-->
    <link rel="stylesheet" href="../recursos/css/awesomplete.css"/>
    <script src="../recursos/js/awesomplete.js" async></script>
</head>

<body>
<!--ENVOLTORIO GENERAL-->
<div id="wrapper">
    <!--<div class="capa-transparencia"></div>-->

    <!--MENÚ LATERAL-->
    <?php include("../piezas/menu_lateral_admin.php"); ?>

    <!--ENVOLTORIO CONTENIDO PÁGINA-->
    <div id="page-content-wrapper">

        <!--BOTÓN HAMBURGUESA-->
        <?php include("../piezas/boton_hamburguesa.php"); ?>

        <!--CONTAINER PARA GRID BOOTSTRAP-->
        <div class="container">
            <!--FILA PRINCIPAL BOOTSTRAP-->
            <div class="row">
                <div class="col-md-12 col-md-offset-10">
                    <a href="../index.php?logout=1">
                        <button class="btn btn-danger">
                            Logout
                        </button>
                    </a>
                </div>
                <!--COLUMNA PRINCIPAL BOOTSTRAP-->
                <div id="columna-principal"
                     class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">

                    <br>
                    <h1>Añadir Nuevo Perfil</h1>
                    <br>
                    <br>
                    <br>

                    <form action="admin_nuevo_perfil.php">
                        <input type="hidden" name="submitted" value="1">
                        <input type="text" name="expresion">
                        <input type="submit" value="Buscar"><br><br>
                    </form>

                    <?php
                    if ($realizar_busqueda) {
                        $scrapper_Inst = new ScrapperInstagram();
                        $perfiles_encontrados = $scrapper_Inst->buscar_perfiles($_GET["expresion"]);
                        foreach ($perfiles_encontrados as $perfil) {
                            include("../piezas/columna_admin_nuevo_perfil.php");
                        }
                        pretty_print($perfiles_encontrados[0]);
                    }
                    if ($insertar_perfil) {
                        $scrapper = new ScrapperInstagram($_GET["nombre_perfil"]);
                        //INSERCIÓN EN DB DEL PERFIL
                        if (!$modelo_perfiles->insertar_perfil($scrapper->id_usuario, $scrapper->nombre_usuario, $scrapper->descripcion,
                            $scrapper->url_imagen, $scrapper->numero_seguidores, $scrapper->numero_publicaciones,
                            "")
                        ) {
                            print_r("Fallo en la inserción del perfil $scrapper->nombre_usuario (YA EXISTE EL PERFIL EN EL SISTEMA)" . "<br/>");
                        } else {

                            //DESCARGA E INSERCIÓN EN DB DE PUBLICACIONES
                            $array_publicaciones = $scrapper->descargar_array_media();
                            foreach ($array_publicaciones as $indice => $publicacion) {
                                if (!$modelo_publicaciones->insertar_publicacion($publicacion["id_publicacion"], $publicacion["titulo"],
                                    $publicacion["fecha_creacion"], $publicacion["ruta_recurso_media"], $publicacion["texto"], $publicacion["origen_publicacion"],
                                    $publicacion["tipo_recurso_media"], $publicacion["id_perfil"])
                                ) {
                                    print_r("  Fallo en la inserción de publicación de $scrapper->nombre_usuario " . "(Posiblemente Repetido)<br/>");
                                }
                            }
                        }
                    }
                    ?>

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