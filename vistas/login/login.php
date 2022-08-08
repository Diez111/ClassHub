<!DOCTYPE html>
<html lang="en">  <!-- El idioma de la pagina por defecto el IDE lo pone en ingles -->
<head>
	<meta charset="UTF-8"> <!-- usamos los caracteres del español -->
	<title>Login | Sistema Facturación</title>  <!-- El titulo de la pestaña -->
	<link rel="stylesheet" type="text/css" href="/mvc/style.css"> <!-- llamamos al estilo -->
</head>
<body>
	<section id="container"> <!-- juntamos todos los datos de abajo en un contenedor -->

		<form method="POST" action=" <?= FOLDER_PATH . '/login/signin' ?> " > <!-- Usamos el comando POST para mandar los datos que ingrese el usuario -->

			<h3>Instituto Madero</h3>
			<img src="/mvc/assets/img/login1.png" alt="Logo">

			<input type="text" name="usuario" placeholder="Usuario"> <!-- El texto ingresado en en esta opcion se puede llamar en php para usarla como string -->

			<input type="password" name="clave" placeholder="Contraseña"> <!-- El texto ingresado en en esta opcion se puede llamar en php para usarla como string -->

			<div class="alert"> <?php !empty($mensaje_de_error) ?  print($mensaje_de_error) : '' ?></div> <!-- Muestra las alertas que mande php -->

			<input type="submit" value="INICIAR">

			<center><a href="/mvc/recuperar_contra/recuperar_contra.php">Manda un mail al admin explicando tu situacion</a></center>

			
		</form>

	</section>
</body>
</html>
