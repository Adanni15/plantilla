<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Productos de Pet Shop</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style.css" rel="stylesheet" type="text/css">

  <!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
  <!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
  <style>

.products {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
}

.products li {
  list-style-type: none;
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.products li img {
  max-width: 300px;
  height: auto;
  border-radius: 5px;
}

.products li h2 {
  margin-top: 10px;
  font-size: 20px;
}

.products li p {
  margin-top: 10px;
  font-size: 16px;
  color: #555;
}


  </style>
</head>
<body>
<div id="header"> <a href="#" id="logo"><img src="images/logo.gif" width="310" height="114" alt=""></a>
  <ul class="navigation">
    <li><a href="index.php">Principal</a></li>
    <li><a href="petmart.php">Tienda de mascotas</a></li>
    <li><a href="about.php">Sobre nosotros</a></li>
    <li><a href="contact.php">Contactanos</a></li>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        // Si el usuario está logueado, mostrar botón con nombre de usuario y menú desplegable
        echo '<li class="user-menu">';
        echo '<li><a href="usuario.php">Perfil</a></li>';
        echo '<li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>';
        echo '</li>';
    } else {
        // Si no está logueado, mostrar enlace para iniciar sesión
        echo '<li><a href="login.php">Iniciar Sesión</a></li>';
    }
    ?>
  </ul>
</div>

<div class="content">
  <h1>Productos de la Tienda de Mascotas</h1>
  <div class="products">
    <ul>
      <?php
      // Verificar si se recibió el parámetro categoria_id
      if (isset($_GET['categoria_id'])) {
          $categoria_id = $_GET['categoria_id'];

          // Incluir archivo de conexión a la base de datos
          include 'obtener_datos.php';

          // Consulta para obtener productos de la categoría específica
          $sql = "SELECT id_producto, nombre, precio, img FROM productos WHERE categoria_id = $categoria_id";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              // Mostrar productos
              while($row = $result->fetch_assoc()) {
                  echo '<li>';
                  echo '<a href="detalle_producto.php?id=' . $row["id_producto"] . '">';
                  echo '<img src="' . $row["img"] . '" alt="' . $row["nombre"] . '" style="max-width: 200px;">'; // Mostrar la imagen con el nombre como alt
                  echo '</a>';
                  echo '<h2>' . $row["nombre"] . '</h2>';
                  echo '<p>Precio: $' . $row["precio"] . '</p>';
                  echo '</li>';
              }
          } else {
              echo "No se encontraron productos para esta categoría.";
          }

          $conn->close();
      } else {
          echo "No se ha especificado una categoría.";
      }
      ?>
    </ul>
  </div>
</div>

<div id="footer">
  <div class="section">
    <ul>
    </ul>
  </div>
  <div id="footnote">
    <div class="section">Copyright &copy; 2024 <a href="#">Petshop Sun</a> Todos los derechos reservados por<a target="_blank" href="#">PetshopSun.com</a></div>
  </div>
</div>
</body>
</html>
