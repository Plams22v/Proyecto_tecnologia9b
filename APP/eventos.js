//hola :v

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
  }, 8000);

  window.addEventListener('resize', () => {
    mostrarSlide(index);
  });
  
  window.onload = function () {
    const contenedor = document.getElementById("carrito-contenido");
    const totalContenedor = document.getElementById("total-carrito");
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    if (carrito.length === 0) {
      contenedor.innerHTML = "<p class='carrito-vacio'>Tu carrito está vacío.</p>";
      totalContenedor.textContent = "";
      return;
    }

    let total = 0;
    contenedor.innerHTML = carrito.map(p => {
      total += parseFloat(p.precio);
      return `
        <div class="carrito-item">
          <p>${p.nombre}</p>
          <p>$${parseFloat(p.precio).toFixed(2)}</p>
        </div>
      `;
    }).join("");

    totalContenedor.textContent = "Total: $" + total.toFixed(2);
  }
  function agregarAlCarrito(nombre, precio) {
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    carrito.push({ nombre: nombre, precio: precio });
    localStorage.setItem("carrito", JSON.stringify(carrito));
  
    alert(`${nombre} fue agregado al carrito.`);
  }
  window.onload = function () {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    // Mostrar productos...
  }