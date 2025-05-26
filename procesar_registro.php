<?php
include 'conexion.php';
session_start();

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "Correo ya registrado. <a href='registro.php'>Volver</a>";
    exit;
}

$stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $correo, $contrasena);
if ($stmt->execute()) {
    header("Location: login.php");
} else {
    echo "Error al crear usuario: " . $conn->error;
}
?>
