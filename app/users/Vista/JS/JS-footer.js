window.addEventListener('scroll', function() {
    var footer = document.querySelector('footer');
    var footerTop = footer.getBoundingClientRect().top;
    var windowHeight = window.innerHeight;

    if (footerTop < windowHeight) {
        footer.classList.add('animate-footer');
    }
});