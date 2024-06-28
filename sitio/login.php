<?php
// Incluir archivo de conexión a la base de datos
include 'obtener_datos.php';

// Verificar si se han enviado los datos del formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuario WHERE correo = '$correo' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Iniciar sesión y obtener los datos del usuario
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['img'] = $row['img'];
        $_SESSION['correo'] = $row['correo'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['direccion'] = $row['direccion'];
        $_SESSION['telefono'] = $row['telefono'];
        
        // Redirigir a la página del usuario
        header("Location: usuario.php");
        exit;
    } else {
        // Mensaje de error si las credenciales son incorrectas
        $error_msg = "Correo o contraseña incorrectos. Por favor, inténtalo de nuevo.";
    }
}

// Cerrar conexión a la base de datos
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión - Pet Shop</title>
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
    <h1>Iniciar Sesión</h1>
    <?php if (isset($error_msg)) { echo '<p class="error">' . $error_msg . '</p>'; } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group">
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>
      </div>
      <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Iniciar Sesión</button>
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
