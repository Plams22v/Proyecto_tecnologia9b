<?php
include 'conexion.php';

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
      <a href="index.html">INICIO</a>
      <a href="sobrenosotros.html">SOBRE NOSOTROS</a>
      <a href="productos.php">PRODUCTOS</a>
      <a href="contacto.html">CONTACTANOS</a>  
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
<section class="box1">
<h1> TINTOS </h1>
  <br> 
  
</section>


<section class="cont-productos">
<section class="box1">
  
  <img src="cafecaliente.jpg" alt="">
  
  
  <p>Americano del campo</p>
  <br>
  <form method="POST" action="agregar_carrito.php">
  <input type="hidden" name="producto_id" value="<?= $row['id'] ?>">
  <label for="cantidad" class="cantidad-label">Cantidad:</label>
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
  
  <img src="cafecaliente.jpg" alt="">
  
  <br>
  <p>Americano del campo</p>
  <br>
  <form method="POST" action="agregar_carrito.php">
  <input type="hidden" name="producto_id" value="<?= $row['id'] ?>">
  <label for="cantidad" class="cantidad-label">Cantidad:</label>
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
  
  <img src="cafecaliente.jpg" alt="">
  <br>
  <p>Americano del campo</p>
  <br>
  <form method="POST" action="agregar_carrito.php">
  <input type="hidden" name="producto_id" value="<?= $row['id'] ?>">
  <label for="cantidad" class="cantidad-label">Cantidad:</label>
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
  
  <img src="cafecaliente.jpg" alt="">
 
</section>

</section>
<section class="box1">
  <h1>PASTELERIA</h1> 
</section>

<section class="cont-productos">
<section class="box1">
  <img src="cafecaliente.jpg" alt="">
  <h1>PASTELERÍA DE DULCE</h1>
   <p>Corazón <br> Galletas <br> Mora <br> Muffin</p>
  <h1>TORTAS</h1>
  <p></p>
 
</section>

<section class="box1">
  
  <img src="cafecaliente.jpg" alt="">
 
</section>

<section class="box1">
  
  <img src="cafecaliente.jpg" alt="">
 
</section>

<section class="box1">
  
  <img src="cafecaliente.jpg" alt="">
 
</section>

<section class="box1">
  
  <img src="cafecaliente.jpg" alt="">
 
</section>

<section class="box1">
  
  <img src="cafecaliente.jpg" alt="">
 
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
