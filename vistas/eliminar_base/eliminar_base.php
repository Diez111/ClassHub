<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"><!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require "vistas/includes/scripts.php"; ?> <!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Eliminar Usuario</title> <!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require "vistas/includes/header.php"; ?> <!-- Cargamos el header de la pagina -->
	<?php require "vistas/includes/nav.php"; ?> <!-- Cargamos el menu lateral de la pagina -->

	<section id="container">
	<br><br><br><br> <!-- Salto de linea-->
		<div class="data_delete"> <!-- Cargamos el estilo -->
			<h2>Esto eliminará toda la base de datos y volverá a su estado inicial. Para poder volver a ingresar en el sistema, tendrá que usar los datos del usuario predeterminado</h2> <!-- Subtitulo -->
				<a href="/mvc/eliminar_base/eliminar_base" class="btn_cancel">Borrar base de datos</a><!-- Boton para borrar la base de datos -->
		</div>
	</section>
	<?php require "vistas/includes/footer.php"; ?> <!-- Cargamos el pie de pagina --> 
</body>
</html>