<?php
// Incluir archivo de conexión a la base de datos
include 'obtener_datos.php';

// Inicializar variables
$nombre = $correo = $password = $telefono = $direccion = '';
$error_msg = '';

// Procesar los datos del formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y sanitizar los datos recibidos
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $password = htmlspecialchars($_POST['password']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $direccion = htmlspecialchars($_POST['direccion']);

    // Validar que no haya campos vacíos
    if (empty($nombre) || empty($correo) || empty($password) || empty($telefono) || empty($direccion)) {
        $error_msg = "Por favor, complete todos los campos.";
    } else {
        // Verificar si el correo ya está registrado
        $sql_check = "SELECT id_usuario FROM usuario WHERE correo = '$correo'";
        $result_check = $conn->query($sql_check);
        if ($result_check->num_rows > 0) {
            $error_msg = "El correo electrónico ya está registrado.";
        } else {
            // Insertar nuevo usuario en la base de datos
            $sql_insert = "INSERT INTO usuario (nombre, correo, password, telefono, direccion) VALUES ('$nombre', '$correo', '$password', '$telefono', '$direccion')";
            if ($conn->query($sql_insert) === TRUE) {
                // Redirigir al usuario después de registrar exitosamente
                header("Location: login.php");
                exit;
            } else {
                $error_msg = "Error al registrar el usuario: " . $conn->error;
            }
        }
    }
}

// Cerrar conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar Usuario - Pet Shop</title>
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <style>
    /* Estilos adicionales para el formulario */
    body {
      font-family: Arial, sans-serif;
      background-color: #f3f3f3;
    }
    #body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    #content {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 300px;
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: calc(100% - 20px);
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }
    button[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    button[type="submit"]:hover {
      background-color: #45a049;
    }
    .error {
      color: red;
      font-size: 14px;
      text-align: center;
      margin-bottom: 10px;
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
    <li><a href="login.php">Iniciar Sesión</a></li> <!-- Enlace activo en la página de inicio de sesión -->
    <li><a href="registrar.php">Registrarse</a></li> <!-- Nuevo enlace para registrar -->
  </ul>
</div>

<div id="body">
  <div id="content">
    <h1>Registrarse</h1>
    <?php if (!empty($error_msg)) { echo '<p class="error">' . $error_msg . '</p>'; } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
      </div>
      <div class="form-group">
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($correo); ?>" required>
      </div>
      <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($telefono); ?>" required>
      </div>
      <div class="form-group">
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($direccion); ?>" required>
      </div>
      <button type="submit">Registrar</button>
    </form>
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
