<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es"> <!-- Idioma de la pagina-->
<head>
  <meta charset="utf-8"><!-- codificación de caracteres españoles -->
  <meta name="viewport" content="width=device-width, initial-scale=1"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
  <?php require "vistas/includes/scripts.php"; ?><!-- Cargamos todos los datos para el diseño general de la pagina -->
  <title>Editar Usuario</title><!--Titulo de la pestaña del navegador -->
</head>
<body>
  <?php require "vistas/includes/header.php"; ?><!-- Cargamos el header de la pagina -->
  <?php require "vistas/includes/nav.php"; ?><!-- Cargamos el menu lateral de la pagina -->

  <section id="container">
  
  <br><br><br><br><br><br><br><!-- Saltos de linea -->

    <div>
      <center><h1>Actualizar usuario</h1></center><!-- Titulo -->

      <form action="<?= FOLDER_PATH . '/editar_usuario/update/' . $id_usuario?>" method="post"><!-- Le pasamos los datos al controller mediante el metodo POST para que el envio de datos no sea visible para el usuario--> 
        <input type="hidden" name="id_usuario" value="<?= $id_usuario ?>"><!-- Me da el id del usuario, pero no lo muestra--> 
        <label for="nombre">Nombre</label><!-- Texto -->
        <input type="text" name="nombre" id="nombre" placeholder="Nombre completo" value="<?= $nombre_u; ?>"><!-- En este campo se pone el nombre y se muestra el que se le paso por el controller -->
        <label for="correo">Correo electrónico</label><!-- Texto -->
        <input type="email" name="correo" id="correo" placeholder="Correo electrónico" value="<?= $correo; ?>"><!-- En este campo se pone el correo y se muestra el que se le paso por el controller -->
        <label for="usuario">Usuario</label><!-- Texto -->
        <input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?= $usuario; ?>"><!-- En este campo se pone el usuario y se muestra el que se le paso por el controller -->
        <label for="clave">Clave</label><!-- Texto -->
        <input type="password" name="clave" id="clave" placeholder="Clave de acceso" ><!-- En este campo se pone la clave y se muestra el que se le paso por el controller -->
        <label for="rol">Tipo Usuario</label><!-- Texto -->
        
        <select  name="rol" id="rol" class="notItemOne">  <!-- Menu desplegable para el rol que queramos editar -->
          

          <?php //Dependiendo el rol que se le pase desde el controller tiene un rol o otro al editar el usuario  
          if ($rol_u == 1) {
            echo "<option value=\"1\" selected>Admin</option>\n";
          } else if ($rol_u == 2) {
            echo "<option value=\"2\" selected>Profesor</option>\n";
          } else if ($rol_u == 3) {
            echo "<option value=\"3\" selected>Alumno</option>\n";
          }
          ?>
          <option style="color: black;" value="1">Admin</option> <!-- El admin tiene valor de 1 -->
          <option style="color: black;" value="2">Profesor</option><!-- El profesor tiene el valor de 2 -->
          <option style="color: black;" value="3">Alumno</option><!-- El alumno tiene el valor de 3 -->
        </select>
    <br>

    <?php
      if ($query_cursos->num_rows) {
        while($datos = $query_cursos->fetch_assoc())
        {
          ?>
        <div class="container"><!--Le damos el estilo "Container", para crear una caja para el formulario-->
          <label class="switch"><!--Le damos el estilo para seleccionar el curso-->
           <h2 style="color:black" for="<?= $datos['curso'] ?>"><?= $datos['curso'] ?></h2>
           <input  type="checkbox" name="<?= "curso" . $datos['idcurso'] ?>" id="<?= $datos['curso'] ?>" value="<?= $datos['idcurso'] ?>" class="input" <?php if(in_array($datos['idcurso'], $cursos)) {echo "checked";} ?>><!-- Se pasa el valor que tiene relacionado cada curso y en se pasa desde el array a que cursos esta metido el usuario -->
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="indicator"></span>
          </label>
        </div>
        <br>
          <?php
        }
      }
    ?>
    

        <div class="container"><!--Le damos el estilo "Container", para crear una caja para el formulario-->
        <br>
        <label for="estado">Estado:</label><!-- Texto-->
        <select name="estado" id="estado" class="notItemOne"><!-- Inicio del menu desplegable-->
          
          <?php 
          if ($estatus == 1) { //Si el estatus es igual a 1 la cuenta no esta bloqueada, si es igual a 2 esta bloquada
            echo "<option value=\"1\" selected>No bloqueado</option>"; //Se muestra el valor correspondiente y con la opcion de cambiarlo para bloquear o desbloquear la cuenta
          } else {
            echo "<option value=\"2\" selected>Bloqueado</option>";//Se muestra el valor correspondiente y con la opcion de cambiarlo para bloquear o desbloquear la cuenta
          }
          ?>
          <option style="color: black;" value="2">Bloqueado</option> <!-- En el caso de querer bloquear la cuenta el valor de bloqueado es 2 el que pasamos al controller-->
          <option style="color: black;" value="1">No bloqueado</option><!-- En el caso de desbloquear la cuenta el valor que le pasamos al controller es 1-->
        </select>
        <input type="submit" value="Actualizar usuario" class="btn_save"><!-- Pasamos todos los datos a actualizar al controller-->
        </div>
      </form>
  </section>
  <?php require "vistas/includes/footer.php"; ?><!-- Pie de pagina-->
</body>
</html>