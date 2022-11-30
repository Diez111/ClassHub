<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"><!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require 'vistas/includes/scripts.php'; ?>  <!-- Cargamos todos los datos para el diseño general de la pagina -->
	
	<title>Crear Materia</title> <!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require 'vistas/includes/header.php'; ?> <!-- Cargamos el header de la pagina -->
	<?php require 'vistas/includes/nav.php'; ?> <!-- Cargamos el menu lateral de la pagina -->
<section id="container">
	<br><br><br><br> <!-- Saltos de linea -->
<center>
	<div>
		<form action="<?= FOLDER_PATH . '/crear_materia/crear_materia' ?>" method="post" style="width: 350px;" enctype="multipart/form-data"> <!-- Le pasamos los datos al controller mediante el metodo POST para que el envio de datos no sea visible para el usuario--> 
			<label for="materia"><font size=5>Nombre de la materia</font></label> <!-- Texto-->
			<input style="color: black;" type="text" name="materia" id="materia" placeholder="Ingrese un nombre" style="width: 300px;" required><!-- Se inserta el nombre del curso-->
			<input type="submit" value="Crear Curso" class="btn_save"> <!-- El boton para cargar el nombre-->
		</form>
	</div>
</center>
	<br><br><br> <!-- Saltos de linea -->
	<div class="container">
            <?php
			if ($query_materias->num_rows) { //Si la consulta recibe valores
			?>
			<table class="table">
 			<thead><!-- definimos una sección de encabezado en la tablas -->
                <tr><!-- fila de tabla-->
                    <th style="color: black;">Materia</th> <!-- Crea una columna para las materias -->
                    <th style="color: black;">Acciones</th> <!-- Crea una columna para las acciones -->
                </tr>
            </thead>
			<?php
				while ($datos = $query_materias->fetch_assoc()) { //Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
			?>
				<tr>
                    <td data-label="curso"><?= $datos['materia'] ?></td> <!-- El curso que nos paso el controller -->
                    <td data-label="curso"><a style="color: skyblue;" href="<?= FOLDER_PATH . '/cambiar_materia/exec/' . $datos['idmateria'] ?>">Cambiar nombre</a></td> <!-- La opción para cambiar el nombre de ese curso -->
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
	<?php require 'vistas/includes/footer.php'; ?> <!-- Pie de pagina-->
</body>
</html>