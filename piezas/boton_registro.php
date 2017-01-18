<!--Botón REGISTRO-->
<div class="morph-button morph-button-modal morph-button-modal-3 morph-button-fixed">
    <button type="button">Registro</button>
    <div class="morph-content">
        <div>
            <div class="content-style-form content-style-form-2">
                <span class="icon icon-close">Cerrar el diálogo</span>
                <h2>Registro</h2>
                <form id="form_registro" action="index.php" method="post">
                    <input type='hidden' name='submitted_registro' id='submitted_registro' value='1'/>
                    <p><label>Email</label><input id="email_usuario" name="email_usuario" type="text" /></p>
                    <p><label>Contraseña</label><input id="password" name="password" type="password" /></p>
                    <p><label>Repetir Contraseña</label><input id="password_confirm" name="password_confirm" type="password" /></p>
                    <p><label>Nombre Usuario</label><input id="nombre_usuario" name="nombre_usuario" type="text" /></p>
                    <p><label></label><input id="submit" name="submit" type="submit" value="REGISTRO" style="color: black"/></p>
                    <!--<p><button class="boton2">Registrarse</button></p>-->
                </form>
            </div>
        </div>
    </div>
</div><!--Botón REGISTRO-->