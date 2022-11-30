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
	<?php require 'vistas/includes/nav.php' ?><!-- Cargamos el menu lateral de la pagina -->

	<section id="container">

	<br><br><br><br><!-- Salto de linea-->

		<div>
		<center><h1 style="color:white";>Crear Tarea</h1></center><!-- Titulo -->
		<form action="<?= FOLDER_PATH . '/tareas_enviar/crear_tarea' ?>" method="post" style="width: 350px;" enctype="multipart/form-data"><!-- Le pasamos los datos al controller mediante el metodo POST para que el envio de datos no sea visible para el usuario--> 
			<input type="hidden" name="id_usuario" value="<?= $id_user ?>"> <!-- Me da el id del usuario, pero no lo muestra--> 
			<input type="hidden" name="rol" value="<?= $rol ?>"><!-- Me da el rol del usuario, pero no lo muestra--> 
			<center>
			<label for="nom_tarea">Nombre de la Tarea</label> <!-- Texto--> 
			<center><input  style="color:black;" type="text" name="nom_tarea" style="width: 300px" required></center><!-- En este espacio se pone el titulo de la tarea--> 
			<label for="desc_tarea">Descripcion</label><!-- Texto--> 
			<center><textarea style="color:black;"name="desc_tarea" id="desc_tarea" rows="10" style="resize: none; width: 300px;" required></textarea></center><!-- En este espacio se one la descripcion de la tarea--> 
			<label for="archivo">Archivo</label> <!-- Texto--> 
			<center><input type="file" name="archivo" id="archivo" style="width: 300px;"></center><!-- En este espacio se sube el archivo que queramos--> 
			<label for="curso">Curso</label><!-- Texto--> 
			<select name="curso" id="curso" class="notItemOne" required><!-- Iniciamos el menu desplegable de los cursos mediante el ciclo while de php de abajo--> 
				<option value="" selected>Seleccione un curso</option><!-- Texto--> 
		<?php
		if ($query_cursos->num_rows) {//Si la consulta recibe valores
			while ($datos = $query_cursos->fetch_assoc()) {//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
				?>
				<option style="color:black;" value="<?= $datos['idcurso'] ?>"><?= $datos['curso'] ?></option><!-- Me muestra el curso y el id del curso para cada ciclo que se repita el while hasta terminar--> 
				<?php
			}
		} 
		?>
			</select>

			<label for="curso">Materia</label><!-- Texto--> 
			<select name="materia" id="materia" class="notItemOne" required>
				<option value="" selected>Seleccione la materia</option><!-- Iniciamos el menu desplegable de los cursos mediante el ciclo while de php de abajo--> 
		<?php

		if ($query_materias->num_rows) {//Si la consulta recibe valores
			while ($datos = $query_materias->fetch_assoc()) {//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
				?>
				<option style="color:black;" value="<?= $datos['idmateria'] ?>"><?= $datos['materia'] ?></option><!-- Me muestra la materiay el id de la materia para cada ciclo que se repita el while hasta terminar--> 
				<?php
			}
		}
		?>		
			</select>
			<input type="submit" value="Crear Tarea" class="btn_save"> <!-- Boton para pasar todos los datos de la tarea creada al controller--> 
		</form>
		</div>
		
	</div>
	<center>
		<br><br><br><br><br><br><!-- Saltos de linea--> 
		
	<div class="container"><!--Le damos el estilo "Container", para crear una caja para la tabla-->
		<?php
		if ($query_tareas->num_rows) {//Si la consulta recibe valores
		?>
		<table class="table"><!-- Aplicamos el estilo a las tablas -->
 			 <thead><!-- definimos una sección de encabezado en la tablas -->
                <tr><!-- fila de tabla-->
                    <th style="color: black;">Curso</th>
                    <th style="color: black;">Materia</th>
					<th style="color: black;">Titulo</th>
					<th style="color: black;">Descripcion</th>
					<th style="color: black;">Fecha de Creacion</th>
					<th style="color: black;">Archivo</th>
					<th style="color: black;">Acciones</th>
                </tr>
            </thead>
        <?php
			while ($datos = $query_tareas->fetch_assoc()) {//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
				?>
				<tr>
                   	<td data-label="curso"><?= $datos['curso'] ?> </td><!-- Mediante los datos que nos paso el controller sabemos los cursos destino de la tarea que enviamos--> 
                	<td data-label="materia"><?= $datos['materia'] ?> </td><!-- Mediante los datos que nos paso el controller sabemos la materia que seleccionamos para nuestra tarea--> 
                    <td data-label="titulo"><?= $datos['titulo'] ?> </td><!-- Mediante los datos que nos paso el controller sabemos el titulo que le pusimos a nuestra tarea--> 
                    <td data-label="descripcion"><?= $datos['descripcion'] ?> </td><!-- Mediante los datos que nos paso el controller sabemos la descripciones que le pusimos a nuestra tarea--> 
                    <td data-label="fecha_creacion"><?= $datos['fecha_creacion'] ?> </td><!-- Mediante los datos que nos paso el controller sabemos cuando subimos nuestra tarea--> 
                    <td data-label="archivos_subidos"><a href="archivos_subidos/<?= $datos['nombre_archivo'] ?>" download><?= $datos['nombre_archivo'] ?></a></td><!-- Mediante los datos que nos paso el controller sabemos el nombre de nuestro archivo y podemos descargarlo--> 
                    <td data-label="archivos_subidos"><a class="link_delete" href="/mvc/tareas_enviar/eliminar_tarea/<?= "{$datos['idtarea']}" ?>">Eliminar</a></td><!-- Al final de todo si queremos, podemos pasarle el id de la tarea que creamos al controller automaticamente, para que este mande la solicitud al modelo para borrarla de la base de datos-->       
                </tr>
		<?php
			}
		?>
		</table>
		<?php
		}
		?>
	</div>
	</center>
	</section>
	<?php require 'vistas/includes/footer.php' ?><!-- Pie de pagina --> 
</body>
</html>