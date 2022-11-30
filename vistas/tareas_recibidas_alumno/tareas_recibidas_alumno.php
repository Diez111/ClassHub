<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"><!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require 'vistas/includes/scripts.php'; ?><!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Tareas Recibidas</title><!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require 'vistas/includes/header.php'; ?><!-- Cargamos el header de la pagina -->
	<?php require 'vistas/includes/nav.php'; ?> <!-- Cargamos el menu lateral de la pagina -->
	<section id="container">

	<br><br><br><br><!-- Salto de linea-->
		<center><h1>Tareas Recibidas</h1></center><!-- Titulo -->
		<br><br><br><br><br><br><!-- Salto de linea-->

	<div class="container"> <!-- Creamos un contenedor para cada fila del chat publico-->
		<?php
		if ($query->num_rows) {//Si la consulta recibe valores
		?>
		<table class="table"><!-- Estilo de la tabla-->

 		<thead><!-- definimos una sección de encabezado en la tablas -->
            <tr><!-- fila de tabla-->
				<th style="color:black;">Materia</th><!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
				<th style="color:black;">Creador</th>
				<th style="color:black;">Título</th>
				<th style="color:black;">Descripcion</th>
				<th style="color:black;">Fecha de Creacion</th>
				<th style="color:black;">Archivo</th>
				<th style="color:black;">Acciones</th>
            </tr>
        </thead>
		<?php
			while ($datos = $query->fetch_assoc()) {//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
				?>
			<tr><!-- fila de tabla-->
               <td data-label="materia"><?= $datos['materia'] ?></td><!-- Mediante el dato que le paso el controller se ve de que materia es la tarea -->
               <td data-label="nombre"><?= $datos['nombre'] ?> </td><!-- Mediante el dato que le paso el controller se ve el nombre del creador de la tarea-->
               <td data-label="titulo"><?= $datos['titulo'] ?> </td><!-- Mediante el dato que le paso el controller se ve el titulo de la tarea-->
               <td data-label="descripcion"><?= $datos['descripcion'] ?> </td><!-- Mediante el dato que le paso el controller se ve la descripcion de la tarea -->
               <td data-label="fecha_creacion"><?= $datos['fecha_creacion'] ?> </td><!-- Mediante el dato que le paso el controller se puede saber cuando se cargo la tarea-->
               <td data-label="archivos_subidos"><a href="archivos_subidos/<?= $datos['nombre_archivo'] ?>" download><?= $datos['nombre_archivo'] ?></a> </td><!-- Mediante el dato que le paso el controller se ve el archivo que se subio -->
               <td data-label="Acciones">	<a class="link_edit" href="/mvc/tareas_enviar_alumno/exec/<?= "{$datos['idtarea']}" ?>">Enviar Tarea</a> </td><!-- La tarea se puede borrar en caso de quererlo, pero antes se pasa el id de la tarea a la que hacemos referencia al controller para que procese la solicitud -->
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
	<?php require 'vistas/includes/footer.php' ?><!-- Pie de pagina -->
</body>
</html>