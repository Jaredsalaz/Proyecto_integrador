// Selecciona el elemento que quieres que sea sticky
var stickyElement = document.getElementById('jsAgenteInfoSection');

// Define los límites superior e inferior
var upperLimit = 500;  // El elemento se volverá sticky después de desplazarse 500px
var footerHeight = 100;  // La altura de tu pie de página
var lowerLimit = document.documentElement.scrollHeight - footerHeight;  // El elemento dejará de ser sticky cuando llegues al pie de página

// Añade un evento de scroll al window
window.addEventListener('scroll', function() {
    // Si el ancho de la ventana es menor que 992px, no hagas nada
    if (window.innerWidth < 992) {
        return;
    }
    // Si el scroll es mayor que el límite superior y menor que el límite inferior, añade la clase sticky
    if (window.scrollY > upperLimit && window.scrollY < lowerLimit) {
        stickyElement.classList.add('sticky');
    } 
    // Si el scroll es menor que el límite superior o mayor que el límite inferior, quita la clase sticky
    else {
        stickyElement.classList.remove('sticky');
    }
});