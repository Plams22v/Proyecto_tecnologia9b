<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contáctanos</title>
  <link rel="stylesheet" href="estilo.css">
  <link rel="icon" href="Logo.png">
</head>
<body>

  <header>
    <a href="index.html" class="logo">
      <img src="Logo.png" alt="Cafetería Logo" />
    </a>
    <nav>
      <a href="index.html">INICIO</a>
      <a href="sobrenosotros.html">SOBRE NOSOTROS</a>
      <a href="productos.php">PRODUCTOS</a>
      <a href="contacto.html">CONTACTANOS</a>
      <a href="carrito.php" id="carrito-icono">
        <img src="https://cdn-icons-png.flaticon.com/512/60/60992.png" alt="Carrito" class="carrito-nav" style=" width:60px; height: 60px; margin-left: 10px;">
        </a>
    </nav>
  </header>

  <main class="contacto-contenedor">
    <section class="contacto-info">
      <h2>Contáctanos</h2>
      <p>¿Tienes alguna duda, sugerencia o quieres trabajar con nosotros? ¡Escríbenos!</p>

      <ul>
        <li><strong>📍 Dirección:</strong> Calle del Café #123, Ciudad Aroma</li>
        <li><strong>📞 Teléfono:</strong> +57 312 345 6789</li>
        <li><strong>📧 Correo:</strong> caferoyalecompany@gmail.com</li>
      </ul>
      <h2> Ubicación </h2>
      <address>
        26m1 Cl. 83 
        Cali, Colombia
      </address>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.6328408052204!2d-76.46926599999999!3d3.439174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a7776ac4e2a9%3A0xe72992719d553ce7!2sCl.%2083%20%23%2020A-26%2C%20Cali%2C%20Valle%20del%20Cauca!5e0!3m2!1ses!2sco!4v1746797571294!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
<br>
<section class="h">
  
<section class="formulario">
      <h2>Envíanos un mensaje</h2>
      <form id="formContacto">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
      
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>
      
        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" rows="5" required></textarea>

        <button type="submit">Enviar</button>
      </form>
      
      <!-- Mensaje de éxito oculto -->
      <p id="mensajeExito" style="color: green; display: none; margin-top: 15px;">
        ✅ Tu mensaje ha sido enviado con éxito. ¡Gracias por contactarnos!
      </p>
    </section>
  </section>
  </main>

  <footer>
    <p>&copy;2025 Todos los derechos reservados a CAFE ROYALE.</p>
  </footer>
  <script>
    const form = document.getElementById("formContacto");
    const mensaje = document.getElementById("mensajeExito");
  
    form.addEventListener("submit", function (e) {
      e.preventDefault(); // Evita que se recargue la página
      mensaje.style.display = "block"; // Muestra el mensaje
      form.reset(); // Limpia los campos del formulario
      emailjs.send("service_9ydevto","template_za22o4b");
    });
  </script>
  <?php
  include 'conexion.php';
$usuario=$_POST['usuario'];
$mensaje=$_POST['mensaje'];


  ?>
  
</body>
</html>