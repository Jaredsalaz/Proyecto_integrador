$(document).ready(function(){
	$('#dropdownMenuButton').parent().hover(function() {
		$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
	}, function() {
		$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
	});
});


document.querySelector('.navbar-toggler').addEventListener('click', function() {
    document.getElementById('mainNavbar').classList.toggle('hidden');
});

	// Abrir modal de inicio de sesión y abrir el modal de registro
    document.getElementById('enlaceRegistro').addEventListener('click', function() {
        // Cerrar el modal de inicio de sesión
        var myModalEl = document.getElementById('modal');
        var modal = bootstrap.Modal.getInstance(myModalEl);
        modal.hide();

        // Abrir el modal de registro
        var myModalEl = document.getElementById('modalRegistro');
        var modal = new bootstrap.Modal(myModalEl);
        modal.show();
    });
	

//Carousel de cards
var swiper = new Swiper('.swiper-container', {
	navigation: {
	  nextEl: '.swiper-button-next',
	  prevEl: '.swiper-button-prev'
	},
	slidesPerView: 1,
	spaceBetween: 10,
	// init: false,
	pagination: {
	  el: '.swiper-pagination',
	  clickable: true,
	},

  
	breakpoints: {
	  620: {
		slidesPerView: 1,
		spaceBetween: 20,
	  },
	  680: {
		slidesPerView: 2,
		spaceBetween: 40,
	  },
	  920: {
		slidesPerView: 3,
		spaceBetween: 40,
	  },
	  1240: {
		slidesPerView: 4,
		spaceBetween: 50,
	  },
	} 
});