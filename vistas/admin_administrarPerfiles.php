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

$modelo_perfiles = new Perfil_modelo();

/*Caso en que haya que eliminar un perfil*/
if (isset($_GET["del_perfil"])) {
    if (isset($_GET["id_perfil"])) {
        $modelo_perfiles->eliminar_perfil($_GET["id_perfil"]);
    }
}

/*Caso en que haya que actualizar un perfil*/
if (isset($_POST["submitted_actualizar"])) {
    $modelo_perfiles->actualizar_perfil($_POST["id_perfil"], $_POST["nombre_perfil"],
        $_POST["descripcion"], $_POST["url_imagen"],
        $_POST["num_seguidores"], $_POST["num_publicaciones"],
        $_POST["categoria"]);
}

$titulo_vista = "MIS PERFILES";

/*CONFIGURACIÓN DE LA PAGINACIÓN*/

/*CÁLCULO DE PARÁMETROS NECESARIOS PARA LA PAGINACIÓN*/
$num_filas_total = $modelo_perfiles->get_total_perfiles();
$filas_por_pagina = 5;
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
$link_anterior = ($pagina_actual > 1) ? '<a href="?pagina=1" title="Primera pagina">&laquo;</a> <a href="?pagina='
    . ($pagina_actual - 1) . '" title="Página anterior">&lsaquo;</a>' : '<span class="disabled">&laquo;
                    </span> <span class="disabled">&lsaquo;</span>';
$link_siguiente = ($pagina_actual < $num_paginas) ? '<a href="?pagina=' . ($pagina_actual + 1) .
    '" title="Pagina siguiente">&rsaquo;</a> <a href="?pagina=' . $num_paginas .
    '" title="Última página">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> 
                        <span class="disabled">&raquo;</span>';

$array_perfiles = $modelo_perfiles->get_pag_perfiles($filas_por_pagina,$offset_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../piezas/metas_head.php"); ?>
    <title><?= $titulo_vista ?></title>
    <!-- Bootstrap CSS-->
    <link href="../recursos/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Propio -->
    <link href="../recursos/css/admin_administrarPerfiles.css" rel="stylesheet">
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


        <div class="container" id="cont-table">
            <div class="row">
                <div class="col-md-12 col-md-offset-10">
                    <a href="../index.php?logout=1">
                        <button>
                            Logout
                        </button>
                    </a>
                </div>
                <div class="col-md-11">
                    <h1>Datos Perfiles</h1>
                    <div class="table-responsive">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                            <tr>
                                <th>id_perfil</th>
                                <th>nombre_perfil</th>
                                <th>descripción</th>
                                <th>categoria</th>
                                <th>Editar</th>
                                <th>Borrar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($array_perfiles as $perfil) {
                                include("../piezas/fila_tabla_admin_perfiles.php");
                            }
                            ?>
                            </tbody>
                        </table>
                    </div><!--table-responsive-->
                    <?='<div id="paginador"><p>', $link_anterior, ' Página ', $pagina_actual, ' de ',
                            $num_paginas, ' páginas, mostrando ', $inicio, '-', $final, ' de ', $num_filas_total,
                            ' resultados ', $link_siguiente, ' </p></div>';?>
                </div><!--columna principal-->
            </div><!--fila principal-->
        </div><!--container principal-->

        <!--DIÁLOGO EMERGENTE PARA ACTUALIZAR PERFIL-->
        <?php include("../piezas/modal_dialog_admin_perfiles.php"); ?>

    </div><!--ENVOLTORIO CONTENIDO PÁGINA-->
</div><!--ENVOLTORIO GENERAL-->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../recursos/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<!--JS Propio (necesita jQuery)-->
<script src="../recursos/js/admin_usuario.js"></script>
<!--Script para poblar el formulario con los datos del perfil-->
<script src="../recursos/js/poblar_modal_admin_perfiles.js"></script>


</body>

</html>