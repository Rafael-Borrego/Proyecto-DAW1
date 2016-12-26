
/*FUNCIÓN PARA DESPLIEGUE DEL MENÚ */
$(document).ready(function () {
  var elemento_hamburguer = $('.hamburger'),
        capa_transparencia = $('.capa-transparencia'),
        contenedor_principal = $('#columna-principal'),
        esta_cerrado = false;

    elemento_hamburguer.click(function () {
      transformacion_icono_hamburguer();      
    });

    function transformacion_icono_hamburguer() {

      if (esta_cerrado == true) {          
        capa_transparencia.hide();
        contenedor_principal.addClass('col-lg-offset-2');
        contenedor_principal.removeClass('col-lg-offset-1');
        elemento_hamburguer.removeClass('is-open');
        elemento_hamburguer.addClass('is-closed');
        esta_cerrado = false;
      } else {   //CASO SI EL MENÚ ESTÁ ABIERTO
        capa_transparencia.show();
        contenedor_principal.addClass('col-lg-offset-1');
        contenedor_principal.removeClass('col-lg-offset-2');
        elemento_hamburguer.removeClass('is-closed');
        elemento_hamburguer.addClass('is-open');
        esta_cerrado = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});