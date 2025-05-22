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
  <link rel="stylesheet" href="estilo.css" />
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
  
    <section class="box1" id="bebidas">
  <h1>Bebidas Calientes</h1>
  <br> 
  
</section>
<br>



<section class="cont-productos">
<section class="box1">
  
  <img src="cafecaliente.jpg" alt="">
  
  
  <p>Americano</p>
  <br>
  
<form action="agregar_carrito.php" method="POST">
  
<input type="hidden" name="id_producto" value="<?php echo $producto['id']; ?>">


<input type="number" id="cantidad" name="cantidad" value="1" min="1" class="input-cantidad" aria-label="Cantidad de productos">
  
<button type="submit">Agregar al carrito</button>

</form>


</section>

<section class="box1">
<img src="https://www.cocina-chilena.com/base/stock/Recipe/chocolate-caliente-chileno/chocolate-caliente-chileno_web.jpg.webp" alt=""> 
  <p>Chocolate</p>
   
<form method="POST" action="agregar_carrito.php">
      <input type="hidden" name="nombre" value="Americano">
      <label for="cantidad">Cantidad:</label>
      <input type="number" name="cantidad" value="1" min="1">
      <button type="submit">Agregar al carrito</button>
  </form>


  <br>
</section>

<section class="box1">
<img src="https://blog.renaware.com/wp-content/uploads/2023/09/Te-chai-1-1100x732.jpg" alt=""> 
<p>Té Chai</p>
  <br>

<input 
    type="number" 
    id="cantidad" 
    name="cantidad" 
    value="1" 
    min="1" 
    class="input-cantidad" 
    aria-label="Cantidad de productos">
  <button type="submit">Agregar al carrito</button>
  
</form>

  
</section>

<section class="box1">
<img src="https://perfectdailygrind.com/es/wp-content/uploads/sites/2/2022/04/image5-1.jpg" alt="">   
<p>Latte sencillo</p>
  <br>0

  <input 
    type="number" 
    id="cantidad" 
    name="cantidad" 
    value="1" 
    min="1" 
    class="input-cantidad" 
    aria-label="Cantidad de productos">
  <button type="submit">Agregar al carrito</button>
  
</form>
  
</section>
<section class="box1">
<img src="https://www.somoselcafe.com.ar/img/novedades/8.webp" alt=""> 
<p>Espresso doble</p>
  <br>

<input 
    type="number" 
    id="cantidad" 
    name="cantidad" 
    value="1" 
    min="1" 
    class="input-cantidad" 
    aria-label="Cantidad de productos">
  <button type="submit">Agregar al carrito</button>
  
</form>

</section>

<section class="box1">
<img src="https://perfectdailygrind.com/es/wp-content/uploads/sites/2/2020/03/Cortadito-1.png" alt="">
<p>Espresso Cortado</p>
  <br>

<input 
    type="number" 
    id="cantidad" 
    name="cantidad" 
    value="1" 
    min="1" 
    class="input-cantidad" 
    aria-label="Cantidad de productos">
  <button type="submit">Agregar al carrito</button>
  
</form>

  
</section>
</section>

<section class="box2" id="comida">
  <h1>COMIDA</h1> 
  
</section>


<section class="cont-productos">
<section class="box1">
  
  <img src="https://gbprodstorage.blob.core.windows.net/files/styles/recipe_main_image_670x420/windowsazurestorage/recipes/1540180568258eeee33c3e106590588bd1b71a2b5a.jpg" alt="">
  
  
  <p>Sandwiches de pollo</p>
  <br>
  <form method="POST" action="agregar_carrito.php">
      <input type="hidden" name="nombre" value="Americano">
      <label for="cantidad">Cantidad:</label>
      <input type="number" name="cantidad" value="1" min="1">
      <button type="submit">Agregar al carrito</button>
  </form>

</section>

<section class="box1">
<img src="https://i.blogs.es/0e55d6/sandwich-mixto-rec/1366_2000.jpg" alt=""> 
<br>  
<p>Sandwich de jamon y queso</p>
   <br>
<form method="POST" action="agregar_carrito.php">
      <input type="hidden" name="nombre" value="Americano">
      <label for="cantidad">Cantidad:</label>
      <input type="number" name="cantidad" value="1" min="1">
      
      <br>
      <button type="submit">Agregar al carrito</button>
  </form>


  <br>
</section>

<section class="box1">
<img src="https://i.blogs.es/f4a03e/arepas2/1366_2000.jpg" alt=""> 
<p>Arepa</p>
  <br>

<input 
    type="number" 
    id="cantidad" 
    name="cantidad"   
    value="1" 
    min="1" 
    class="input-cantidad" 
    aria-label="Cantidad de productos">
  <button type="submit">Agregar al carrito</button>
  
</form>

  
</section>

<section class="box1">
<img src="https://familiakitchen.com/wp-content/uploads/2021/06/Carne-mechada-apepa-700x467.jpg.webp" alt="">   
<p>Arepa con carne desmechada</p>
  <br>

<input 
    type="number" 
    id="cantidad" 
    name="cantidad" 
    value="1" 
    min="1" 
    class="input-cantidad" 
    aria-label="Cantidad de productos">
  <button type="submit">Agregar al carrito</button>
  
</form>
  
</section>
<section class="box1">
<img src="https://www.elespectador.com/resizer/v2/6NO54AYDNREZREIJBYOBNIWR7E.jpg?auth=d11f89f3c1dca459bb2cc44191abea199ad2d2f3661f383f66c1d16133507bd0&width=920&height=613&smart=true&quality=60" alt=""> 
<p>Ensaladad Mexicana</p>
  <br>

<input 
    type="number" 
    id="cantidad" 
    name="cantidad" 
    value="1" 
    min="1" 
    class="input-cantidad" 
    aria-label="Cantidad de productos">
  <button type="submit">Agregar al carrito</button>
  
</form>

</section>

<section class="box1">
<img src="https://www.elespectador.com/resizer/v2/PV74KYK7SZACHAQS44UOAS2AZU.jpg?auth=dcd75e1e589cb282b6dc77e089c2274be78828eed8a3ead5f3a41dc6a893008e&width=920&height=613&smart=true&quality=60" alt="">
<p>Ensalada de pollo</p>
  <br>

<input 
    type="number" 
    id="cantidad" 
    name="cantidad" 
    value="1" 
    min="1" 
    class="input-cantidad" 
    aria-label="Cantidad de productos">
  <button type="submit">Agregar al carrito</button>
  
</form>

  
</section>
</section>


</section>
<section class="box1" id="pastel">
  <h1>PASTELERIA</h1>
   
</section>
<section class="cont-productos">
<section class="box1">
  
<img src="https://recetasdecocina.elmundo.es/wp-content/uploads/2015/09/cookies-receta.jpg" alt="">
  <br>
  
  <p>Galletas </p>
  <br>
  <form method="POST" action="agregar_carrito.php">
      <input type="hidden" name="nombre" value="Americano">
      <label for="cantidad">Cantidad:</label>
      <input type="number" name="cantidad" value="1" min="1">
      <button type="submit">Agregar al carrito</button>
  </form>

</section>



<section class="box1">
<img src="https://recetas.encolombia.com/wp-content/uploads/2021/03/Almojabana.jpg" alt=""> 
<p>Almojabanas</p>
  <br>

<input 
    type="number" 
    id="cantidad" 
    name="cantidad" 
    value="1" 
    min="1" 
    class="input-cantidad" 
    aria-label="Cantidad de productos">
  <button type="submit">Agregar al carrito</button>
  
</form>

  
</section>

<section class="box1">
<img src="https://www.recetasnestle.com.ve/sites/default/files/styles/recipe_detail_desktop_new/public/srh_recipes/e29w28ff551a360cdadb4e5a2528841b7.webp?itok=xG-v6W1S" alt="">   
<p>Torta de chocolate</p>
  <br>

<input 
    type="number" 
    id="cantidad" 
    name="cantidad" 
    value="1" 
    min="1" 
    class="input-cantidad" 
    aria-label="Cantidad de productos">
  <button type="submit">Agregar al carrito</button>
  
</form>
  
</section>
<section class="box1">
<img src="https://www.infobae.com/resizer/v2/3TB63YQTZRHOFJCEJYKOFFKOSY.jpg?auth=8af34bd83cf84dae26274283ff35dd256485b7f81d3c5133add00d72b88ca846&smart=true&width=992w&height=558&quality=85" alt=""> 
<p>Croissant</p>
  <br>

<input 
    type="number" 
    id="cantidad" 
    name="cantidad" 
    value="1" 
    min="1" 
    class="input-cantidad" 
    aria-label="Cantidad de productos">
  <button type="submit">Agregar al carrito</button>
  
</form>

</section>

<section class="box1">
<img src="https://www.infobae.com/resizer/v2/3TB63YQTZRHOFJCEJYKOFFKOSY.jpg?auth=8af34bd83cf84dae26274283ff35dd256485b7f81d3c5133add00d72b88ca846&smart=true&width=992w&height=558&quality=85" alt="">

<p>Palitos de queso</p>
  <br>

<input 
    type="number" 
    id="cantidad" 
    name="cantidad" 
    value="1" 
    min="1" 
    class="input-cantidad" 
    aria-label="Cantidad de productos">
  <button type="submit">Agregar al carrito</button>
  
</form>

  
</section>
</section>




</section>

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
