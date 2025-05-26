<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_usuario = $_SESSION['id_usuario'];
    $producto_id = intval($_POST['producto_id']);
    $cantidad = intval($_POST['cantidad']);

    // Verifica si ya está en el carrito
    $stmt = $conn->prepare("SELECT id, cantidad FROM carrito WHERE id_usuario = ? AND producto_id = ?");
    $stmt->bind_param("ii", $id_usuario, $producto_id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($fila = $resultado->fetch_assoc()) {
        $nuevaCantidad = $fila['cantidad'] + $cantidad;
        $update = $conn->prepare("UPDATE carrito SET cantidad = ? WHERE id = ?");
        $update->bind_param("ii", $nuevaCantidad, $fila['id']);
        $update->execute();
    } else {
        $insert = $conn->prepare("INSERT INTO carrito (id_usuario, producto_id, cantidad) VALUES (?, ?, ?)");
        $insert->bind_param("iii", $id_usuario, $producto_id, $cantidad);
        $insert->execute();
    }
}

header("Location: carrito.php");
exit();
?>
