$('.mostrar_dialogo').click(function() {
    var url_redireccion = $(this).data('url');
    confirmar_añadir(url_redireccion);
});

function confirmar_añadir(url_redireccion) {
    swal({
        title: "SEGUIR PERFIL",
        text: "¿Quieres añadir el perfil a tu lista de seguidos?",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonText: "Sí!",
        confirmButtonColor: "#7aec69",
    },function() {
        window.location.href = url_redireccion;
    });
}