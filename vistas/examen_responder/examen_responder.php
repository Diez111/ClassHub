<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"><!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require 'vistas/includes/scripts.php'; ?><!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Examen</title><!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require 'vistas/includes/header.php'; ?><!-- Cargamos el header de la pagina -->
	<?php require 'vistas/includes/nav.php'; ?><!-- Cargamos el menu lateral de la pagina -->
	<br><br><br><br><br><br> <!-- Salto de linea-->


	<form method="post" action="/mvc/examen_responder/corregir"><!-- Le pasamos los datos al controller mediante el metodo POST para que el envio de datos no sea visible para el usuario--> 
		<input type="hidden" name="id_usuario" value="<?= $id_usuario ?>"><!-- Me da el id del usuario, pero no lo muestra--> 
		<input type="hidden" name="id_prueba" value="<?= $id_prueba ?>"><!-- Me da el id de la prueba, pero no lo muestra--> 
		<input type="hidden" name="id_materia" value="<?= $id_materia ?>"><!-- Me da el id de la materia, pero no lo muestra--> 
		<?php
		if ($query_prueba->num_rows) {//Si la consulta recibe valores
			$n = 1; //decimos que "n" inicia en 1 (Lo usamos para definir el numero de preguntas que hay)
			while ($datos = $query_prueba->fetch_assoc()) {//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
		?>
		<h2>Pregunta: <?= $datos['quest_desc'] ?></h2><!-- Nos muestra la pregunta gracias a los datos pasados por el controller-->

		<br>
		<br>
		<label class="pure-material-radio"><!-- Estilo del checkbox-->
   		<input style="width: 10px; margin: 10px 10px;" type="radio" id="opcion1" name="<?= "respuesta".$n ?>" value="1"><!-- Nos dice el numero de la respuesta que es-->
		<span><label for="opcion1" style="margin: 10px 10px;"><?= $datos['ans1'] ?></label></span><!-- Nos muestra el texto de la primera resputa-->
		</label>
		<br>
		<br>
		<label class="pure-material-radio"><!-- Estilo del checkbox-->
		<input style="width: 10px; margin: 10px 10px;" type="radio" id="opcion2" name="<?= "respuesta".$n ?>" value="2"><!-- Nos dice el numero de la respuesta que es-->
		<span><label for="opcion2" style="margin: 10px 10px;"><?= $datos['ans2'] ?></label></span><!-- Nos muestra el texto de la segunda resputa-->
		</label>
		<br>
		<br>
		<label class="pure-material-radio"><!-- Estilo del checkbox-->
		<input style="width: 10px; margin: 10px 10px;" type="radio" id="opcion3" name="<?= "respuesta".$n ?>" value="3"><!-- Nos dice el numero de la respuesta que es-->
		<span><label for="opcion3" style="margin: 10px 10px;"><?= $datos['ans3'] ?></label></span><!-- Nos muestra el texto de la tercera resputa-->
		</label>
		<br>
		<br>
		<label class="pure-material-radio"><!-- Estilo del checkbox-->
     	<input style="width: 10px; margin: 10px 10px;" type="radio" id="opcion4" name="<?= "respuesta".$n ?>" value="4"><!-- Nos dice el numero de la respuesta que es-->
		<span><label for="opcion4" style="margin: 10px 10px;"><?= $datos['ans4'] ?></label></span><!-- Nos muestra el texto de la cuarta resputa-->
		</label>
		<br>
		<br>
		<?php
				$n++; //Al terminar se suma +1 a la variable "n"
			}
		?>
		<input type="submit" class="btn_save" value="Ingresar respuestas"><!-- Boton para subir respuestas pasandole al controller-->
		<?php
		}
		?>
	</form>
	<?php require 'vistas/includes/footer.php'; ?><!-- Pie de pagina-->
</body>
</html>