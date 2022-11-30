<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"><!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require 'vistas/includes/scripts.php'; ?>  <!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Selección de Tema</title><!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require "vistas/includes/header.php"; ?> <!-- Cargamos el header de la pagina -->
	<?php require "vistas/includes/nav.php"; ?><!-- Cargamos el menu lateral de la pagina -->

	<section id="container">
	
	<br><br><br><br><br><br><br><br><br><br><br> <!-- Saltos de linea -->


		<div>
			<center><h1>Selector de temas</h1></center> <!-- Titulo centradi -->

			<form action="<?= FOLDER_PATH . '/temas/update' ?>" method="post"><!-- Le pasamos los datos al controller mediante el metodo POST para que el envio de datos no sea visible para el usuario--> 
				<label for="temavis">Tema</label> 
				<select name="temavis" id="temavis" class="notItemOne">
					<?php 
					if ($temavis_u == 1) { //Segun el dato que nos paso el controller cada uno representa una direccion de la carpeta css de estilos por lo que cambiara el estilo de la pagina segun el dato que elijamos
						echo "<option value=\"1\" selected>claro</option>\n";
					} else if ($temavis_u == 2) {
						echo "<option value=\"2\" selected>oscuro</option>\n";
					} else if ($temavis_u == 3) {
						echo "<option value=\"3\" selected>protanopia</option>\n";
					}else if ($temavis_u == 4) {
						echo "<option value=\"4\" selected>tricromacia</option>\n";
					}else if ($temavis_u == 5) {
						echo "<option value=\"5\" selected>daltonismo</option>\n";
					}else if ($temavis_u == 6) {
						echo "<option value=\"6\" selected>nazi</option>\n";
					}
 
					?>
					<option style="color:black;" value="1">claro</option> //Cada tema esta relacionado con un valor que al cargarse en la base de datos cambiara el tema de la pagina ya que el archivo al que hacemos referencia cambiara de direccion 
					<option style="color:black;" value="2">oscuro</option>
					<option style="color:black;" value="3">protanopia</option>
					<option style="color:black;" value="4">tricromacia</option>
					<option style="color:black;" value="5">daltonismo</option>
				</select>

				<input type="submit" value="Cambiar Tema" class="btn_save"><!-- Boton para subir el tema que queremos para nuestro usuario -->
			</form>
		</div>
	</section>
	<?php require "vistas/includes/footer.php"; ?><!-- Pie de pagina -->
</body>
</html>
 