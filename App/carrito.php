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
    echo '<a href="eliminar_producto.php?id=' . $row['id'] . '" class="btn-carrito" onclick="return confirm(\'¿Eliminar este producto?\');">Eliminar</a>';
    echo '</div>';
    $total_general += $row['total'];
}

echo '<div class="total-carrito"><strong>Total general: $' . number_format($total_general, 0, ',', '.') . '</strong></div>';
?>


            <hr>
        <a href="vaciar_carrito.php" onclick="return confirm('¿Vaciar todo el carrito?');">🧹 Vaciar carrito</a>
</div>

</body>
</html>