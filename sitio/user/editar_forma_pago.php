<?php
session_start();
include '../obtener_datos.php'; // Archivo de conexión a la base de datos

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];
$correo_usuario = $_SESSION['correo'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $numero_tarjeta = $_POST['numero_tarjeta'];
    $fecha_expiracion = $_POST['fecha_expiracion'];
    $nombre_titular = $_POST['nombre_titular'];

    $sql = "UPDATE forma_pago SET tipo='$tipo', numero_tarjeta='$numero_tarjeta', fecha_expiracion='$fecha_expiracion', nombre_titular='$nombre_titular' WHERE id_forma_pago='$id' AND correo_usuario='$correo_usuario'";

    if ($conn->query($sql) === TRUE) {
        header("Location: formas_pago.php");
        exit;
    } else {
        echo "Error al actualizar la forma de pago: " . $conn->error;
    }
} else {
    $sql = "SELECT tipo, numero_tarjeta, fecha_expiracion, nombre_titular FROM forma_pago WHERE id_forma_pago='$id' AND correo_usuario='$correo_usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontró la forma de pago.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pet Shop | Editar Forma de Pago</title>
    <meta charset="iso-8859-1">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
    <!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
    <style>
        .container {
            padding: 20px;
            margin-left: 220px; /* Añadir margen para no superponer el contenido principal */
        }
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="number"], input[type="month"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 4px;
        }
        .button:hover {
            background-color: #45a049;
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

<div class="container">
    <h1>Editar Forma de Pago</h1>
    <form action="" method="post">
        <label for="tipo">Tipo de Tarjeta</label>
        <input type="text" id="tipo" name="tipo" value="<?php echo $row['tipo']; ?>" required>
        
        <label for="numero_tarjeta">Numero de Tarjeta</label>
        <input type="number" id="numero_tarjeta" name="numero_tarjeta" value="<?php echo $row['numero_tarjeta']; ?>" required>
        
        <label for="fecha_expiracion">Fecha de Expiracion</label>
        <input type="month" id="fecha_expiracion" name="fecha_expiracion" value="<?php echo $row['fecha_expiracion']; ?>" required>
        
        <label for="nombre_titular">Nombre del Titular</label>
        <input type="text" id="nombre_titular" name="nombre_titular" value="<?php echo $row['nombre_titular']; ?>" required>
        
        <input type="submit" class="button" value="Actualizar Forma de Pago">
    </form>
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
