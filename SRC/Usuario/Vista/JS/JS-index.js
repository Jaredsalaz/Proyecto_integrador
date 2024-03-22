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