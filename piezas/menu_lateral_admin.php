<!--MENÚ LATERAL ADMIN-->
<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper">
    <ul class="nav sidebar-nav">
        <li class="sidebar-brand"><a href="admin_administrarPerfiles.php">YOUTWINS</a></li>
        <li><a href="admin_administrarPerfiles.php">ADMINISTRAR PERFILES</a></li>
        <li><a href="admin_administrarUsuarios.php">ADMINISTRAR USUARIOS</a></li>
        <li><a href="admin_nuevo_perfil.php">AÑADIR PERFIL</a></li>
        <li><a href="admin_configuracion.php">MI CONFIGURACIÓN</a></li>
        <?php if ($control_web->esta_usuario_logueado()) {
            //Caso administrador
            if ($_SESSION["usuario_logueado"]["tipo_usuario"] == "administrador") {
                echo("<li><a href='usuario_populares.php'>PANEL DE USUARIO NORMAL</a></li>");
                //Caso usuario normal
            }
        }?>
    </ul>
</nav><!--MENÚ LATERAL ADMIN-->