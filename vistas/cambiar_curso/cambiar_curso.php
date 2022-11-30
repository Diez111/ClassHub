<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es"> <!-- Idioma de la pagina-->
<head>
  <meta charset="utf-8"><!-- codificación de caracteres españoles -->
  <meta name="viewport" content="width=device-width, initial-scale=1"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
  <?php require "vistas/includes/scripts.php"; ?><!-- Cargamos todos los datos para el diseño general de la pagina -->
  <title>Cambiar curso</title><!--Titulo de la pestaña del navegador -->
</head>
<body>
  <?php require "vistas/includes/header.php"; ?><!-- Cargamos el header de la pagina -->
  <?php require "vistas/includes/nav.php"; ?><!-- Cargamos el menu lateral de la pagina -->

  <section id="container">
  <br><br><br><br><br><br><br><!-- Saltos de linea -->
    <div>
      <center><h1>Actualizar curso</h1></center><!-- Titulo -->
      <form action="<?= FOLDER_PATH . '/cambiar_curso/cambiar_nombre/'?>" method="post"><!-- Le pasamos los datos al controller mediante el método POST para que el envío de datos no sea visible para el usuario--> 
        <input type="hidden" name="id_curso" value="<?= $id_curso ?>">
        <label for="curso">Nombre del curso</label><!-- Texto -->
        <input type="text" name="curso" id="curso" placeholder="Ingrese un nombre" value="<?= $curso ?>" required><!-- En este campo se pone el nombre -->
        <input type="submit" value="Cambiar nombre" class="btn_save"> <!-- El boton para cargar los datos-->
      </form>
    </div>
  </section>
</body>
</html>