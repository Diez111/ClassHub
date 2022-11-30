<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es"><!-- Idioma de la pagina-->
<head>
	<meta charset="utf-8"><!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require 'vistas/includes/scripts.php'; ?>  <!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Notas</title><!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require 'vistas/includes/header.php'; ?><!-- Cargamos el header de la pagina -->
	<?php require 'vistas/includes/nav.php'; ?><!-- Cargamos el menu lateral de la pagina -->
	<section id="container"><!-- Creamos un contenedor general para TODOS los chats-->
	<br><br><br><br><br><br><!-- Saltos de linea -->
	<div class="container"><!-- Creamos un contenedor para cada fila del ranking-->
		<?php
		if ($query_notas->num_rows) { //Si la consulta recibe valores
		?>
		<table class="table"><!-- Aplicamos el estilo a las tablas -->
			<thead> <!-- definimos una sección de encabezado en la tablas -->
			<tr> <!-- fila de tabla -->
				<th style="color: black;">Materia</th><!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
				<th style="color: black;">Prueba</th><!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
				<th style="color: black;">Nota</th><!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
			</tr>
			</thead>
		<?php
			while ($datos = $query_notas->fetch_assoc()) {//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
				$temp = explode('/', $datos['nota']); //separo el string de la nota, y obtengo las respuestas acertadas y la cantidad de preguntas
				$temp2 = (($temp[0] * 100) / $temp[1]); //convierto la nota en un porcentaje
				$nota = round($temp2); //redondeo la nota con la función 'round' de php
		?>
		
			<tr> <!-- fila de tabla-->
				<td data-label="Materia"><?= $datos['materia']?></td><!-- Nos muestra la materia de la columna materia segun los datos pasados por el controller-->
				<td data-label="Prueba"><?= $datos['test_name']?></td><!-- Nos muestra el nombre de la prueba segun el dato que nos paso el controller -->
				<td data-label="Nota"><?= $nota . '%' ?></td> <!-- Muestra la nota como porcentaje segun el dato que nos paso el controller-->
			</tr>
		
		<?php
			}
		?>
		</table>
		<?php
		}
		?>
	</div>
	</section>
	<?php require 'vistas/includes/footer.php'; ?>
</body>
</html>