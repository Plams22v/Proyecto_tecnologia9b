<?php

session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Página principal</title>
  <link rel="stylesheet" href="estilo.css" />
  <link rel="icon" href="Images/Logo.png">
</head>
<body>

  <!-- Volver arriba -->
  <div id="ar"></div> 

  <!-- Encabezado -->
  <header>
 
    <a href="index.html" class="logo" style="float: left;">
      <img src="Logo.png" alt="coffe" style="text-align: left;" />
      <h2 class="nombre"></h2>
    </a>

    <!-- Enlaces -->
    <nav>
      <a href="index.php">INICIO</a>
      <a href="sobrenosotros.html">SOBRE NOSOTROS</a>
      <a href="productos.php">PRODUCTOS</a>
      <a href="contacto.php">CONTACTANOS</a>  
      <a href="carrito.php" id="carrito-icono">
      <img src="https://cdn-icons-png.flaticon.com/512/60/60992.png" alt="Carrito" class="carrito-nav" style=" width:60px; height: 60px; margin-left: 10px;">
      </a>
    </nav>
  </header>

  <!-- Carrusel -->
  <main>
    <div class="carrusel">
      <div class="slides" id="slides" >
        <img src="cafe.jpg" alt="cafe1" class="slide">
        <img src="cafe2.jpg" alt="cafe2" class="slide">
        <img src="cafe3.jpg" alt="cafe3" class="slide">
      </div>
  
      <button class="btn prev" onclick="anterior()">&#10094;</button>
      <button class="btn next" onclick="siguiente()">&#10095;</button>
    </div>

    <!-- Productos -->
     <section class="box1"><center>
     <h1>Bienvenido, <?php echo $_SESSION['nombre']; ?> ¿Qué deseas comprar hoy?</h1>
     </center></section>
     
    <section class="cont-productos">
      <a href="productos.php#bebida" class="box1">
    
          <img src="producto1.png" alt="producto 1">
          <p> CAFÉS Y OTRAS BEBIDAS </p>
          <br>
          <button> Ver Productos </button>
          </p>
        </a>

      <a href="productos.php#comida" class="box2">
        <img src="producto2.png" alt="producto 2">
        <p> COMIDA </p>
        <br>
        <button> Ver Productos </button>
      </a>
      <a href="productos.php#pastel" class="box3">
    <img src="producto3.png" alt="producto 3">
    <p> PASTELERÍA </p>

    <br>
    <button> Ver Productos </button>
      </a>
    </section>


<!-- Botón volver arriba -->
    <a href="#ar">
      <button class="btnsubir">
        <img src="https://images.icon-icons.com/1339/PNG/512/uparrow_87464.png" alt="subir" style="width: 50px; height: 50px;">
      </button>
    </a>
    
    <br>
    <br>
    
    <!-- Imagen Con texto -->

    <section class="promo-pasteleria">
      <section class="promo-contenido">
        <h2>Conoce nuestra pastelería,<br>el complemento perfecto para tu bebida favorita.</h2>
        <button><a href="productos.html">DATE UN GUSTO </a></button>
      </section>
    </section>
    <?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "cafe");

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para obtener los mensajes
$sql = "SELECT nombre, mensaje, fecha, calificacion FROM mensajes ORDER BY fecha DESC LIMIT 5";
$resultado = $conexion->query($sql);
?>

<section id="reseñas" style="background-color:#f8f8f8; padding:20px; border-radius:10px; margin-top:30px;">
    <h2 style="text-align:center;">Reseñas de nuestros clientes</h2>

    <?php
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<section style='background:#fff; padding:15px; border-radius:8px; margin:10px 0; box-shadow:0 1px 4px rgba(0,0,0,0.1);'>";
            echo "<strong>" . htmlspecialchars($fila['nombre']) . "</strong><br>";
            echo "<small style='color:gray;'>" . date("d/m/Y H:i", strtotime($fila['fecha'])) . "</small><br>";
            echo "<p>" . nl2br(htmlspecialchars($fila['mensaje'])) . "</p>";
            if ($fila['calificacion'] !== null) {
                echo "<div style='color:gold;'>Calificación: ";
                for ($i = 0; $i < $fila['calificacion']; $i++) {
                    echo "★";
                }
                echo "</div>";
            }
            echo "</div>";
        }
    } else {
        echo "<p style='text-align:center;'>Aún no hay reseñas. ¡Sé el primero en opinar!</p>";
    }

    $conexion->close();
    ?>
</section>
  </main>

  <br>
  <!-- Pie de página -->
  <footer>
    <p style="display: flex; align-self:flex-start; opacity: 70%;">&copy;2025 Todos los derechos reservados a CAFE ROYALE.</p>
  </footer>

  <script src="eventos.js"></script>
</body>
</html>
