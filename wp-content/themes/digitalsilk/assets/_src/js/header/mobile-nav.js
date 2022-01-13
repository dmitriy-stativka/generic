/**
 * Toggle mobile nav
 * @param {string} el - selector for adding an active class
 */

export function mobileNav(el) {

    var btn = document.querySelector('.site-header__navigation-btn');
    var headerMenu = document.querySelector('.site-header__menu');

    btn.addEventListener('click', function() {
        headerMenu.classList.toggle('show');
        btn.classList.toggle('active');
    });


}