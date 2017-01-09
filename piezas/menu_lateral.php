<!--MENÚ LATERAL USUARIO NORMAL-->
<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper">
    <ul class="nav sidebar-nav">
        <li class="sidebar-brand"><a href="usuario_populares.php">YOUTWINS</a></li>
        <li><a href="usuario_populares.php">POPULARES</a></li>
        <li><a href="usuario_mis_perfiles.php">MIS PERFILES</a></li>
        <li><a href="usuario_nuevo_perfil.php">EXPLORAR</a></li>
        <li><a href="usuario_configuracion.php">CONFIGURACIÓN</a></li>
        <?php if ($control_web->esta_usuario_logueado()) {
            //Caso administrador
            if ($_SESSION["usuario_logueado"]["tipo_usuario"] == "administrador") {
                echo("<li><a href='admin_administrarPerfiles.php'>PANEL DE ADMINISTRADOR</a></li>");
                //Caso usuario normal
            }
        }?>
    </ul>
</nav><!--MENÚ LATERAL USUARIO NORMAL-->