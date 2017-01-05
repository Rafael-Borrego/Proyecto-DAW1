<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/clases/ControlWeb.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/modelos/Perfil_modelo.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/modelos/Publicacion_modelo.php";

/*SE COMPRUEBA SI EL USUARIO ESTÁ LOGUEADO, SI NO LO ESTÁ, SE REDIRECCIONA AL INDEX.PHP*/
$control_web = new ControlWeb();

if (!$control_web->esta_usuario_logueado()) {
    $control_web->redireccionar_a("../index.php");
}

/*SE RECUPERA DE LA VARIABLE DE SESIÓN EL NOMBRE DEL USUARIO LOGUEADO*/
$nombre_usuario_logueado = $_SESSION["usuario_logueado"]["nombre_usuario"];

$modelo_perfiles = new Perfil_modelo();
$perfil = $modelo_perfiles->get_perfil_de_nombre($_GET["nombre_perfil"]);

/*SE COMPRUEBA SI EL PARÁMETRO GET CORRESPONDE A UN PERFIL VÁLIDO Y SE PUEBLA LA VISTA*/
if (!$perfil){
    $control_web->redireccionar_a("usuario_mis_perfiles.php");
}

$modelo_publicaciones = new Publicacion_Modelo();


/*CONFIGURACIÓN DE LA PAGINACIÓN*/

/*CÁLCULO DE PARÁMETROS NECESARIOS PARA LA PAGINACIÓN*/
$num_filas_total = $modelo_publicaciones->get_num_publicaciones_perfil($perfil["id_perfil"]);
$filas_por_pagina = 4;
$num_paginas = ceil($num_filas_total / $filas_por_pagina);
$pagina_actual = min($num_paginas, filter_input(INPUT_GET, 'pagina', FILTER_VALIDATE_INT, array(
    'options' => array(
        'default' => 1,
        'min_range' => 1,
    ),
)));
$offset_query = (($pagina_actual - 1) * $filas_por_pagina);
$inicio = $offset_query + 1;
$final = min(($offset_query + $filas_por_pagina), $num_filas_total);

/*DECLARACIÓN DE LOS LINKS DEL PAGINADOR*/
$link_anterior = ($pagina_actual > 1) ? '<a href="?nombre_perfil='.$_GET["nombre_perfil"].
                    '&pagina=1" title="Primera pagina">&laquo;</a> <a href="?nombre_perfil='.$_GET["nombre_perfil"].'&pagina='
                    . ($pagina_actual - 1) . '" title="Página anterior">&lsaquo;</a>' : '<span class="disabled">&laquo;
                    </span> <span class="disabled">&lsaquo;</span>';
$link_siguiente = ($pagina_actual < $num_paginas) ? '<a href="?nombre_perfil='
                    .$_GET["nombre_perfil"].'&pagina=' . ($pagina_actual + 1) .
                    '" title="Pagina siguiente">&rsaquo;</a> <a href="?nombre_perfil='.$_GET["nombre_perfil"].'&pagina=' . $num_paginas .
                    '" title="Última página">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> 
                        <span class="disabled">&raquo;</span>';

/*POBLACIÓN DE LA VISTA*/
$publicaciones_perfil = $modelo_publicaciones->get_publicaciones_perfil_pag($perfil["id_perfil"],$filas_por_pagina, $offset_query);
$array_publicaciones_vista = array();
foreach ($publicaciones_perfil as $indice => $elemento){
    $array_publicaciones_vista[$indice]["titulo_publicacion"] = $elemento["titulo"];
    $array_publicaciones_vista[$indice]["tipo_publicacion"] = $elemento["tipo_recurso_media"];
    $array_publicaciones_vista[$indice]["src_publicacion"] = $elemento["ruta_recurso_media"];
    //"http://localhost/proyecto_daw1/descargas_rrss/instagram/leomessi/2015-07-13_18-51-40.png"
    $array_publicaciones_vista[$indice]["texto_publicacion"] = $elemento["texto"];
}

$array_perfiles = [
    "nombre_perfil" => $perfil["nombre_perfil"],
    "imagen_perfil" => $perfil["url_imagen"],
    "descripcion_perfil" => $perfil["descripcion"],
    "publicaciones" => $array_publicaciones_vista,
];

$titulo_vista = "PERFIL DE ".$array_perfiles["nombre_perfil"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../piezas/metas_head.php"); ?>
    <title><?= $titulo_vista ?></title>
    <!-- Bootstrap CSS-->
    <link href="../recursos/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Propio -->
    <link href="../recursos/css/usuario_perfil_particular.css" rel="stylesheet">
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

                    <!--FILA IMAGEN PERFIL-->
                    <?php include("../piezas/fila_imagen_perfil_particulares.php"); ?>

                    <?php //pretty_print($array_publicaciones_vista)?>

                    <!--CONTENIDO VISTA-->
                    <?php
                    foreach (range(0, sizeof($array_publicaciones_vista)-1) as $indice) {
                        include("../piezas/columna_perfil_particular.php");
                    }
                    echo '<div id="paginador"><p>', $link_anterior, ' Página ', $pagina_actual, ' de ',
                            $num_paginas, ' páginas, mostrando ', $inicio, '-', $final, ' de ', $num_filas_total,
                            ' resultados ', $link_siguiente, ' </p></div>';
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