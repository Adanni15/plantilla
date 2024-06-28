<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pet Shop | Perfil del Usuario</title>
    <meta charset="iso-8859-1">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
    <!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
    <style>
      /**-------------- pagina de usuario ---------------**/
/* Estilo para el contenedor principal */
#main {
	background-color: #ffffff; /* Fondo gris claro */
	padding: 50px 0; /* Espaciado superior e inferior */
	font-family: 'Arial', sans-serif; /* Fuente */
}
  
  /* Estilo para el contenedor interior */
  .container {
	max-width: 800px; /* Ancho máximo */
	margin: 0 auto; /* Centrando horizontalmente */
	background-color: #ffffff; /* Fondo blanco */
	padding: 20px; /* Espaciado interno */
	border-radius: 10px; /* Bordes redondeados */
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para dar profundidad */
}
  
  /* Estilo para el título */
h1 {
	text-align: center; /* Centrando el texto */
	color: #333; /* Color de texto */
	font-size: 32px; /* Tamaño de fuente */
	margin-bottom: 20px; /* Margen inferior */
  }
  
  /* Estilo para el contenedor de perfil */
  .user-profile {
	display: flex; /* Usar Flexbox para disposición */
	align-items: center; /* Alineación vertical */
	justify-content: center; /* Alineación horizontal */
	gap: 20px; /* Espacio entre elementos */
  }
  
  /* Estilo para la imagen de perfil */
  .profile-picture img {
	border-radius: 50%; /* Imagen redondeada */
	border: 2px solid #ddd; /* Borde */
	padding: 5px; /* Espaciado interno */
  }
  
  /* Estilo para el contenedor de detalles del perfil */
  .profile-details {
	background-color: #ffffff; /* Fondo gris claro */
	border-radius: 8px; /* Bordes redondeados */
	padding: 20px; /* Espaciado interno */
	box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para dar profundidad */
	max-width: 600px; /* Ancho máximo */
  }
  
  /* Estilo para el título del perfil */
  .profile-details h2 {
	color: #333; /* Color de texto */
	font-size: 24px; /* Tamaño de fuente */
	margin-bottom: 10px; /* Margen inferior */
  }
  
  /* Estilo para los párrafos */
  .profile-details p {
	color: #666; /* Color de texto */
	font-size: 16px; /* Tamaño de fuente */
	margin: 8px 0; /* Margen superior e inferior */
  }
  
  /* Estilo para el texto en negrita */
  .profile-details p strong {
	color: #333; /* Color de texto */
	font-weight: bold; /* Negrita */
  }
  
  /* Estilo para el botón */
  .profile-details .button {
	display: inline-block; /* Botón en línea */
	margin-top: 15px; /* Margen superior */
	padding: 10px 20px; /* Espaciado interno */
	background-color: #4CAF50; /* Fondo verde */
	color: #fff; /* Texto blanco */
	text-decoration: none; /* Sin subrayado */
	border-radius: 5px; /* Bordes redondeados */
	transition: background-color 0.3s ease; /* Transición suave */
	font-size: 16px; /* Tamaño de fuente */
	text-align: center; /* Centrando texto */
  }
    </style>
</head>
<body>
<div id="header"> 
  <a href="#" id="logo"><img src="images/logo.gif" width="310" height="114" alt="Logo"></a>
  <ul class="navigation">
    <li><a href="index.php">Principal</a></li>
    <li><a href="petmart.php">Tienda de mascotas</a></li>
    <li><a href="about.php">Sobre nosotros</a></li>
    <li><a href="contact.php">Contactenos</a></li> 
    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        // Si el usuario está logueado, mostrar botón con nombre de usuario y menú desplegable
        echo '<li class="user-menu">';
        echo '<li><a href="usuario.php">Perfil</a></li>';
        echo '<li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>';
        echo '</li>';
    } else {
        // Si no está logueado, mostrar enlace para iniciar sesión
        echo '<li><a href="login.php">Iniciar Sesión</a></li>';
    }
    ?>
  </ul>
</div>

<div class="sidebar-a">
    <a href="user/historial.php">Historial de Compras</a>
    <a href="user/reservas.php">Reservas</a>
    <a href="user/formas_pago.php">Formas de Pago</a>
</div>

<div id="main">
  <div class="container">
    <h1>Perfil del Usuario</h1>
    <div class="user-profile">
    <div class="profile-picture">
        <img src="<?php echo $_SESSION['img']; ?>" alt="Foto de perfil" width="150" height="150">
        <form action="actualizar_foto.php" method="post">
          <input type="text" name="nueva_foto" placeholder="Ingrese la URL de la nueva foto" required>
          <button type="submit" class="button">Actualizar Foto</button>
        </form>
      </div>
      <div class="profile-details">
        <h2><?php echo $_SESSION['nombre']; ?></h2>
        <p><strong>Correo electrónico:</strong> <?php echo $_SESSION['correo']; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $_SESSION['telefono']; ?></p>
        <p><strong>Dirección:</strong> <?php echo $_SESSION['direccion']; ?></p>
        <a href="user/form_usuario.php" class="button">Editar Perfil</a>
      </div>
    </div>
  </div>
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
