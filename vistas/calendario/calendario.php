<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"><!-- codificación de caracteres españoles -->
  <meta name="viewport" content="width=device-width, initial-scale=1"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% o sea por default -->

  <?php require 'vistas/includes/scripts.php'; ?>  <!-- solicitamos los estilos base de la pagina -->
  <title>Calendario</title>  <!-- El titulo de la pestaña del navegador -->
</head>
<body>
  <?php require "vistas/includes/header.php"; ?> <!-- Solicitamos el header-->
  <?php require "vistas/includes/nav.php"; ?> <!-- Solicinamos el menu lateral -->

  <br><br><br><br><br>
<center class="centrar" style="margin-left: 65px;"> <!-- Centramos todo con un margen de 65px-->
  <center>
    <section id="mon">
    <div class="lindo" style="display: inline-block;">
      <form action="<?= FOLDER_PATH . '/calendario/crear_evento' ?>" method="post" style=" width: 300px;" enctype="multipart/form-data"> <!-- Creamos el contorno del formulario -->
      <input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">
      <label for="titulo"><font size=5>Título</font></label> <!-- Titulo del formulario-->
      <input style="color:black;" type="text" name="titulo" id="titulo" placeholder="Ingrese un título" style="width: 300px;" required> <!-- Ingresamos el titulo del evento -->
      <br>
      <label for="contenido"><font size=4>Fecha del evento</font></label> <!-- subtitulo del formulario-->
      <input type="text" style="color:black;" name="contenido" id="contenido" placeholder="Ingrese una fecha" rows="10" style="width: 300px; resize: none;" required> <!-- Agregamos la fecha del evento -->
      <br>
      <input type="submit" value="Crear evento" class="btn_save">  <!-- El boton el cual sube los datos del formulario -->     
      </form>
    </div>
  </section>
  </center>
 <div class="container" style="margin-top: 30px;">
      <?php
      if ($query->num_rows) {  //Si la consulta recibe valores 
        while ($datos = $query->fetch_assoc()) { //Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
          ?>
      <table class="table"> <!--Creamos nuestra tabla al inicio del ciclo--> 
            <thead>
                <tr>
                    <th style="color: black;">Título</th><!-- Creamos la columna "Título"-->
                    <th style="color: black;">Creador</th><!-- Creamos la columna "Creador"-->
                    <th style="color: black;">Fecha evento</th> <!-- Creamos la columna "Fecha evento"-->    
                </tr>
            </thead>
      <center> 
            <tr>
              <td data-label="titulo"><?= $datos['titulo'] ?></td><!-- Cargamos el título en la columna "Título" --> 
              <td data-label="usuario"><?= $datos['nombre'] ?></td><!-- Cargamos el nombre en la columna "Creador" --> 
              <td data-label="descripcion"><p><?= $datos['contenido'] ?></p></td> <!-- Cargamos el contenido en la columna "Fecha evento"-->  
            </tr>
      </center>
      </table>
      <?php
        }
      }
      ?>
  </div>
</center>
</body>
</html>

 