
<form action="usuario_configuracion.php" method="POST" role="form" class="form-horizontal">
    <div class="form-group">
        <label for="searchterm" class="col-sm-2 control-label">Choose Search Type</label>
        <select name="searchtype" class="form-control">
            <option value="ip"> IP Adress </option>
            <option value="ss_name"> Software Services </option>
            <option value="IS"> ISBN </option>
        </select>
    </div>
    <div class="form-group">
        <label for="searchterm" class="col-sm-2 control-label">Choose Search Term</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="searchterm" name="searchterm">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Search</button>
        </div>
    </div>
</form>





<!--FORMULARIO CONFIGURACIÓN USUARIO-->
<!--<form id="form_conf_usuario" action="usuario_configuracion.php" method="post">
    <div class="form-group">
        <label for="nombre_usuario">Nombre usuario</label>
        <input type="text" class="form-control" id="nombre_usuario" placeholder="nombre_usuario_actual">
    </div>
    <div class="form-group">
        <label for="email_usuario">Email</label>
        <input class="form-control" type="email" placeholder="email_actual" id="email_usuario">
    </div>
    <div class="form-group">
        <label for="contrasena_usuario">Contraseña</label>
        <input type="password" class="form-control" id="contrasena_usuario" placeholder="contraseña_actual">
    </div>
    <div class="form-group">
        <label for="nombre_completo_usuario">Nombre completo</label>
        <input type="text" class="form-control" id="nombre_completo_usuario" placeholder="nombre_completo_actual">
    </div>
    <div class="form-group">
        <label for="sexo_usuario">Sexo</label>
        <select class="form-control" id="sexo_usuario">
            <option>Hombre</option>
            <option>Mujer</option>
        </select>
    </div>
    <div class="form-group">
        <label for="descripcion_usuario">Tu descripción</label>
        <textarea class="form-control" id="descripcion_usuario" rows="3"></textarea>
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
</form><!--FORMULARIO CONFIGURACIÓN USUARIO-->
