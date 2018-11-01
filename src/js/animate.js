import 'aos/dist/aos.css';
import AOS from 'aos';

AOS.init({
  delay: 0,
  disable: window.innerWidth < 1280,
  duration: 500,
  easing: 'ease-in-sine',
  offset: 100
});

window.addEventListener('resize', function() {
  AOS.refresh();
});
