#youtwINS.

##Instrucciones de instalación.
1. Clonar el repositorio en la carpeta htdocs del servidor apache.
2. Instalar las dependencias del composer.json. Para ello hay que abrir una ventana de comandos y, en la carpeta principal de la aplicación ejecutar el siguiente:<br /><br />
   ```
   composer composer.phar install
   ```
3. Por defecto, la conexión con la base de datos tiene unos determinados parámetros (usuario = root y password = root). Para diferentes configuraciones es necesario hacer los cambios necesarios en el archivo database_config.ini de la carpeta configuration.
4. Para la creación de las tablas de la DB, ejecutar el sql 2_creacion_tablas.sql. También se creará un usuario por defecto con email = root@root.com y password = root. En la misma carpeta sql está el script 3_inserciones_tablas.sql que insertar varios usuarios en la DB.


##Instrucciones básicas de utilización.
* Inicialmente, será necesario entrar con la cuenta de root para añadir algún perfil al sistema. Para eso, habrá que loguearse, navegar en el menú a la página de añadir nuevo perfil y buscar el que se desee.
* Una vez añadido el perfil, ya aparecerá en la tabla de administrar perfiles. Para que se muestre en la vista de perfiles populares de los usuarios normales, hay que editar el campo categoría con la correspondiente. De momento, en esta primera versión de la aplicación hay categoría "deportes" y "musica".
* Llegados a este punto, ya se podrá ir al panel de usuario normal (o salir de la aplicación, registrar un usuario normal y loguearse con él) y realizar las acciones que se deseen: añadir perfiles populares a seguidos o buscarlos en la vista de explorar, ver las publicaciones de los seguidos o cambiar los datos del usuario.


##Ampliaciones futuras de la aplicación.
* Posibilidad de añadir perfiles de Twitter y Youtube.
* Retocar interfaz de usuario.
* Visualización de comentarios en las publicaciones.
* Recomendación de perfiles a seguir basándose en las aficiones de los usuarios.



