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


$titulo_vista = "CONFIGURACIÓN USUARIO";
?>


<!DOCTYPE html>
<html lang="en">
  <head>
      <?php include("../piezas/metas_head.php"); ?>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title><?= $titulo_vista?></title>
    <!-- Bootstrap CSS-->
    <link href="../recursos/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Propio -->
    <link href="../recursos/css/usuario_configuracion.css" rel="stylesheet">
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
                    <div id="columna-principal" class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                        <!--CABECERA TÍTULO VISTA-->
                        <?php include("../piezas/cabecera_titulo_vista.php"); ?>

                        <!--ICONO USUARIO-LOGOUT-->
                        <?php include("../piezas/icono_usuario_logout.php"); ?>

                        <?php
                            print_r("RESULTADO PETICIÓN POST => \n".$_POST);

                        ?>

                        <!--FORMULARIO CONFIGURACIÓN USUARIO-->
                        <?php //include("../piezas/form_configuracion_usuario.php"); ?>

                        <!--<div class="">-->

                        <!--</div>-->
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