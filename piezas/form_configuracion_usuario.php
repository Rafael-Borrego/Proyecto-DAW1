
<form action="usuario_configuracion.php" method='post'>

<!--FORMULARIO CONFIGURACIÓN USUARIO-->
<form id="form_conf_usuario" action="usuario_configuracion.php" method="post">
    <div class="form-group">
        <label for="nombre_usuario">Nombre usuario</label>
        <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="<?=$usuario_logueado["nombre_usuario"]?>" >
    </div>
    <div class="form-group">
        <label for="email_usuario">Email</label>
        <input class="form-control" type="email"  id="email_usuario" name="contrasena" value="<?=$usuario_logueado["email"]?>">
    </div>
    <div class="form-group">
        <label for="contrasena_usuario">Contraseña</label>
        <input type="password" class="form-control" id="contrasena_usuario" value="<?=$usuario_logueado["contrasena"]?>">
    </div>
    <div class="form-group">
        <label for="nombre_completo_usuario">Nombre completo</label>
        <input type="text" class="form-control" id="nombre_completo_usuario" value="<?=$usuario_logueado["nombre_completo"]?>">
    </div>
    <div class="form-group">
        <label for="sexo_usuario">Sexo</label>
        <select class="form-control" id="sexo_usuario" value="<?=$usuario_logueado["sexo"]?>">
            <option>Hombre</option>
            <option>Mujer</option>
        </select>
    </div>
    <div class="form-group">
        <label for="descripcion_usuario">Tu descripción</label>
        <textarea class="form-control" id="descripcion_usuario" rows="3" value="<?=$usuario_logueado["descripcion"]?>"></textarea>
    </div>
    <div class="form-check">
        <p><strong>Aficiones</strong></p>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input">
            Categoría 1
        </label>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input">
            Categoría 2
        </label>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input">
            Categoría 3
        </label>
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input">
            Categoría 4
        </label>
    </div>
    <br>
    <input form="form_conf_usuario" id="submit" name="submit" type="submit" value="Guardar cambios"/>

    <!--CAMPOS OCULTOS CON EL RESTO DE ATRIBUTOS DE PERFIL Y EL CONTROL DE SUBMIT-->
    <input type="text" name="submitted_actualizar" value="1" hidden="true">
    <input type="text"  name="id_perfil" hidden="true">


</form><!--FORMULARIO CONFIGURACIÓN USUARIO-->
