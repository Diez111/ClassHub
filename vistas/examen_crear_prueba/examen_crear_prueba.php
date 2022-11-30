<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"><!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require "vistas/includes/scripts.php"; ?><!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Crear Prueba</title><!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require "vistas/includes/header.php"; ?> <!-- Cargamos el header de la pagina -->
	<?php require "vistas/includes/nav.php"; ?> <!-- Cargamos el menu lateral de la pagina -->

	<section id="container">
	
	<br><br><br><br>

	<div>
		<form method="post" action="<?= FOLDER_PATH . "/examen_crear_prueba/agregar_prueba" ?>"><!-- Le pasamos los datos al controller mediante el metodo POST para que el envio de datos no sea visible para el usuario--> 
			<label for="materia">Seleccionar Materia:</label>  <!-- Texto -->
			<select name="id_materia" id="materia" class="notItemOne" required>
			<option value="" selected>Seleccione una materia</option>  <!-- Menu desplegable con los valores del php de abajo (Esto para ver las materias)-->
		
		<?php
		if ($query_materias->num_rows)//Si la consulta recibe valores
		{
			while ($datos = $query_materias->fetch_assoc())//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
			{
			?>
			<option style="color:black;"  value="<?= $datos['idmateria']?>"><?= $datos['materia']?></option><!-- Mediante los datos que nos paso el controller podemos saber el id de las materias y a que nombre de materia corresponde, de esa forma cuando se despliegue el menu de opciones se ve el nombre de la materia y cuando queramos cargar al controller la materia que queremos podemos pasarle el id de la misma-->
			<?php
			}
		}
		?>
			</select>

			<label for="curso">Seleccionar Curso:</label>  <!-- Texto -->
			<select name="id_curso" id="curso" class="notItemOne" required>
			<option value="" selected>Seleccione un curso</option><!-- Menu desplegable con los valores del php de abajo (Esto para ver los cursos)-->
		
		<?php
		if ($query_cursos->num_rows)//Si la consulta recibe valores
		{
			while ($datos = $query_cursos->fetch_assoc())//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
			{
			?>
			<option style="color:black;"  value="<?= $datos['idcurso']?>"><?= $datos['curso']?></option> <!--Apartir de los datos pasados por el controller podemos ver el nombre del curso y saber su id, de esta forma cuando subamos al controller la prueba, sabra el id del curso al que hacemos referencia -->
			<?php
			}
		}
		?>
			</select>

			<label for="nom_prueba">Ingrese el nombre de la prueba:</label> <!-- Texto-->
			<input type="text" name="nom_prueba" id="nom_prueba" placeholder="Nombre de la prueba" required> <!-- En este campo podremos ponerle un nombre a la prueba -->
			<br><br>
			<input type="submit" value="Crear Prueba"><!-- Con el boton le pasamos los datos al controller -->
		</form>
	</div>
	</section>
	<?php require 'vistas/includes/footer.php'; ?> <!-- Pie de pagina -->
</body>
</html>