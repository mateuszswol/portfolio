const hamburger = document.querySelector('#hamburger');
const mobile_menu = document.querySelector('.menu');
const body = document.querySelector('#top');

const handleClick = () => {
    hamburger.classList.toggle('header__hamburger--is-active');
    mobile_menu.classList.toggle('menu--is-active');
    body.classList.toggle('scroll-lock');
}

hamburger.addEventListener('click', handleClick);