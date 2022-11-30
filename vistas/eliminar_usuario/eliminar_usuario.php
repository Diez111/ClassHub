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
			<h2>Esto eliminara el registro del usuario</h2> <!-- Subtitulo -->
			<p>Nombre: <?= $nombre_u ?></p> <!-- Mostramos el nombre del usuario a eliminar  -->
			<p>Usuario: <?= $usuario ?></p> <!-- Mostramos el usuario a eliminar  -->
			<p>Tipo Usuario: <?= $rol_u ?></p> <!-- Mostramos el rol del usuario a eliminar  -->

			<form method="post" action="<?= FOLDER_PATH . '/eliminar_usuario/eliminar/' ?>"> <!-- Le pasamos los datos al controller mediante el metodo POST para que el envio de datos no sea visible para el usuario--> 
				<input type="hidden" name="idusuario" value="<?= $idusuario ?>"> <!-- le pasamos el id del usuario al controller--> 
				<input type="submit" value="Aceptar" class="btn_ok"> <!-- Le damos al boton de aceptar para pasar la informacion y poder eliminar el usuario --> 
			</form>
				<a href="/mvc/lista_usuarios" class="btn_cancel">Cancelar</a><!-- Boton cancelar para volver a "lista_usuarios" -->
		</div>
	</section>	

	<?php require "vistas/includes/footer.php"; ?> <!-- Cargamos el pie de pagina --> 
</body>
</html>