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