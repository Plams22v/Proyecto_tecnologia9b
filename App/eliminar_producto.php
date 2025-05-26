<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id_usuario = $_SESSION['id_usuario'];
    $id_item = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM carrito WHERE id = ? AND id_usuario = ?");
    $stmt->bind_param("ii", $id_item, $id_usuario);
    $stmt->execute();
}

header("Location: carrito.php");
exit();
?>
