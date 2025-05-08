<?php
include 'conexion.php';

$producto_id = $_POST['producto_id'];
$usuario_id = $_POST['usuario_id'];

// Verificar si ya existe el producto en el carrito del usuario
$sql = "SELECT * FROM carrito WHERE producto_id = $producto_id AND id_usuario = $usuario_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Ya está en el carrito, solo aumentar la cantidad
    $sql = "UPDATE carrito SET cantidad = cantidad + 1 WHERE producto_id = $producto_id AND id_usuario = $usuario_id";
} else {
    // Agregar nuevo
    $sql = "INSERT INTO carrito (id_usuario, producto_id, cantidad) VALUES ($usuario_id, $producto_id, 1)";
}

mysqli_query($conn, $sql);
header("Location: carrito.html"); // Redirige después de agregar
?>
