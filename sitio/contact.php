<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Pet Shop | Contacto</title>
<meta charset="iso-8859-1">
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
<!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
</head>
<body>
<div id="header"> <a href="#" id="logo"><img src="images/logo.gif" width="310" height="114" alt=""></a>
  <ul class="navigation">
    <li><a href="index.php">Principal</a></li>
    <li><a href="petmart.php">Tienda de mascotas</a></li>
    <li><a href="about.php">Sobre nosotros</a></li>
    <li class="active"><a href="contact.php">Contactanos</a></li>
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
    <div class="content">
      <h2>Contactanos </h2>
      <div>
        <p>  </p>
      </div>
      <ul class="connect">
        <li>
          <h2>Ventas y servicio al cliente</h2>
          <p> <span>Correo electronico: <a href="#">joel_ps1@tesch.edu.mx</a></span> <span>llamano or escribenos por cualquier aspecto sobre tus compras.</span> </p>
          <p> <span>llama al numero sin costo: 877 000 0000</span> <span>llama al numero sin costo: 866 000 0000</span> <span>llama al numero sin costo: 877 000 0000</span> </p>
        </li>
        <li>
          <h2>Horario de la tienda</h2>
          <p> <span>Lunes a Domingo de 9:00 am a 9:00 pm </span> <span></span> </p>
        </li>
        <li>
          <h2>Direccion de envio</h2>
          <p> <span>Petshop</span> <span>Calle 250</span> <span>4to piso</span> <span>Chalco, Estado de Mexico 109935</span> <span>Mexico</span> </p>
        </li>
      </ul>
    </div>
    <div id="sidebar">
      <div class="connect">
        <h2>Siguenos</h2>
        <ul>
          <li><a class="facebook" href="https://www.facebook.com/profile.php?id=61557037330336">Facebook</a></li>
          <li><a class="twitter" href="#">Twitter</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="featured">
    <ul>
      
    </ul>
  </div>
</div>
<div id="footer">
  <div id="footnote">
    <div class="section">Copyright &copy; 2024 <a href="#">Petshop Sun</a> Todos los derechos reservados por<a target="_blank" href="#">PetshopSun.com</a></div>
  </div>
</div>
</body>
</html>
