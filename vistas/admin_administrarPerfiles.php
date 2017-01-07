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
if (isset($_GET["del_perfil"])){
    if (isset($_GET["id_perfil"])){
        $modelo_perfiles->eliminar_perfil($_GET["id_perfil"]);
    }
}

/*Caso en que haya que actualizar un perfil*/
if (isset($_POST["submitted_actualizar"])){
    $modelo_perfiles->actualizar_perfil($_POST["id_perfil"], $_POST["nombre_perfil"],
                                        $_POST["descripcion"], $_POST["url_imagen"],
                                        $_POST["num_seguidores"], $_POST["num_publicaciones"],
                                        $_POST["categoria"]);
}

$titulo_vista = "MIS PERFILES";


$array_perfiles = $modelo_perfiles->get_all_perfiles();
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
                    <a href="../index.php?logout=1"><button>
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
                </div><!--columna principal-->
            </div><!--fila principal-->
        </div><!--container principal-->


        <div class="modal fade" id="edit" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Editar Usuario</h3>
                    </div>

                    <form class="form_actualizar" action="admin_administrarPerfiles.php" method="post">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="control-label">Nombre de Perfil</label>

                                    <!--CAMPOS OCULTOS CON EL RESTO DE ATRIBUTOS DE PERFIL Y EL CONTROL DE SUBMIT-->
                                    <input type="text" name="submitted_actualizar" value="1" hidden="true">
                                    <input type="text" class="modal-id_perfil" name="id_perfil" hidden="true">
                                    <input type="text" class="modal-url_imagen" name="url_imagen" hidden="true">
                                    <!--CAMPOS OCULTOS CON EL RESTO DE ATRIBUTOS DE PERFIL Y EL CONTROL DE SUBMIT-->

                                    <input type="text" class="modal-nombre_perfil form-control" required="required" name="nombre_perfil">
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Número de seguidores</label>
                                    <input type="text" class="modal-num_seguidores form-control"  required="required" name="num_seguidores">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="control-label">Descripción</label>
                                    <textarea class="modal-descripcion form-control" rows="8"  name="descripcion"></textarea>
                                </div>

                                <div class="col-sm-6">
                                    <label class="control-label">Número de publicaciones</label>
                                    <input type="text" class="modal-num_publicaciones form-control" required="required" name="num_publicaciones">
                                </div>

                                <div class="col-sm-6">
                                    <br>
                                    <label class="control-label">Categoría</label>
                                    <input type="text" class="modal-categoria form-control" required="required" name="categoria">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Cerrar</button>
                            <button type="submit" value=" Send" class="btn btn-success" id="submit"><i class="glyphicon glyphicon-inbox"></i> Modificar</button>
                        </div>
                </div>
            </div>
        </div>


        </div>
    </div><!--ENVOLTORIO CONTENIDO PÁGINA-->
</div><!--ENVOLTORIO GENERAL-->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../recursos/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<!--JS Propio (necesita jQuery)-->
<script src="../recursos/js/admin_usuario.js"></script>

<!--Script para poblar el formulario con los datos del perfil-->
<script>
    $(document).on("click", ".abrir_modal_actualizar", function () {
        var id_perfil = $(this).data('id_perfil');
        var nombre_perfil = $(this).data('nombre_perfil');
        var descripcion = $(this).data('descripcion');
        var url_imagen = $(this).data('url_imagen');
        var num_seguidores = $(this).data('num_seguidores');
        var num_publicaciones = $(this).data('num_publicaciones');
        var categoria = $(this).data('categoria');
        $(".modal-id_perfil").val(id_perfil);
        $(".modal-nombre_perfil").val(nombre_perfil);
        $(".modal-descripcion").val(descripcion);
        $(".modal-url_imagen").val(url_imagen);
        $(".modal-num_seguidores").val(num_seguidores);
        $(".modal-num_publicaciones").val(num_publicaciones);
        $(".modal-categoria").val(categoria);
    });
</script>


</body>

</html>