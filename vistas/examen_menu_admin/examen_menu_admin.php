<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8"><!-- codificación de caracteres españoles -->
	<?php include "vistas/includes/scripts.php"; ?><!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Examenes</title>
</head>
<body>
	<?php include "vistas/includes/header.php"; ?><!-- Cargamos el header de la pagina -->
	<?php include "vistas/includes/nav.php"; ?><!-- Cargamos el menu lateral de la pagina -->
	<br><br><br><br><br><br><br><br><br><br><br><!-- Saltos de linea -->
<center><button class="button-36" role="button" href="/mvc/examen_crear_prueba"><p><a style="color: red;" href="/mvc/examen_crear_prueba"><font color= red size=6>Crear prueba</font></a></p></button></center> <!-- El boton nos manda a "examen_crear_prueba" -->
<br><br>
<center><button class="button-36" href="/mvc/examen_crear_pregunta"><p><a style="color: red;" href="/mvc/examen_crear_pregunta"><font color= red size=6>Agregar pregunta</font> </a></p></button></center><!-- El boton nos manda a "examen_crear_pregunta" -->
	<?php include "vistas/includes/footer.php"; ?>  <!-- Pie de pagina -->
</body>
</html>
