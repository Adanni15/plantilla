<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pet Shop | Editar Perfil del Usuario</title>
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
        // Si el usuario está logueado, mostrar botón con nombre de usuario y menú desplegable
        echo '<li class="user-menu">';
        echo '<li><a href="../usuario.php">Perfil</a></li>';
        echo '<li><a href="../cerrar_sesion.php">Cerrar Sesión</a></li>';
        echo '</li>';
    } else {
        // Si no está logueado, mostrar enlace para iniciar sesión
        echo '<li><a href="../login.php">Iniciar Sesión</a></li>';
    }
    ?>
  </ul>
</div>

<div class="container">
    <h1>Editar Perfil del Usuario</h1>
    <form action="../actualizar_usuario.php" method="post">
        <label for="nombre">Nombre del Usuario</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $_SESSION['nombre']; ?>" required>
        
        <label for="email">Correo Electrónico</label>
        <input type="email" id="email" name="email" value="<?php echo $_SESSION['correo']; ?>" required>
        
        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $_SESSION['telefono']; ?>" required>
        
        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $_SESSION['direccion']; ?>" required>
        
        <input type="submit" class="button" value="Guardar Cambios">
    </form>
</div>

<div id="footer">
    <div id="footnote">
      <div class="section">Copyright &copy; 2024 <a href="#">Petshop Sun</a> Todos los derechos reservados por <a target="_blank" href="#">PetshopSun.com</a></div>
    </div>
</div>
</body>
</html>
