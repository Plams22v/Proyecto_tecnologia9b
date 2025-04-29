//hola
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