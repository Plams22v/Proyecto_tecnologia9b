<?php
include 'conexion.php';
session_start();

if (!isset($_SESSION['id_usuario'])) {
    // Si no hay sesión iniciada, va a la página de inicio de sesión
    header("Location: login.php?mensaje=Debes iniciar sesión para agregar al carrito.");
    
}

$id_usuario = $_SESSION['id_usuario'];
$producto_id = $_POST['id'] ?? null;

if (!$producto_id) {
    die("Error: producto_id no recibido.");
}

$cantidad = $_POST['cantidad'] ?? 1;

// Verificar si ya existe ese producto en el carrito
$sql = "SELECT * FROM carrito WHERE id_usuario = ? AND producto_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $id_usuario, $producto_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Si ya existe, actualizar la cantidad
    $sql = "UPDATE carrito SET cantidad = cantidad + ? WHERE id_usuario = ? AND producto_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $cantidad, $id_usuario, $producto_id);
} else {
    // Si no existe, insertar nuevo
    $sql = "INSERT INTO carrito (id_usuario, producto_id, cantidad) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $id_usuario, $producto_id, $cantidad);
}


if ($stmt->execute()) {
    header("Location: productos.php?mensaje=Producto agregado");
} else {
    echo "Error al agregar al carrito: " . $conn->error;
    header("Location: productos.php?mensaje=Error al agregar al carrito");
    die();
    // Puedes redirigir a una página de error o mostrar un mensaje
}
?>
