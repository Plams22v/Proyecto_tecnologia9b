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
      <a href="index.php">INICIO</a>
      <a href="sobrenosotros.html">SOBRE NOSOTROS</a>
      <a href="productos.php">PRODUCTOS</a>
      <a href="contacto.php">CONTACTANOS</a>
      <a href="logout.php">CERRAR SESION</a>
      <a href="carrito.php" id="carrito-icono">
        <img src="https://cdn-icons-png.flaticon.com/512/60/60992.png" alt="Carrito" class="carrito-nav" style=" width:60px; height: 60px; margin-left: 10px;">
        </a>
    </nav>
  </header>

  <main class="contacto-contenedor">
    <section class="contacto-info">
      <h2>Contáctanos</h2>
      <br>
      <section class="box1">
      <p>¿Tienes alguna duda, sugerencia o quieres trabajar con nosotros? ¡Escríbenos!</p>
      </section>
<br>
      <ul>
        <li><strong>📍 Dirección:</strong> Calle del Café #123, Ciudad Aroma</li>
        <li><strong>📞 Teléfono:</strong> +57 312 345 6789</li>
        <li><strong>📧 Correo:</strong> caferoyalecompany@gmail.com</li>
      </ul>
      <br>
      <h2> Ubicación </h2>
    <br>
      <address>
        26m1 Cl. 83 
        Cali, Colombia
      </address>
      <br>
      <center>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.6328408052204!2d-76.46926599999999!3d3.439174!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a7776ac4e2a9%3A0xe72992719d553ce7!2sCl.%2083%20%23%2020A-26%2C%20Cali%2C%20Valle%20del%20Cauca!5e0!3m2!1ses!2sco!4v1746797571294!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </center>
      </section>
<br>
<section class="h">
  
<section class="formulario">
      <h2>Envíanos un mensaje</h2>
      <form id="formContacto" action="procesar_formulario.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    
    <label for="email">Correo electrónico:</label>
    <input type="email" id="email" name="email" required>
    
    <label for="mensaje">Mensaje:</label>
    <textarea id="mensaje" name="mensaje" rows="5" class="login-container" required></textarea>
    <label for="calificacion">Califícanos:</label>
    <div id="calificacion">
        <input type="radio" id="estrella5" name="calificacion" value="5">
        <label for="estrella5">⭐⭐⭐⭐⭐</label>
        <input type="radio" id="estrella4" name="calificacion" value="4">
        <label for="estrella4">⭐⭐⭐⭐</label>
        <input type="radio" id="estrella3" name="calificacion" value="3">
        <label for="estrella3">⭐⭐⭐</label>
        <input type="radio" id="estrella2" name="calificacion" value="2">
        <label for="estrella2">⭐⭐</label>
        <input type="radio" id="estrella1" name="calificacion" value="1">
        <label for="estrella1">⭐</label>
    </div>
    <button type="submit">Enviar</button>
</form>
<?php
if (isset($_GET['mensaje'])) {
    if ($_GET['mensaje'] == 'success') {
        echo "<p style='color: green; text-align: center;'>✅ Tu mensaje ha sido enviado con éxito. ¡Gracias por contactarnos!</p>";
    } elseif ($_GET['mensaje'] == 'error') {
        echo "<p style='color: red; text-align: center;'>❌ Hubo un error al enviar tu mensaje. Por favor, inténtalo de nuevo.</p>";
    }
}
?>
  </section>
  </main>

  <footer>
    <p>&copy;2025 Todos los derechos reservados a CAFE ROYALE.</p>
  </footer>

  
</body>

</html>