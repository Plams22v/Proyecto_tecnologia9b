<?php
include 'conexion.php';
$sql = "SELECT * FROM productos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="estilo.css">

    <script src="eventos.js" defer></script>
</head>
<body>
  <!-- Encabezado -->
  <header>
    <a href="index.html" class="logo" style="float: left;">
      <img src="Logo.png" alt="coffe" style="text-align: left;" />
      <h2 class="nombre"></h2>
    </a>

    <!-- Enlaces -->
    <nav>
      <a href="index.html">INICIO</a>
      <a href="sobrenosotros.html">SOBRE NOSOTROS</a>
      <a href="productos.php">PRODUCTOS</a>
      <a href="contacto.php">CONTACTANOS</a>  
      <a href="carrito.php" id="carrito-icono">
      <img src="https://cdn-icons-png.flaticon.com/512/60/60992.png" alt="Carrito" class="carrito-nav" style=" width:60px; height: 60px; margin-left: 10px;">
      </a>
    </nav>
  </header>

<section class="box1">
<h2>Lista de Productos</h2>
</section>


</body>
</html>
