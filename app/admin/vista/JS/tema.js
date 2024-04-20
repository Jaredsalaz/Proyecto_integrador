// Obtén el elemento :root
var rootElement = document.querySelector(':root');

// Obtén los botones de cambio de tema
var lightModeButton = document.querySelector('.theme-toggler .light_mode');
var darkModeButton = document.querySelector('.theme-toggler .dark_mode');

// Agrega un controlador de eventos al botón de modo claro
lightModeButton.addEventListener('click', function() {
    rootElement.classList.remove('dark-theme-variables');
    rootElement.classList.add('light-theme-variables');
    // Guarda el tema en el almacenamiento local
    localStorage.setItem('theme', 'light');
});

// Agrega un controlador de eventos al botón de modo oscuro
darkModeButton.addEventListener('click', function() {
    rootElement.classList.remove('light-theme-variables');
    rootElement.classList.add('dark-theme-variables');
    // Guarda el tema en el almacenamiento local
    localStorage.setItem('theme', 'dark');
});

// Al cargar la página, recupera el tema del almacenamiento local
document.addEventListener('DOMContentLoaded', function() {
    var theme = localStorage.getItem('theme');
    if (theme === 'light') {
        rootElement.classList.remove('dark-theme-variables');
        rootElement.classList.add('light-theme-variables');
    } else if (theme === 'dark') {
        rootElement.classList.remove('light-theme-variables');
        rootElement.classList.add('dark-theme-variables');
    }
});