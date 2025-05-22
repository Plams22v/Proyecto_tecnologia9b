<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = intval($_POST['usuario_id']);
    $producto_id = intval($_POST['id']);
    $cantidad = intval($_POST['cantidad']);

    if ($usuario_id > 0 && $producto_id > 0 && $cantidad > 0) {
        // Verificar si ya existe en el carrito
        $stmt = $pdo->prepare("SELECT * FROM carrito WHERE id_usuario = ? AND producto_id = ?");
        $stmt->execute([$usuario_id, $producto_id]);
        $item = $stmt->fetch();

        if ($item) {
            // Actualizar cantidad
            $stmt = $pdo->prepare("UPDATE carrito SET cantidad = cantidad + ? WHERE id = ?");
            $stmt->execute([$cantidad, $item['id']]);
        } else {
            // Insertar nuevo
            $stmt = $pdo->prepare("INSERT INTO carrito (id_usuario, producto_id, cantidad) VALUES (?, ?, ?)");
            $stmt->execute([$usuario_id, $producto_id, $cantidad]);
        }

        header('Location: carrito.php');
        exit();
    } else {
        echo "Datos inválidos.";
    }
}
?>