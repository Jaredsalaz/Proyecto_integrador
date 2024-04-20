// Obtén el elemento :root
var rootElement = document.querySelector(':root');

// Obtén el interruptor de cambio de tema
var themeToggle = document.querySelector('.theme__toggle');

// Agrega un controlador de eventos al interruptor de cambio de tema
themeToggle.addEventListener('click', function() {
    // Cambia el estado del checkbox y el tema
    if (this.checked) {
        rootElement.classList.remove('light-theme-variables');
        rootElement.classList.add('dark-theme-variables');
        // Guarda el tema en el almacenamiento local
        localStorage.setItem('theme', 'dark');
    } else {
        rootElement.classList.remove('dark-theme-variables');
        rootElement.classList.add('light-theme-variables');
        localStorage.setItem('theme', 'light');
    }
});

// Al cargar la página, recupera el tema del almacenamiento local
document.addEventListener('DOMContentLoaded', function() {
    var theme = localStorage.getItem('theme');
    if (theme === 'light') {
        rootElement.classList.remove('dark-theme-variables');
        rootElement.classList.add('light-theme-variables');
        themeToggle.checked = false;
    } else if (theme === 'dark') {
        rootElement.classList.remove('light-theme-variables');
        rootElement.classList.add('dark-theme-variables');
        themeToggle.checked = true;
    }
});