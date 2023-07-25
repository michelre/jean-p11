const burgerMenu = document.querySelector('.burger-menu');
const mobileCloseMenuBtn = document.querySelector('.mobile-close-menu-btn');
const mobileHeaderNav = document.querySelector('.mobile-header-nav');

//Mobile menu handling
burgerMenu.addEventListener('click', openMobileMenu);
function openMobileMenu() {
    mobileCloseMenuBtn.style.display = 'block';
    burgerMenu.style.display = 'none';
    mobileHeaderNav.style.display = 'flex'
}

mobileCloseMenuBtn.addEventListener('click', closeMobileMenu);
function closeMobileMenu() {
    mobileCloseMenuBtn.style.display = 'none';
    burgerMenu.style.display = 'block';
    mobileHeaderNav.style.display = 'none'
}