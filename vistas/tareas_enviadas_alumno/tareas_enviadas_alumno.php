<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"><!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require 'vistas/includes/scripts.php'; ?><!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Tareas Enviadas</title><!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require 'vistas/includes/header.php'; ?><!-- Cargamos el header de la pagina -->
	<?php require 'vistas/includes/nav.php' ?><!-- Cargamos el menu lateral de la pagina -->
	<br><br><br><br><!-- Salto de linea-->
	<center><h1>Tareas Enviadas</h1></center>
	<br><br><br><br><br><br><!-- Salto de linea-->
	<div class="container"><!-- Cargo el estilo del contenedor de la tabla-->
		<?php
		if ($query->num_rows) {//Si la consulta recibe valores
		?>
		<table class="table"><!-- Cargo el estilo de la tabla -->
        	<thead><!-- definimos una sección de encabezado en la tablas -->
			<tr><!-- fila de tabla-->
				<th style="color:black;">Materia</th><!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
				<th style="color:black;">Titulo</th>
				<th style="color:black;">Fecha Enviado</th>
				<th style="color:black;">Archivo</th>
				<th style="color:black;">Acciones</th>
			</tr>
		</thead>
		<?php	
			while ($datos = $query->fetch_assoc()) {//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
				?>
				<tr><!-- fila de tabla-->
					<td><?= $datos['materia'] ?></td> <!-- Mediante los datos pasados por el controller se sabe  la materia de la tarea enviada-->
					<td><?= $datos['titulo'] ?></td><!-- Mediante los datos pasados por el controller se sabe el titulo de la tarea enviada-->
					<td><?= $datos['fecha_enviado'] ?></td><!-- Mediante los datos pasados por el controller se sabe la fecha de creacion de la tabla-->
					<td><a href="archivos_subidos/<?= $datos['nombre_archivo'] ?>" download><?= $datos['nombre_archivo'] ?></a></td><!-- Mediante los datos pasados por el controller se sabe el archivo que subimos a la tarea-->
					<td>
                	<a class="link_delete" href="/mvc/tareas_enviadas_alumno/eliminar_tarea/<?= "{$datos['idrespuesta']}" ?>">Eliminar</a><!-- Le mandamos al controller el id de la tarea a la que hacemos referencia para eliminar para que esta la procese y se la mande al model-->
					</td>
				</tr>
		<?php
			}
		?>
		</table>
		<?php
		}
		?>
	</div>
	<?php require 'vistas/includes/footer.php' ?><!-- Pie de pagina -->
</body>
</html>