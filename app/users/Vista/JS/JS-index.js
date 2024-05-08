window.addEventListener('scroll', function() {
    var footer = document.querySelector('footer');
    var footerTop = footer.getBoundingClientRect().top;
    var windowHeight = window.innerHeight;

    if (footerTop < windowHeight) {
        footer.classList.add('animate-footer');
    }
});
//ANIMACIONES CARD
window.addEventListener('scroll', function() {
    var cards = document.querySelectorAll('.card');
    var windowHeight = window.innerHeight;

    cards.forEach(function(card) {
        var cardTop = card.getBoundingClientRect().top;

        if (cardTop < windowHeight) {
            card.classList.add('animate-card');
        }
    });
});
// animacion de categorias
window.addEventListener('scroll', function() {
    var elements = document.querySelectorAll('.my-element');
    var windowHeight = window.innerHeight;

    elements.forEach(function(element) {
        var elementTop = element.getBoundingClientRect().top;

        if (elementTop < windowHeight) {
            if (element.classList.contains('left')) {
                element.classList.add('animate-left');
            } else {
                element.classList.add('animate-right');
            }
        }
    });
});
// A nimacion para el texto principal
window.addEventListener('scroll', function() {
    var text = document.querySelector('.my-text');
    var textTop = text.getBoundingClientRect().top;
    var windowHeight = window.innerHeight;

    if (textTop < windowHeight) {
        text.classList.add('animate-right');
    }
});
// Animación de la imagen principal
window.addEventListener('scroll', function() {
    var image = document.querySelector('.my-image');
    var imageTop = image.getBoundingClientRect().top;
    var windowHeight = window.innerHeight;

    if (imageTop < windowHeight) {
        image.classList.add('animate-left');
    }
});


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