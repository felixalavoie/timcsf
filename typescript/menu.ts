
var body = document.getElementById('body');
var openMenu = document.getElementById('menuControlOpen');
var closeMenu = document.getElementById('menuControlClose');

openMenu.addEventListener('click', function(e) {
    body.classList.toggle('menu--active');
});

closeMenu.addEventListener('click', function(e) {
    body.classList.toggle('menu--active');
});


