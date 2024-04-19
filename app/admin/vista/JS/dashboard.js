//añadir la clase del hover de la lista
let list = document.querySelectorAll(".navigation li");

function activeLink() {
    list.forEach(item=>{
        item.classList.remove("hovered");
    })
    this.classList.add("hovered");
}

list.forEach(item => item.addEventListener("mouseover", activeLink));


// =========Menu Toggle ===================//
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function() {
    navigation.classList.toggle("active");
    main.classList.toggle("active");
}

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