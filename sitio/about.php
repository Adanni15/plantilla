<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Pet Shop | About</title>
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
    <li class="active"><a href="about.php">Sobre nosotros</a></li>
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
    <div class="content">
      <div class="about">
        <h2>SOBRE NOSOTROS</h2>
        <ul>
          <li>
            <h2><a href="#">Tenemos el mejor servicio para tu mascota</a></h2>
            <p> contamos con los mejores proveedores para que encuntres lo mas aducado para tu mascota ademas de unos precios accesibles para todos. </p>
          </li>
        </ul>
        <h2>SOBRE NUESTROS PROVEEDORES</h2>
        <ul>
          <li>
            <h2><a href="#">Contamos con proveedores de alta confianza</a></h2>
            <p> contamos con los mejores proveedores para que encuntres lo mas aducado para tu mascota ademas de unos precios accesibles para todos. </p>
          </li>
        </ul>
      </div>
    </div>
    <div id="sidebar">
      <div class="featured">
        <h2>Temas destacados</h2>
        <ul>
          <li> <a href="#"><img src="images/puppy2.jpg" width="115" height="155" alt=""></a>
            <h2><a href="#">Que necesitan ellos</a></h2>
            <p> Cuando la madre se aleja temporalmente de ellos, se agrupan para compensar la pérdida de calor que ella evita con su pelaje. <a class="more" href="#"></a> </p>
          </li>
          <li> <a href="#"><img src="images/bird2.jpg" width="115" height="155" alt=""></a>
            <h2><a href="#">Tipos de aves</a></h2>
            <p> Rapaces. 
             Corredoras.
             Zancudas.
             Gallináceas. 
             Anseriformes.
             Esfenisciformes. <a class="more" href="#"></a> </p>
          </li>
          <li class="last"> <a href="#"><img src="images/cat2.jpg" width="115" height="155" alt=""></a>
            <h2><a href="#">Cosas buenas</a></h2>
            <p> Además de ser compañeros leales, los gatos también son excelentes cazadores de insectos y roedores. <a class="more" href="#"></a> </p>
          </li>
        </ul>
      </div>
        </div>
      </div>
    </div>
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
    <div class="section">Copyright &copy; 2024 <a href="#">Petshop Sun</a> Todos los derechos reservados por<a target="_blank" href="#">PetshopSun.com</a></div>
  </div>
</div>
</body>
</html>
