<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"><!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require 'vistas/includes/scripts.php'; ?> <!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Tareas Recibidas</title><!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require 'vistas/includes/header.php'; ?><!-- Cargamos el header de la pagina -->
	<?php require 'vistas/includes/nav.php' ?><!-- Cargamos el menu lateral de la pagina -->

	<section id="container">

	<br><br><br><br><br><br><br><!-- Salto de linea-->
	
		<center> <h1 style="color: white;">Tareas Recibidas</h1> </center><!-- Titulo -->
		<br><br><br><br><br><br><!-- Salto de linea-->

	<div class="container"> <!-- Cargo el estilo del contenedor de la tabla-->
		<?php
		if ($query->num_rows) {//Si la consulta recibe valores
		?>
		<table class="table"><!-- Cargo el estilo de la tabla -->

 			 <thead><!-- definimos una sección de encabezado en la tablas -->
                <tr><!-- fila de tabla-->
                	<th style="color: black;">Materia</th><!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
                    <th style="color: black;">Curso</th>
                    <th style="color: black;">Alumno</th>
                    <th style="color: black;">Titulo</th>
                    <th style="color: black;">Fecha Recibido</th>
                    <th style="color: black;">Archivo</th>
                </tr>
            </thead>
		<?php
			while ($datos = $query->fetch_assoc()) {//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
				?>
				<tr><!-- fila de tabla-->
				 	<td data-label="Materia"><?= $datos['materia'] ?></td><!-- Mediante el dato que le paso el controller se ve de que materia es la tarea -->
                    <td data-label="Curso"><?= $datos['curso'] ?></td><!-- Mediante el dato que le paso el controller se ve el curso de la tarea-->
                    <td data-label="Curso"><?= $datos['nombre'] ?></td><!-- Mediante el dato que le paso el controller se ve el nombre de la tarea-->
                    <td data-label="Titulo"><?= $datos['titulo'] ?></td><!-- Mediante el dato que le paso el controller se puede saber el titulo de la tarea-->
                    <td data-label="Fecha Recibido"><?= $datos['fecha_enviado'] ?></td><!-- Mediante el dato que le paso el controller se puede saber cuando se cargo la tarea-->
                    <td data-label="Archivo"> <a href="archivos_subidos/<?= $datos['nombre_archivo'] ?>" download><?= $datos['nombre_archivo'] ?></a> </td>
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
	</section> 
	<?php require 'vistas/includes/footer.php' ?><!-- Pie de pagina-->
</body>
</html>