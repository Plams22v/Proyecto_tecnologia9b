<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];

$sql = "SELECT c.id, p.nombre, p.precio, c.cantidad, (p.precio * c.cantidad) AS total
        FROM carrito c
        JOIN productos p ON c.producto_id = p.id
        WHERE c.id_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="estilo.css" />

</head>
<body>
<header>
 
 <a href="index.html" class="logo" style="float: left;">
   <img src="Logo.png" alt="coffe" style="text-align: left;" />
  
 </a>

 <!-- Enlaces -->
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
<br>
<div class="carrito-container">
    <h2>🛒 Carrito de Compras</h2>

    <?php
$total_general = 0;

while ($row = $resultado->fetch_assoc()) {
    echo '<div class="producto-carrito">';
    
    echo '<p><strong>' . htmlspecialchars($row['nombre']) . '</strong></p>';
    echo '<p>Precio: $' . number_format($row['precio'], 0, ',', '.') . '</p>';
    echo '<p>Cantidad: ' . $row['cantidad'] . '</p>';
    echo '<p>Total: $' . number_format($row['total'], 0, ',', '.') . '</p>';
   echo '<br>';
    echo '<section class"box1">';
    echo '<a href="eliminar_producto.php?id=' . $row['id'] . '" class="btn-carrito" onclick="return confirm(\'¿Eliminar este producto?\');">Eliminar</a>';
    echo '</section>';
    echo '<br>';
    echo '</div>';
    echo '<br>';
    $total_general += $row['total'];
}

echo '<div class="total-carrito"><strong>Total general: $' . number_format($total_general, 0, ',', '.') . '</strong></div>';
?>


            <hr>
            <section class="box1"><a href="vaciar_carrito.php" onclick="return confirm('¿Vaciar todo el carrito?');">🧹 Vaciar carrito</a></section>
            <section class="box1"><a href="https://transacciones.nequi.com/bdigital/login.jsp" onclick="return confirm('¿Desea pagar por nequi?');">Pagar</a></section>
        
</div>

</body>
</html>