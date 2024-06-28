<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle del Producto - Pet Shop</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <style>
    /* Content */
    .content {
      background-color: #fff;
      padding: 20px;
      margin-top: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .product-details {
      display: flex;
      flex-wrap: wrap;
    }
    .product {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f9f9f9;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .product-image {
      max-width: 100%;
      height: auto;
      margin-bottom: 20px;
    }
    .product-info {
      text-align: center;
    }
    .product-title {
      font-size: 24px;
      margin-bottom: 10px;
    }
    .product-price {
      font-size: 18px;
      color: #333;
      margin-bottom: 20px;
    }
    .purchase-form {
      text-align: center;
    }
    .purchase-button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      font-size: 18px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }
    .purchase-button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div id="header">
    <a href="#" id="logo"><img src="images/logo.gif" width="310" height="114" alt=""></a>
    <ul class="navigation">
      <li><a href="index.php">Principal</a></li>
      <li><a href="petmart.php">Tienda de mascotas</a></li>
      <li><a href="about.php">Sobre nosotros</a></li>
      <li><a href="contact.php">Contactanos</a></li>
      <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '<li class="user-menu">';
            echo '<li><a href="usuario.php">Perfil</a></li>';
            echo '<li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>';
            echo '</li>';
        } else {
            echo '<li><a href="login.php">Iniciar Sesión</a></li>';
        }
      ?>
    </ul>
  </div>

  <div class="content">
    <h1>Detalle del Producto</h1>
    <div class="product-details">
      <?php
      if (isset($_GET['id'])) {
          $producto_id = $_GET['id'];

          include 'obtener_datos.php';

          $sql = "SELECT nombre, precio, img FROM productos WHERE id_producto = $producto_id";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              echo '<div class="product">';
              echo '<img src="' . $row["img"] . '" alt="' . $row["nombre"] . '" class="product-image">';
              echo '<div class="product-info">';
              echo '<h2 class="product-title">' . $row["nombre"] . '</h2>';
              echo '<p class="product-price">Precio: $' . $row["precio"] . '</p>';
              echo '<form action="procesar_compra.php" method="post" class="purchase-form">';
              echo '<input type="hidden" name="producto_id" value="' . $producto_id . '">';
              echo '<input type="hidden" name="producto_nombre" value="' . $row["nombre"] . '">';
              echo '<input type="hidden" name="producto_precio" value="' . $row["precio"] . '">';
              echo '<label for="cantidad">Cantidad:</label>';
              echo '<input type="number" id="cantidad" name="cantidad" value="1" min="1" required>';
              echo '<button type="submit" class="purchase-button">Comprar ahora</button>';
              echo '</form>';
              echo '</div>';
              echo '</div>';
          } else {
              echo '<p class="error-message">No se encontró información para este producto.</p>';
          }

          $conn->close();
      } else {
          echo '<p class="error-message">No se ha especificado un producto para mostrar.</p>';
      }
      ?>
    </div>
  </div>

  <div id="footer">
    <div class="section">
      <ul>
      </ul>
    </div>
    <div id="footnote">
      <div class="section">
        Copyright &copy; 2024 <a href="#">Petshop Sun</a> Todos los derechos reservados por <a target="_blank" href="#">PetshopSun.com</a>
      </div>
    </div>
  </div>
</body>
</html>
