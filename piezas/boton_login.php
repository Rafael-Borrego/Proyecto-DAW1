<!--Botón LOGIN-->
<div class="morph-button morph-button-modal morph-button-modal-2 morph-button-fixed">
    <button type="button">Entrar</button>
    <div class="morph-content">
        <div>
            <div class="content-style-form content-style-form-1">
                <span class="icon icon-close">Cierra el diálogo</span>
                <h2>Entrar</h2>
                <form id="form_login" action="index.php" method="post">
                    <input type='hidden' name='submitted_login' id='submitted_login' value='1'/>
                    <p><label>Email</label><input id="email_usuario" name="email_usuario" type="text" /></p>
                    <p><label>Contraseña</label><input id="password_usuario" name="password_usuario" type="password" /></p>
                    <p><label></label><input id="submit" name="submit" type="submit" value="ENTRAR"/></p>
                    <!--<p><button type="submit" form="form_login"  name="submit" value="Entrar ">Entrar</button></p>-->
                </form>
            </div>
        </div>
    </div>
</div><!--Botón LOGIN-->