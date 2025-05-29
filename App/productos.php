<?php
include 'conexion.php';

$sql = "SELECT * FROM productos";
$resultado = $conn->query($sql);

if (isset($_GET['productos'])) {
    if ($_GET['productos'] == 'success') {
        echo "<p style='color: green;'>✅ Producto agregado correctamente.</p>";
    } elseif ($_GET['productos'] == 'error') {
        echo "<p style='color: red;'>❌ Error al agregar el producto.</p>";
    } elseif ($_GET['productos'] == 'error_datos') {
        echo "<p style='color: red;'>❌ Faltan datos en el formulario.</p>";
    }
}

session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Página principal</title>
  <link rel="stylesheet" href="estilo2.css" />
  <link rel="icon" href="Logo.png">
</head>
<body>

  <!-- Volver arriba -->
  <div id="ar"></div> 

  <!-- Encabezado -->
  <header>
    <a href="index.html" class="logo" style="float: left;">
      <img src="Logo.png" alt="coffe" style="text-align: left;" />
      <h2 class="nombre"></h2>
    </a>

    <!-- Enlaces -->
    <nav>
      <a href="index.php">INICIO</a>
      <a href="sobrenosotros.html">SOBRE NOSOTROS</a>
      <a href="productos.php">PRODUCTOS</a>
      <a href="contacto.php">CONTACTANOS</a>  
      <a href="logout.php">CERRAR SESION</a>
      <a href="carrito.php" id="carrito-icono">
        <img src="https://cdn-icons-png.flaticon.com/512/60/60992.png" alt="Carrito" class="carrito-nav" style=" width:60px; height: 60px; margin-left: 10px;">
        </a>
    </nav>
  </header>

    <!-- Productos -->
    <section class="box1">
  <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?> 👋</h1>
    
  </section>
  <br>
<?php
session_start();
include 'conexion.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM productos";
$resultado = $conn->query($sql);
?>

<?php
// Conectarse y obtener los productos

include 'conexion.php';
$categorias = ['Bebidas', 'Comida', 'Pastelería'];

foreach ($categorias as $cat) {
    echo '<section class="box1">';  // Aquí envuelves toda la categoría en un box1
    echo "<h2>$cat</h2>";
    echo '<section class="cont-productos">';  // Aquí va el contenedor de productos

    $stmt = $conn->prepare("SELECT * FROM productos WHERE categoria = ?");
    $stmt->bind_param("s", $cat);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($producto = $result->fetch_assoc()) {
        echo '<section class="box1">';  // Cada producto también está en un box1
        echo '<img src="' . htmlspecialchars($producto['imagen']) . '" alt="">';
        echo '<p>' . htmlspecialchars($producto['nombre']) . '</p>';
        
        echo '<p>Precio: $' . htmlspecialchars($producto['precio']) . '</p>';
        echo '<br>';
        echo '<form action="agregar_carrito.php" method="POST">';
        echo '<input type="hidden" name="producto_id" value="' . $producto['id'] . '">';
        echo '<input type="number" name="cantidad" class="input-cantidad" value="1" min="1">';
        echo '<button type="submit">Agregar al carrito</button>';
        echo '</form>';
        echo '</section>';
    }

    echo '</section>';  // fin cont-productos
    echo '</section>';  // fin box1 categoría
}
?>



    <!-- Botón volver arriba -->
    <a href="#ar">
      <button class="btnsubir">
        <img src="https://images.icon-icons.com/1339/PNG/512/uparrow_87464.png" alt="subir" style="width: 50px; height: 50px;">
      </button>
    </a>
  </main>

  <br>
  <!-- Pie de página -->
  <footer>
    <p style="display: flex; align-self:flex-start; opacity: 70%;">&copy;2025 Todos los derechos reservados a CAFE ROYALE.</p>
  </footer>
  <script src="eventos.js"></script>
</body>
</html>
