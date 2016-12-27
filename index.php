<?php


require_once $_SERVER["DOCUMENT_ROOT"]."/proyecto_daw1/clases/ControlWeb.php";

$titulo_vista = "PORTADA YOUTWINS";
$control_web = new ControlWeb();
$usuario_incorrecto = false;
$registro_incorrecto = false;
$logout_realizado = false;

//COMPROBACIÓN PARA LOGOUT
if ($_GET["logout"]=="1"){
    $control_web->logout();
    $logout_realizado = true;
}

//REDIRECCIÓN SI EL USUARIO ESTÁ LOGUEADO
if ($control_web->esta_usuario_logueado()){
    $control_web->redireccionar_a("vistas/usuario_populares.php");
}

//SI LA PÁGINA SE CARGA DESPUÉS DE ENVIAR EL FORMULARIO DE LOGUEO
if(isset($_POST['submitted_login']))
{
    //SI LAS CREDENCIALES SON INCORRECTAS SE MUESTRA ERROR
    if (!$control_web->login())
    {
        $usuario_incorrecto = true;
    }
    //SI SON CORRECTAS SE REDIRECCIONA A LA VISTA ADECUADA
    else
    {
        if ($_SESSION["usuario_logueado"]["tipo_usuario"]=="administrador"){
            $control_web->redireccionar_a("vistas/usuario_populares.php");
        }else{
            $control_web->redireccionar_a("vistas/usuario_populares.php");
        }
    }
}
elseif(isset($_POST['submitted_registro']))
{
    if (!$control_web->registrar($_POST["email_usuario"],$_POST["password"],
                                 "normal",$_POST["nombre_usuario"], "","","")){
        $registro_incorrecto = true;
    }
}


?>

<html lang="en">
  <head>
      <?php include("piezas/metas_head.php"); ?>

    <title><?= $titulo_vista?></title>

    <!-- Bootstrap CSS-->
    <link href="recursos/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Botones chulos -->
		<link rel="stylesheet" type="text/css" href="recursos/css/component.css" />
		<link rel="stylesheet" type="text/css" href="recursos/css/content.css" />

    <!-- CSS Personalizados para index y componentes -->
    <link href="recursos/css/index.css" rel="stylesheet">
    <link href="recursos/css/fondo_animado.css" rel="stylesheet">
    <link href="recursos/css/iconos_redes.css" rel="stylesheet">

    <!-- CSS Font Awesome -->
    <link href="recursos/css/font-awesome.min.css" rel="stylesheet">

    <!-- Libreria JS para los botones chulos -->
    <script src="recursos/js/modernizr.custom.js"></script>

  </head>

  <body>
    <!--Container-fluid cabecera-->
    <div class="container-fluid contenedor-principal bg-success">
      <!--Fila Principal-->
        <div class="row">
            <h1 style="color: white">
                <?php
                    if ($usuario_incorrecto)
                    {
                        print_r("USUARIO INCORRECTO\n");
                    }
                    if ($registro_incorrecto)
                    {
                        print_r("REGISTRO INCORRECTO\n");
                    }
                    if ($logout_realizado) print_r($_SESSION["usuario_logueado"]);
                    //print_r($_SESSION);
                ?>
            </h1>
        </div>
        <div class="row">
           <!--Botón LOGIN-->
           <div class="col-xs-12 col-sm-6 col-md-4 offset-md-4">
               <?php include("piezas/boton_login.php"); ?>
           </div>

           <!--Botón REGISTRO-->
           <div class="col-xs-12 col-sm-6 col-md-4">
               <?php include("piezas/boton_registro.php"); ?>
           </div><!--Botón REGISTRO-->

           <!--Botón SOBRE NOSOTROS-->
           <div class="col-xs-12 col-sm-6 col-md-4">
               <?php include("piezas/boton_about.php"); ?>
           </div><!--Botón SOBRE NOSOTROS-->

           <!-- FILA ICONOS REDES SOCIALES -->
           <div class="col-xs-12 col-sm-6 col-md-4 ">
            <i class="icono-redes fa fa-instagram fa-3x"></i>
            <i class="icono-redes fa fa-twitter fa-3x"></i>
            <i class="icono-redes fa fa-youtube fa-3x"></i>
           </div><!-- FILA ICONOS REDES SOCIALES -->
        </div><!--Fila Principal-->
    </div><!--Container-fluid cabecera-->

    <!-- CANVAS FONDO ANIMADO -->
    <div id="fondo_animado" class="fondo_animado">
      <canvas id="canvas_fondo_animado"></canvas>
      <h1 class="main-title">YOUTWINS</h1>
    </div><!-- CANVAS FONDO ANIMADO -->


    <!--INCLUDES DE SCRIPTS NECESARIOS-->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="recursos/bootstrap-3.3.7/js/bootstrap.min.js"></script>

      <!--Scripts para los botones de login, registro y sobre nosotros-->
      <script src="recursos/js/classie.js"></script>
      <script src="recursos/js/uiMorphingButton_fixed.js"></script>
      <script src="recursos/js/arreglo_scroll_buttons.js"></script>

      <!--Scripts para el fondo animado-->
      <script src="recursos/js/TweenLite.min.js"></script>
      <script src="recursos/js/EasePack.min.js"></script>
      <script src="recursos/js/fondo_animado.js"></script>
  </body>
</html>