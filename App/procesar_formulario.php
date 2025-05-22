<?php
include 'conexion.php';

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];
$calificacion = isset($_POST['calificacion']) ? $_POST['calificacion'] : NULL;

// Usar consultas preparadas para evitar inyección SQL
$stmt = $conn->prepare("INSERT INTO mensajes (nombre, email, mensaje, calificacion) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $nombre, $email, $mensaje, $calificacion);

if ($stmt->execute()) {
    header("Location: contacto.php?mensaje=success");
} else {
    header("Location: contacto.php?mensaje=error");
}

$stmt->close();
$conn->close();
exit;
?>