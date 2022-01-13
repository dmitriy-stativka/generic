
import { mobileNav }    from './header/mobile-nav';

document.addEventListener('DOMContentLoaded', () => {
  mobileNav();
});

/* AOS animations */
AOS.init({
  offset: 300,
  once: true,
  duration: 800,
});

/* Lazy Load */
const myLazyLoad = new LazyLoad({
  elements_selector: '.lazy',
});
