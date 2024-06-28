<?php
session_start();
?>
<?php
include 'obtener_datos.php';

// Recuperar categorías
$sql = "SELECT id_categoria, categoria, img FROM categoria";
$result = $conn->query($sql);
?>

<?php
include 'obtener_datos.php';

// Recuperar categorías
$sql = "SELECT id_categoria, categoria FROM categoria";
$result_categorias = $conn->query($sql);

// Inicializar la variable de búsqueda
$search = '';
if (isset($_GET['s'])) {
    $search = $_GET['s'];
    // Consulta SQL para buscar productos por nombre
    $sql_productos = "SELECT * FROM productos WHERE nombre LIKE '%$search%'";
    $result_productos = $conn->query($sql_productos);
} else {
    // Consulta SQL para obtener todos los productos
    $sql_productos = "SELECT * FROM productos";
    $result_productos = $conn->query($sql_productos);
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Pet Shop | Tienda de mascotas</title>
<meta charset="iso-8859-1">
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
<!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
</head>
<body>
<div id="header"> <a href="#" id="logo"><img src="images/logo.gif" width="310" height="114" alt=""></a>
  <ul class="navigation">
    <li><a href="index.php">Principal</a></li>
    <li class="active"><a href="petmart.php">Tienda de mascotas</a></li>
    <li><a href="about.php">Sobre nosotros</a></li>
    <li><a href="contact.php">Contactanos</a></li>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        // Si el usuario está logueado, mostrar botón con nombre de usuario y menú desplegable
        echo '<li class="user-menu">';
        echo '<li><a href="usuario.php">Perfil</a></li>';
        echo '<li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>';
        echo '</ul>';
        echo '</li>';
    } else {
        // Si no está logueado, mostrar enlace para iniciar sesión
        echo '<li><a href="login.php">Iniciar Sesión</a></li>';
    }
    ?>
  </ul>
</div>
<div id="body">
  <div id="content">
    <div class="search">
      <form action="buscar.php" method="get">
        <input type="text" name="s" value="<?php echo htmlspecialchars($search); ?>" placeholder="Buscar productos">
        <button type="submit">Buscar</button>
      </form>
    </div>
    <div class="content">
      <ul>
        <?php
        if ($result->num_rows > 0) {
            // Salida de datos de cada fila
            while($row = $result->fetch_assoc()) {
                echo '<li><a href="productos.php?categoria_id=' . $row["id_categoria"] . '"><img src="' . $row["img"] . '" width="140" height="250" alt="' . $row["categoria"] . '"></a>';
                echo '<h2>' . $row["categoria"] . '</h2>';
                echo '</li>';
            }
        } else {
            echo "0 resultados";
        }
        $conn->close();
        ?>
      </ul>
    </div>
    <div id="sidebar"> <a href="#"><img src="images/discount.jpg" width="300" height="790" alt=""></a> </div>
  </div>
  <div class="featured">
    <ul>
      
    </ul>
  </div>
</div>
<div id="footer">
  <div class="section">
  </div>
  <div id="footnote">
    <div class="section">Copyright &copy; 2024 <a href="#">Petshop Sun</a> Todos los derechos reservados por <a target="_blank" href="#">PetshopSun.com</a></div>
  </div>
</div>
</body>
</html>
