<?php
session_start();
include '../obtener_datos.php'; // Archivo de conexión a la base de datos

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.php");
    exit;
}

$correo_usuario = $_SESSION['correo'];
$sql = "SELECT fecha, servicio, hora, estado FROM reservas WHERE correo_usuario = '$correo_usuario'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pet Shop | Reservas</title>
    <meta charset="iso-8859-1">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
    <!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
</head>
<body>
<div id="header">
  <a href="#" id="logo"><img src="../images/logo.gif" width="310" height="114" alt="Logo"></a>
  <ul class="navigation">
    <li><a href="../index.php">Principal</a></li>
    <li><a href="../petmart.php">Tienda de mascotas</a></li>
    <li><a href="../about.php">Sobre nosotros</a></li>
    <li><a href="../contact.php">Contactenos</a></li>
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<li class="user-menu">';
        echo '<li><a href="../usuario.php">Perfil</a></li>';
        echo '<li><a href="../cerrar_sesion.php">Cerrar Sesión</a></li>';
        echo '</ul>';
        echo '</li>';
    } else {
        echo '<li><a href="../login.php">Iniciar Sesión</a></li>';
    }
    ?>
  </ul>
</div>

<div class="sidebar-a">
    <a href="historial.php">Historial de Compras</a>
    <a href="formas_pago.php">Formas de Pago</a>
    <a href="../usuario.php">Usuario</a>
</div>

<div class="container">
    <h1>Reservas</h1>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Servicio</th>
                <th>Hora</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['fecha'] . "</td>";
                    echo "<td>" . $row['servicio'] . "</td>";
                    echo "<td>" . $row['hora'] . "</td>";
                    echo "<td>" . $row['estado'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No se encontraron reservas.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<div id="body">
    <div class="featured">
        <ul>
          <h3>*inserte anuncio*</h3>
        </ul>
    </div>
</div>

<div id="footer">
    <div id="footnote">
      <div class="section">Copyright &copy; 2024 <a href="#">Petshop Sun</a> Todos los derechos reservados por <a target="_blank" href="#">PetshopSun.com</a></div>
    </div>
</div>
</body>
</html>

<?php
$conn->close();
?>
