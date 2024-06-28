<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pet Shop | Historial de Compras</title>
    <meta charset="iso-8859-1">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
    <!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
    <style>
        /**-------------- historial de compras  ---------------**/
table {
	width: 100%;
	border-collapse: collapse;
	margin: 20px 0;
}
table, th, td {
	border: 1px solid #ddd;
}
th, td {
	padding: 15px;
	text-align: left;
}
th {
	background-color: #f2f2f2;
}
.container {
	padding: 20px;
}
    </style>
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
        // Si el usuario está logueado, mostrar botón con nombre de usuario y menú desplegable
        echo '<li class="user-menu">';
        echo '<li><a href="../usuario.php">Perfil</a></li>';
        echo '<li><a href="../cerrar_sesion.php">Cerrar Sesión</a></li>';
        echo '</ul>';
        echo '</li>';
    } else {
        // Si no está logueado, mostrar enlace para iniciar sesión
        echo '<li><a href="../login.php">Iniciar Sesión</a></li>';
    }
    ?>
  </ul>
</div>
<div class="sidebar-a">
    <a href="../user/reservas.php">Reservas</a>
    <a href="../user/formas_pago.php">Formas de Pago</a>
    <a href="../usuario.php">Usuario</a>
</div>

<div class="container">
    <h1>Historial de Compras</h1>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../obtener_datos.php'; // Archivo de conexión a la base de datos

            // Verificar si el usuario está logueado
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                $correo = $_SESSION['correo'];

                // Consulta SQL para obtener el historial de compras del usuario
                $sql = "SELECT fecha, producto, cantidad, precio, estado FROM historial WHERE correo = '$correo'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Mostrar cada fila del resultado
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['fecha'] . "</td>";
                        echo "<td>" . $row['producto'] . "</td>";
                        echo "<td>" . $row['cantidad'] . "</td>";
                        echo "<td>" . $row['precio'] . "</td>";
                        echo "<td>" . $row['estado'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No se encontraron compras.</td></tr>";
                }

                $conn->close();
            } else {
                echo "<tr><td colspan='5'>Por favor, inicia sesión para ver tu historial de compras.</td></tr>";
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
