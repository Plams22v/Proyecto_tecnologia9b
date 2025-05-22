<?php
require 'conexion.php';
include 'conexion.php';
session_start();

if (!isset($_SESSION['id_usuario'])) {
  header("Location: login.php");
  exit;
}

$usuario_id = $_SESSION['usuario_id'];

$query = "
    SELECT p.nombre, p.precio, c.cantidad, (p.precio * c.cantidad) AS total
    FROM carrito c
    JOIN productos p ON c.producto_id = p.id
    WHERE c.id_usuario = ?
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

$total_general = 0;
?>

<h2>Tu carrito</h2>
<table>
    <tr>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Total</th>
    </tr>
    <?php while ($fila = $result->fetch_assoc()) {
        $total_general += $fila['total'];
    ?>
        <tr>
            <td><?php echo $fila['nombre']; ?></td>
            <td>$<?php echo $fila['precio']; ?></td>
            <td><?php echo $fila['cantidad']; ?></td>
            <td>$<?php echo $fila['total']; ?></td>
        </tr>
    <?php } ?>
</table>

<p><strong>Total a pagar: $<?php echo $total_general; ?></strong></p>
