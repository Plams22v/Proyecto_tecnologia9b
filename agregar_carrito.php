<?php
include 'conexion.php';

// Validar que se recibió la información
if (isset($_POST['id']) && isset($_POST['cantidad'])) {
    $id = $_POST['id'];
    $cantidad = (int)$_POST['cantidad'];

    // Consulta preparada
    $stmt = $conn->prepare("INSERT INTO productos (nombre, cantidad) VALUES (?, ?)");
    $stmt->bind_param("si", $nombre, $cantidad);

    if ($stmt->execute()) {
        header("Location: productos.php?mensaje=success");
    } else {
        header("Location: productos.php?mensaje=error");
    }

    $stmt->close();
    $conn->close();
    exit;
} else {
    // Datos no enviados correctamente
    header("Location: productos.php?mensaje=error_datos");
    exit;
}
?>
