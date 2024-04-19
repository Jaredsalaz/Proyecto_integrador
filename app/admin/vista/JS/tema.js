// Obtén el elemento :root
var rootElement = document.querySelector(':root');

// Obtén los botones de cambio de tema
var lightModeButton = document.querySelector('.theme-toggler .light_mode');
var darkModeButton = document.querySelector('.theme-toggler .dark_mode');

// Agrega un controlador de eventos al botón de modo claro
lightModeButton.addEventListener('click', function() {
    rootElement.classList.remove('dark-theme-variables');
    rootElement.classList.add('light-theme-variables');
});

// Agrega un controlador de eventos al botón de modo oscuro
darkModeButton.addEventListener('click', function() {
    rootElement.classList.remove('light-theme-variables');
    rootElement.classList.add('dark-theme-variables');
});