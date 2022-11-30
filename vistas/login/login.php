<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8"> <!-- codificación de caracteres españoles -->
	<title>Login</title> <!--Titulo de la pestaña del navegador -->
	<link rel="stylesheet" type="text/css" href="/mvc/style.css"> <!-- Cargamos el estilo -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,900&display=swap" rel="stylesheet">  <!--Una fuente de letras -->
</head>
<body>
	<section id="container">
		<form method="POST" action=" <?= FOLDER_PATH . '/login/signin' ?>" ><!-- Le pasamos los datos al controller mediante el metodo POST para que el envio de datos no sea visible para el usuario--> 
			<h3>Instituto Madero</h3> <!-- Titulo-->
			<img src="/mvc/assets/img/login1.png" alt="Logo"> <!-- Imagen--> 
			<input type="text" name="usuario" placeholder="Usuario" required> <!-- Se pone el usuario en este apartado--> 
			<input type="password" name="clave" placeholder="Contraseña" required> <!-- Se pone la contraseña en este apartado-->
			<div class="alert"> <?php !empty($mensaje_de_error) ?  print($mensaje_de_error) : '' ?></div> <!-- Con el estilo de alerta, si hay un problema se mostrara en pantalla-->
			<input type="submit" value="INICIAR"> <!-- El boton mandara los datos para ser validados-->
			<center><a href="/mvc/recuperar_contra/recuperar_contra.php">Manda un mail al instructor explicando tu situacion</a></center><!-- Nos manda a un apartado para solicitarle a un encargado de tu colegio que te desbloque la cuenta-->
		</form>
	</section>
</body>
</html>
