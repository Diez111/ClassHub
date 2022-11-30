<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"><!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require 'vistas/includes/scripts.php'; ?><!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Enviar Tarea</title><!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require 'vistas/includes/header.php'; ?><!-- Cargamos el header de la pagina -->
	<?php require 'vistas/includes/nav.php' ?> <!-- Cargamos el menu lateral de la pagina -->

	<section id="container">

	<br><br><br><br> <!-- Salto de linea -->

		<div >
		<center><h1>Enviar Tarea</h1></center><!-- Titulo -->
		<form action="<?= FOLDER_PATH . '/tareas_enviar_alumno/enviar_tarea' ?>" method="post" style="width: 350px;" enctype="multipart/form-data"><!-- Le pasamos los datos al controller mediante el metodo POST para que el envio de datos no sea visible para el usuario--> 

			<input type="hidden" name="id_creador" value="<?= $id_creador ?>"> <!-- Nos dice el id del creador de la tarea y se lo pasamos al controller -->
			<input type="hidden" name="id_usuario" value="<?= $id_usuario ?>"> <!-- Nos dice el id del usuario destino o grupo de usuarios destino, y se lo pasamos al controller -->
			<input type="hidden" name="idtarea" value="<?= $idtarea ?>"><!-- Nos dice la id de la tarea y se lo pasamos al controller -->
			<input type="hidden" name="curso" value="<?= $curso ?>"><!-- Nos dice el curso y se lo pasamos al controller-->
			<input type="hidden" name="materia" value="<?= $materia ?>"><!-- Nos dice el materia y se lo pasamos al controller -->
			<label for="archivo">Archivo</label><!-- Nos dice el Archivo y nos deja descargarlo y se lo pasamos al controller -->
			<input type="file" name="archivo" id="archivo" style="width: 450px; color: white;">  <!-- Nos deja subir el archivo que queramos para pasarlo al controller-->

			<input type="submit" value="Enviar Tarea" class="btn_save"> <!-- Boton para pasar todo al controller y enviar la tarea-->
		</form>
		</div>
	</section>
	<?php require 'vistas/includes/footer.php' ?><!-- Pie de pagina -->
</body>
</html>