import scrollify from 'jquery-scrollify';
import { closeMobileNav } from './mobileNav';

$(document).ready(function() {
    document.getElementsByTagName("html")[0].style.visibility = "visible";
});

const header = document.querySelector('.header');

if (header) {
    $(".header__menu-item, .header__home-link").on("click",$.scrollify.move);

    $(".header__mobile-menu-item, .header__home-link").on("click",function() {
        $.scrollify.move($(this).attr("href"));
        closeMobileNav();
    });

    $(".button__scroll-nav").on("click",$.scrollify.move);
}
