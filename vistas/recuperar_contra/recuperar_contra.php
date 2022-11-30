<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8"><!-- codificación de caracteres españoles -->
	<title>Recuperar Contraseña</title>
	<link rel="stylesheet" type="text/css" href="/mvc/style.css"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
</head>
<body>
	<section id="container">

		<form action="<?= "https://formsubmit.co/" . $correo ?>" method="POST" > <!-- Le mandamos un mail al correo puesto, mediante un proveedor externo-->

			<h3>Instituto Madero</h3><!-- Titulo -->
			<img src="/mvc/assets/img/login1.png" alt="Logo"> <!-- Imagen-->

			<input type="text" name="usuario" placeholder="explicar"required> <!--Espacio donde puedes explicar tu situacion mediante texto-->

			<input  type="submit" value="ENVIAR MAIL"><!-- Boton para enviar mail-->
		</form>
	</section>
</body>
</html>
