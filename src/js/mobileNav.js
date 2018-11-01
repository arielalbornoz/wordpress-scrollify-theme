import { freezeBody, unfreezeBody } from './freezeScroll';

/**
 * LAUNCH OVERLAY
 */
const mobileNavButton = document.querySelector('.header__mobile-nav-button');
const mobileNav = document.querySelector('.header__mobile-nav');
const clientHeight = window.innerHeight;

// Set the mobile nav height to allow for scrolling
const setMobileNavHeight = () => {
  const headerHeight = document.querySelector('.header__container');
  const winHeight = window.innerHeight;
  const mobileNav = document.querySelector('.header__mobile-nav');
  mobileNav.style.maxHeight = `${winHeight - headerHeight}px`;
};

const openMobileNav = () => {
  freezeBody();
  setMobileNavHeight();
  mobileNavButton.classList.add('header__mobile-nav-button--active');
  mobileNav.classList.add('header__mobile-nav--active');
};

export const closeMobileNav = () => {
  unfreezeBody();
  mobileNavButton.classList.remove('header__mobile-nav-button--active');
  mobileNav.classList.remove('header__mobile-nav--active');
};

const toggleMobileNav = e => {
  e.preventDefault();
  !mobileNavButton.classList.contains('header__mobile-nav-button--active')
    ? openMobileNav()
    : closeMobileNav();
};

mobileNavButton.addEventListener('click', toggleMobileNav);

const mobileNavItems = Array.from(
  document.querySelectorAll('.header__mobile-menu-column')
);
mobileNavItems.forEach(item => {
  const navChildren = Array.from(item.childNodes);
  const subNav = navChildren.filter(
    child =>
      child.classList &&
      child.classList.contains('header__mobile-menu-item--subnav')
  )[0];

  if (subNav) {
    subNav.addEventListener('click', e => {
      e.preventDefault();
      if (!item.classList.contains('header__mobile-menu-column--active')) {
        item.classList.add('header__mobile-menu-column--active');
      } else {
        item.classList.remove('header__mobile-menu-column--active');
      }
    });
  }
});
