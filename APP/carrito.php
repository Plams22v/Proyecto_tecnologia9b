<?php
include 'conexion.php';

$usuario_id = 123; // Simulado. En producción usar $_SESSION['usuario_id']

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
      <img src="https://cdn-icons-png.flaticon.com/512/60/60992.png" alt="Carrito" class="carrito-nav" style="width:60px; height: 60px; margin-left: 10px;">
    </a>
  </nav>
</header>

<section class="box1">
  <h1>Tu carrito 🛒</h1>
</section>

<?php if (mysqli_num_rows($result) > 0): ?>
  <?php while($row = mysqli_fetch_assoc($result)): ?>
    <div>
      <p><?= htmlspecialchars($row['nombre']) ?> x <?= (int)$row['cantidad'] ?></p>
      <p>$<?= number_format($row['precio'] * $row['cantidad'], 2) ?></p>
    </div>
    <?php $total += $row['precio'] * $row['cantidad']; ?>
  <?php endwhile; ?>

  <h3>Total: $<?= number_format($total, 2) ?></h3>

  <!-- Contenedor del botón de PayPal -->
  <div id="paypal-button-container" style="margin-top: 20px;"></div>

  <!-- SDK de PayPal -->
  <script src="https://www.paypal.com/sdk/js?client-id=TU_CLIENT_ID&currency=USD"></script>
  <script>
    paypal.Buttons({
      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '<?= number_format($total, 2, '.', '') ?>'
            }
          }]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          alert('Pago completado por ' + details.payer.name.given_name);
          window.location.href = 'gracias.php';
        });
      }
    }).render('#paypal-button-container');
  </script>

<?php else: ?>
  <p>No hay productos en tu carrito.</p>
<?php endif; ?>

</body>
</html>
