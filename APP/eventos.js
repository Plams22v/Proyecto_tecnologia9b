//hola :v
const boton = document.getElementById('btnsubir');

  window.addEventListener('scroll', function() {
    if (window.scrollY > 10) { // cuando baja 300px aparece
      boton.style.display = 'block';
    } else {
      boton.style.display = 'none';
    }
  });

  function subirA() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }

  let index = 0;
  const slides = document.querySelectorAll('.slide');
  const slidesContainer = document.querySelector('.slides');
  
  function mostrarSlide(i) {
    index = (i + slides.length) % slides.length;
    const slideWidth = slides[0].clientWidth;
    slidesContainer.style.transform = `translateX(-${index * slideWidth}px)`;
  }
  
  
  function siguiente() {
    mostrarSlide(index + 1);
  }
  
  function anterior() {
    mostrarSlide(index - 1);
  }
  
  // Automático cada 5s
  setInterval(() => {
    siguiente();
  }, 5000);

  window.addEventListener('resize', () => {
    mostrarSlide(index);
  });
  
  