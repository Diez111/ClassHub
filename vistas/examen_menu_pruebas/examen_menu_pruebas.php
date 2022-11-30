<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"> <!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require "vistas/includes/scripts.php"; ?> <!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Examenes</title> <!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require "vistas/includes/header.php"; ?> <!-- Cargamos el header de la pagina -->
	<?php require "vistas/includes/nav.php"; ?> <!-- Cargamos el menu lateral de la pagina -->
	<section id="container"> 
	<br><br><br><br><br><br>

	<div class="container"> <!-- Cargamos el contenedor para la tabla-->
    	<?php
		if ($query_pruebas->num_rows) {//Si la consulta recibe valores
		?>
		<table class="table"> <!-- Cargamos el estilo de la tabla -->
 			<thead> <!-- definimos una sección de encabezado en la tablas -->
                <tr> <!-- fila de tabla-->
                	<center><th style="color: black;">Materia</th></center> <!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
                	<center><th style="color: black;">Nombre Prueba</th></center> <!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
                    <center><th style="color: black;">Acciones</th></center> <!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
                </tr>
            </thead>
		<?php
			while ($datos = $query_pruebas->fetch_assoc()) {//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
		?>
			<tr>
        		<td data-label="test_name"><?= $datos['materia'] ?></td><!-- Cargamos las materias que nos paso el controller -->
        		<td data-label="total_que"><?= $datos['test_name'] ?></td> <!--Cargamos los examenes disponibles que nos paso el controller -->
        		<td data-label="hacer_prueba" ><a style="color: cyan;" href="/mvc/examen_responder/exec/<?= $datos['test_id'] ?>">Hacer Prueba</a></td><!-- Le pasamos los datos al controller para que se cree la nueva evaluacion -->
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
	<?php require "vistas/includes/footer.php"; ?> <!-- Cargamos el pie de pagina -->
</body>
</html>
		