<?php
include 'conexion.php';

$usuario_id = 123; // Simulado. En producción usar $_SESSION['usuario_id']
$producto_id = $_POST['producto_id'];
$cantidad = $_POST['cantidad'];

// Verificar si ya está en el carrito
$sql_check = "SELECT * FROM carrito WHERE id_usuario = $usuario_id AND producto_id = $producto_id";
$result = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($result) > 0) {
    // Actualizar cantidad
    $sql_update = "UPDATE carrito SET cantidad = cantidad + $cantidad WHERE id_usuario = $usuario_id AND producto_id = $producto_id";
    mysqli_query($conn, $sql_update);
} else {
    // Insertar nuevo
    $sql_insert = "INSERT INTO carrito (id_usuario, producto_id, cantidad) VALUES ($usuario_id, $producto_id, $cantidad)";
    mysqli_query($conn, $sql_insert);
}

// Redirigir automáticamente al carrito
$redirigir = $_POST['redirigir'] ?? 'carrito';

if ($redirigir === 'productos') {
    header("Location: productos.php");
} else {
    header("Location: carrito.php");
}
exit;
?>
