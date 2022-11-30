<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"><!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require "vistas/includes/scripts.php"; ?> <!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Agregar Pregunta</title> <!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require "vistas/includes/header.php"; ?> <!-- Cargamos el header de la pagina -->
	<?php require "vistas/includes/nav.php"; ?> <!-- Cargamos el menu lateral de la pagina -->
 
	<section id="container"> 
	
	<br><br><br><br> <!-- Saltos de linea -->

	<div>
		<form method="post" action="<?= FOLDER_PATH . "/examen_crear_pregunta/agregar_pregunta" ?>"><!-- Le pasamos los datos al controller mediante el metodo POST para que el envio de datos no sea visible para el usuario--> 
			<label for="prueba">Seleccionar Prueba:</label>
			<select name="id_prueba" id="prueba" class="notItemOne" required>
			<option value="" selected>Seleccione una prueba</option>			
		<?php

		if ($query->num_rows) //Si la consulta recibe valores
		{
			while ($datos = $query->fetch_assoc()) //Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
			{
			?> 
			<option style="color:black;" value="<?= $datos['test_id']?>"><?= $datos['test_name']?></option> <!--Le pasamos el id del test con e nombre del test--> 
			<?php
			}
		}
		?>
			</select>
		<label for="nom_pregunta"> Ingresar pregunta: </label>  <!-- Texto --> 
		<input type="text" name="nom_pregunta" id="nom_pregunta" placeholder="Nombre de la pregunta" required> <!-- Espacio donde poder hacer la pregunta para el examen --> 

		<label for="nom_respuesta1"> Ingresar respuesta 1: </label>   <!-- Texto --> 
		<input type="text" name="nom_respuesta1" id="nom_respuesta1" placeholder="Nombre de la respuesta1"> <!-- Espacio para poner una de las opciones de la respuesta a la pregunta --> 

		<label for="nom_respuesta2"> Ingresar respuesta 2: </label>  <!-- Texto --> 
		<input type="text" name="nom_respuesta2" id="nom_respuesta2" placeholder="Nombre de la respuesta2"><!-- Espacio para poner una de las opciones de la respuesta a la pregunta --> 

		<label for="nom_respuesta3"> Ingresar respuesta 3: </label>  <!-- Texto --> 
		<input type="text" name="nom_respuesta3" id="nom_respuesta3" placeholder="Nombre de la respuesta3"><!-- Espacio para poner una de las opciones de la respuesta a la pregunta --> 

		<label for="nom_respuesta4"> Ingresar respuesta 4: </label>  <!-- Texto --> 
		<input type="text" name="nom_respuesta4" id="nom_respuesta4" placeholder="Nombre de la respuesta4"><!-- Espacio para poner una de las opciones de la respuesta a la pregunta --> 

		<label for="res_correct">La respuesta correcta es:</label>  <!-- Texto --> 
		<input type="text" name="res_correct" id="res_correct" placeholder="Ejemplo: respuesta 2" required><!-- Espacio donde se dice cual de las 4 opciones anteriores es la correcta --> 
		<br><br>
		<input type="submit" value="Añadir Pregunta"> <!-- Boton para crear la pregunta del examen y pasarle los datos al controller--> 
		</form>
	</div>
	</section> 
	<?php require "vistas/includes/footer.php"; ?><!-- Cargamos el pie de pagina --> 
</body>
</html>