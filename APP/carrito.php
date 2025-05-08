<?php
include 'conexion.php';
$usuario_id = 123; // en un sistema real, esto vendría de $_SESSION

$sql = "SELECT p.nombre, p.precio, c.cantidad 
        FROM carrito c 
        JOIN productos p ON p.id = c.producto_id 
        WHERE c.id_usuario = $usuario_id";

$result = mysqli_query($conn, $sql);
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
  <title>Carrito</title>
</head>
<body>
  <h1>Tu carrito</h1>

  <?php while($row = mysqli_fetch_assoc($result)): ?>
    <div>
      <p><?= $row['nombre'] ?> x <?= $row['cantidad'] ?></p>
      <p>$<?= $row['precio'] * $row['cantidad'] ?></p>
    </div>
    <?php $total += $row['precio'] * $row['cantidad']; ?>
  <?php endwhile; ?>

  <h3>Total: $<?= $total ?></h3>
</body>
</html>
