<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pet Shop</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style.css" rel="stylesheet" type="text/css">

  <!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
  <!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
</head>
<body>
<div id="header"> <a href="#" id="logo"><img src="images/logo.gif" width="310" height="114" alt=""></a>
  <ul class="navigation">
    <li class="active"><a href="index.php">Principal</a></li>
    <li><a href="petmart.php">Tienda de mascotas</a></li>
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
  <div class="banner">&nbsp;</div>
  <div id="content">
    <div class="content">
      <ul>
        <li> <a href="#"><img src="images/puppy.jpg" width="114" height="160" alt=""></a>
          <h2>Que es lo que necesitan</h2>
          <p>Cuando la madre se aleja temporalmente de ellos, se agrupan para compensar la pérdida de calor que ella evita con su pelaje. <a class="more" href="#"></a></p>
        </li>
        <li> <a href="#"><img src="images/cat.jpg" width="114" height="160" alt=""></a>
          <h2>Algo bueno</h2>
          <p>Se ha comprobado que tener un gato reduce el estrés. Normalmente los dueños de gatos tienen una tensión arterial más baja que las personas sin mascotas. <a class="more" href="#"></a></p>
        </li>
        <li> <a href="#"><img src="images/koi.jpg" width="114" height="160" alt=""></a>
          <h2>Tipos de peces</h2>
          <p>peces no mandibulados.
             peces cartilaginosos.
             peces pelágicos.
             peces demersales.
           <a class="more" href="#"></a></p>
        </li>
        <li> <a href="#"><img src="images/bird.jpg" width="114" height="160" alt=""></a>
          <h2>Tipos de pajaros</h2>
          <p>Rapaces. 
             Corredoras.
             Zancudas.
             Gallináceas. 
             Anseriformes.
             Esfenisciformes. <a class="more" href="#"></a></p>
        </li>
      </ul>
    </div>
  </div>
  <div class="featured">
    <ul>
      
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
