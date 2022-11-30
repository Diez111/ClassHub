<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="utf-8"> <!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require "vistas/includes/scripts.php"; ?>  <!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Chat</title> <!--Titulo de la pestaña del navegador -->
</head>
<body >
	<?php require "vistas/includes/header.php"; ?> <!-- Cargamos el header de la pagina -->
	<?php require "vistas/includes/nav.php"; ?> <!-- Cargamos el menu lateral de la pagina -->

		<section id="container"> <!-- Creamos un contenedor general para TODOS los chats-->
	<br><br>
	<section id="container">  <!-- Creamos un contenedor general para los chats publicos-->
	
	<div class="container"> <!-- Creamos un contenedor para cada fila del chat publico-->
	<table class="table"> <!-- Aplicamos el estilo a las tablas -->

		  <thead>  <!-- definimos una sección de encabezado en la tablas -->
			<tr> <!-- fila de tabla-->
				<th style="color: black;">Chats publicos</th> <!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
			</tr>
		</thead>
	 </div>
		<?php

		if ($querypublico->num_rows) {//Si la consulta recibe valores
			while ($datos = $querypublico->fetch_assoc()) { //Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
		?>
		<tr><!-- fila de tabla-->
			<td data-label="Chats publicos"><a style="color: red;" href="/mvc/chat_publico/exec/<?= $datos['idcurso'] ?>"><?= $datos['curso'] ?></a></td> <!-- Pasamos los datos de los cursos que proceso el controller y que nos corresponden a nosotros -->
		</tr>
		<?php
			}
		}
		?>
</table>
<br><br><br> 
	<div class="container"> <!--Le damos el estilo "Container", para crear una caja para la tabla-->
	<table class="table"> <!-- Le damos el estilo a la tabla-->
		  <thead> <!-- definimos una sección de encabezado en la tablas -->
			<tr> <!-- fila de tabla-->
				 <th style="color: black;">Chats Administradores/Privado</th>
			</tr>

		</thead>
	 </div>
		<?php
		if ($queryadmin->num_rows) {//Si la consulta recibe valores
			while ($datos = $queryadmin->fetch_assoc()) {//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
		?>
		<tr><!-- fila de tabla-->
			<td data-label="Administradores"><a style="color: red; " href="/mvc/chat_privado/exec/<?= $datos['idusuario'] ?>"><?= $datos['nombre'] ?></a></td>
		</tr>
		<?php
			}
		}
		?>
	<div class="container"><!--Le damos el estilo "Container", para crear una caja para la tabla-->
	<table class="table"><!-- Aplicamos el estilo a las tablas -->
		  <thead> <!-- definimos una sección de encabezado en la tablas -->
			<tr> <!-- fila de tabla-->
				 <th style="color: black;">Chats Profesores/Privado</th>
			</tr>
		</thead>
	 </div>
		<?php
		
		if ($queryprofes->num_rows) {//Si la consulta recibe valores
			while ($datos = $queryprofes->fetch_assoc()) {//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
		?>
		 <tr><!-- fila de tabla-->
			 <td data-label="Profesores"><a style="color: red; text-align: center;" href="/mvc/chat_privado/exec/<?= $datos['idusuario'] ?>"><?= $datos['nombre'] ?></a></td>  
			</tr>
		<?php
			}
		}
		?>
	

	<div class="container"><!--Le damos el estilo "Container", para crear una caja para la tabla-->
	<table class="table"><!-- Aplicamos el estilo a las tablas -->

		  <thead> <!-- definimos una sección de encabezado en la tablas -->
			<tr> <!-- fila de tabla-->
				 <th style="color: black;">Chats Alumnos/Privado</th>
			</tr>

		</thead>
	 </div>
		<?php

		if ($queryalumnos->num_rows) {//Si la consulta recibe valores
			while ($datos = $queryalumnos->fetch_assoc()) {//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
		?>
<tr class="chatmenu"><!-- fila de tabla con estilo del chatmenu-->
			<td data-label="Alumnos"><a style="color: red; text-align: center;" href="/mvc/chat_privado/exec/<?= $datos['idusuario'] ?>"><?= $datos['nombre'] ?></a></td>
		</tr>
		<?php
			}
		}
		?>
	</table>

<br><br><br><br><br><br><!-- Saltos de pagina-->
-
<?php require "vistas/includes/footer.php"; ?> <!-- Cargamos el pie de pagina -->
</body>
</html>