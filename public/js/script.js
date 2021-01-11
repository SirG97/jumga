$(document).ready(function(){

    $('#myCarousel').carousel({
        interval: 3000,
    })

});
document.addEventListener('DOMContentLoaded', (event) => {
    const hamburger = document.getElementById('hamburger');
    const main = document.getElementById('main');
    const sidebar = document.querySelector('.nav-sidebar');
    const profile = document.querySelector('.header-nav-item');
    const ndropdown = document.querySelector('.nav-dropdown');

    if (hamburger !== null) {
        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('nav-sidebar-open');
        });
    }

    if (profile !== null) {
        profile.addEventListener('click', () => {
            ndropdown.classList.toggle('active');
        });
    }

    if (main !== null) {
        main.addEventListener('click', () => {
            // if(sidebar.classList.contains('nav-sidebar-open')){
            sidebar.classList.remove('nav-sidebar-open');

        });
    }

});
