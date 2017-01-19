<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/clases/ControlWeb.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/proyecto_daw1/modelos/Usuario_modelo.php";


/*SE COMPRUEBA SI EL USUARIO ESTÁ LOGUEADO, SI NO LO ESTÁ, SE REDIRECCIONA AL INDEX.PHP*/
$control_web = new ControlWeb();

if (!$control_web->esta_usuario_logueado()) {
    $control_web->redireccionar_a("../index.php");
}

/*SE RECUPERA DE LA VARIABLE DE SESIÓN EL NOMBRE DEL USUARIO LOGUEADO*/
$nombre_usuario_logueado = $_SESSION["usuario_logueado"]["nombre_usuario"];

$modelo_usuarios = new Usuario_Modelo();

/*Caso en que haya que eliminar un usuario*/
if (isset($_GET["del_usuario"])) {
    if (isset($_GET["id_usuario"])) {
        $modelo_usuarios->eliminar_usuario($_GET["id_usuario"]);
    }
    /*Caso en que se quiera eliminar el usuario logueado*/
    if ($_GET["id_usuario"]==$_SESSION["usuario_logueado"]["id_usuario"]){
        $control_web->logout();
        $control_web->redireccionar_a("../index.php");
    }
}

/*Caso en que haya que actualizar un usuario*/
if (isset($_POST["submitted_actualizar"])) {
    $modelo_usuarios->actualizar_usuario($_POST["id_usuario"], $_POST["email"],
        $_POST["contrasena"], $_POST["tipo_usuario"],
        $_POST["nombre_usuario"], $_POST["nombre_completo"],
        $_POST["sexo"], $_POST["descripcion"]);
}

$titulo_vista = "ADMINISTRAR USUARIOS";


/*CONFIGURACIÓN DE LA PAGINACIÓN*/

/*CÁLCULO DE PARÁMETROS NECESARIOS PARA LA PAGINACIÓN*/
$num_filas_total = $modelo_usuarios->get_total_usuarios();
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

$array_usuarios = $modelo_usuarios->get_pag_usuarios($filas_por_pagina,$offset_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../piezas/metas_head.php"); ?>
    <title><?= $titulo_vista ?></title>
    <!-- Bootstrap CSS-->
    <link href="../recursos/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Propio -->
    <link href="../recursos/css/admin_administrarUsuarios.css" rel="stylesheet">
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
                        <button class="btn btn-danger">
                            Logout
                        </button>
                    </a>
                </div>
                <div class="col-md-11">
                    <h1>Datos Usuarios</h1>
                    <div class="table-responsive">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                            <tr>
                                <th>email</th>
                                <th>contrasena</th>
                                <th>tipo_usuario</th>
                                <th>nombre_usuario</th>
                                <th>nombre_completo</th>
                                <th>sexo</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($array_usuarios as $usuario) {
                                include("../piezas/fila_tabla_admin_usuarios.php");
                            }
                            ?>


                            </tbody>
                        </table>
                        <br>
                        <!--<button class="abrir_modal_crear btn btn-primary" data-toggle="modal"
                                data-target="#crear">Crear Usuario
                        </button>-->
                        <br>
                    </div><!--table-responsive-->
                    <?='<div id="paginador"><p>', $link_anterior, ' Página ', $pagina_actual, ' de ',
                            $num_paginas, ' páginas, mostrando ', $inicio, '-', $final, ' de ', $num_filas_total,
                            ' resultados ', $link_siguiente, ' </p></div>';?>
                </div><!--columna principal-->
            </div><!--fila principal-->
        </div><!--container principal-->

        <!--DIÁLOGO EMERGENTE PARA ACTUALIZAR USUARIO-->
        <?php include("../piezas/modal_dialog_admin_usuarios.php"); ?>



    </div><!--ENVOLTORIO CONTENIDO PÁGINA-->
</div><!--ENVOLTORIO GENERAL-->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../recursos/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<!--JS Propio (necesita jQuery)-->
<script src="../recursos/js/admin_usuario.js"></script>
<!--Script para poblar el formulario con los datos del usuario-->
<script src="../recursos/js/poblar_modal_admin_usuarios.js"></script>


</body>

</html>