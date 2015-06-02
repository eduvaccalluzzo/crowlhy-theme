var documento = $(document);
var ventana = $(window);


/* Header 
–––––––––––––––––––––––––––––––––––––––––––––––––– */
/*
ventana.on('scroll', olivar_cambio_menu);
documento.on('ready', olivar_cambio_menu);

function olivar_cambio_menu(){

	if(ventana.scrollTop() > 100){
		$('header').removeClass('top').addClass('scroll');
	}else{
		$('header').removeClass('scroll').addClass('top');
	}

}
*/

/*
function olivar_cambio_submenu(){

  if(ventana.scrollTop() > 100){
    $('ul.sub-menu').removeClass('top').addClass('scroll');
  }else{
    $('ul.sub-menu').removeClass('scroll').addClass('top');
  }

}*/


/* Acordeón
–––––––––––––––––––––––––––––––––––––––––––––––––– */

$('dl.acordeon dd').not('dl.acordeon dt.activo + dd').hide(); 

 $('dl.acordeon dt').click(function(){
   if ($(this).hasClass('activo')) {

        $(this).removeClass('activo');
        $(this).next('dd').slideUp(400);

   } else {

        $('dl.acordeon dt').removeClass('activo');
        $(this).addClass('activo');
        $('dl.acordeon dd').slideUp(400);
        $(this).next('dd').slideDown(600);
   }
});




/* Menu Mobile
–––––––––––––––––––––––––––––––––––––––––––––––––– */


$('.mobileNav').on('click',byadr_mostrar_menu_responsive);

function byadr_mostrar_menu_responsive () {
  $('.mobileNav .menu-mobile-principal-container').toggleClass('right_ok');

}






 