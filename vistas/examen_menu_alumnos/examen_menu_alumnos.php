<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es"><!-- Idioma de la pagina-->
<head>
  <meta charset="UTF-8"><!-- codificación de caracteres españoles -->
  <?php include "vistas/includes/scripts.php"; ?><!-- Cargamos todos los datos para el diseño general de la pagina -->
  <title>Examenes</title><!--Titulo de la pestaña del navegador -->
</head>
  <?php include "vistas/includes/header.php"; ?><!-- Cargamos el header de la pagina -->
  <?php include "vistas/includes/nav.php"; ?><!-- Cargamos el menu lateral de la pagina -->
<br><br><br><br><br><!-- Saltos de linea -->
<h1 class='style8' align=center>Examen</h1><!-- Titulo centrado -->
  <div class="container"><!-- Creamos un contenedor para cada fila del examen menu -->
    <table class="table"><!-- Aplicamos el estilo a las tablas -->
      <thead><!-- definimos una sección de encabezado en la tablas -->
          <tr> <!-- fila de tabla-->
            <th>Icono</th> <!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
            <th>Opcion</th> <!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
          </tr>
      </thead>
          <tr>
            <td data-label="Icono" width="99%" height="90" valign="bottom"><img src="assets/iconos/icono_prueba_tarea.svg" width="auto" height="90" align="middle"></td>
            <td data-label="Opcion"><a href="/mvc/examen_menu_pruebas" class="alert alert-danger">Temas con cuestionarios</a></td> <!-- Nos manda al examen menu pruebas en el caso de hacer click en este -->
          </tr>
          <tr>
            <td data-label="Icono" width="99%" height="90" valign="bottom"><img src="assets/iconos/Icono_evaluacion.svg" width="auto" height="90" align="absmiddle"></td>
            <td data-label="Opcion"><a href="/mvc/examen_ranking" class="alert alert-danger">Resultado</a></td><!-- Nos manda al examen ranking en el caso de hacer click en este -->
          </tr>
  <?php include "vistas/includes/footer.php"; ?><!-- Pie de pagina-->
</body>
</html>
