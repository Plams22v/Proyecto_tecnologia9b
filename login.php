<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 25px;
        }
        .login-container label {
            display: block;
            margin-bottom: 5px;
            margin-top: 15px;
        }
        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 2px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-container button {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color:rgb(116, 91, 59);
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }
        .login-container p {
            text-align: center;
            margin-top: 15px;
        }
        .login-container a {
            color: #4285f4;
            text-decoration: none;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <section class="login-container">
        <h2>Iniciar sesión</h2>
        <form method="POST" action="procesar_login.php">
            <label for="correo">Correo electrónico:</label>
            <input type="email" name="correo" id="correo" required>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" required>

            <button type="submit">Entrar</button>
        </form>
        <p>¿No tienes cuenta? <a href="registrarse.php">Regístrate aquí</a></p>
    </section>
</body>
</html>