<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto_daw1/clases/ControlWeb.php";

/*SE COMPRUEBA SI EL USUARIO ESTÁ LOGUEADO, SI NO LO ESTÁ, SE REDIRECCIONA AL INDEX.PHP*/
$control_web = new ControlWeb();

if (!$control_web->esta_usuario_logueado())
{
    $control_web->redireccionar_a("../index.php");
}

/*SE RECUPERA DE LA VARIABLE DE SESIÓN EL NOMBRE DEL USUARIO LOGUEADO*/
$nombre_usuario_logueado = $_SESSION["usuario_logueado"]["nombre_usuario"];

//LA VISTA TIENE QUE RECIBIR UN ARRAY ASOCIATIVO CON LAS CATEGORÍAS POPULARES Y LOS PERFILES!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$titulo_vista = "PERFILES POPULARES";
$nombre_categoria = "CATEGORIA PRUEBA 1";
$array_perfiles_populares = [
    ["nombre_perfil" => "perfil_prueba1",
        "ruta_imagen_perfil" => "../recursos/imagenes/instagram-generic-1920.jpg\" alt=\"sample102"],
    ["nombre_perfil" => "perfil_prueba2",
        "ruta_imagen_perfil" => "../recursos/imagenes/twitter_1200.jpg\" alt=\"sample102"],
    ["nombre_perfil" => "perfil_prueba3",
        "ruta_imagen_perfil" => "../recursos/imagenes/youtube_1200.jpg\" alt=\"sample102"],
];


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../piezas/metas_head.php"); ?>
    <title><?= $titulo_vista?></title>
    <!-- Bootstrap CSS-->
    <link href="../recursos/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Propio -->
    <link href="../recursos/css/usuario_populares.css" rel="stylesheet">
    <script src="../recursos/sweetalert/js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../recursos/sweetalert/css/sweetalert.css">
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

                    <button class="mostrar_dialogo">Mostrar diálogo</button>

                    <!--CONTENIDO VISTA-->
                    <?php
                    foreach (range(0, 3) as $indice) {
                        include("../piezas/fila_categoría_populares.php");
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
<!-- Script para ventana emergente-->
<script src="../recursos/js/dialogos_emergentes.js"></script>

</body>

</html>