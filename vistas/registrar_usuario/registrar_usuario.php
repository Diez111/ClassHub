<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"><!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require "vistas/includes/scripts.php"; ?> <!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Registrar Usuario</title> <!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require "vistas/includes/header.php"; ?><!-- Cargamos el header de la pagina -->
	<?php require "vistas/includes/nav.php"; ?> <!-- Cargamos el menu lateral de la pagina -->

	<section id="container">
	
	<br><br><br><br><br><br>

		<div>
			<center><h1 style="color:white";>Registrar usuario</h1></center> <!-- Titulo -->

			<form action="<?= FOLDER_PATH . '/registrar_usuario/registrar'?>" method="post"><!-- Le pasamos los datos al controller mediante el metodo POST para que el envio de datos no sea visible para el usuario--> 
				<label for="nombre">Nombre</label><!-- Texto -->
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" required> <!-- En este campo se pone el nombre -->
				<label for="correo">Correo electrónico</label><!-- Texto -->
				<input type="email" name="correo" id="correo" placeholder="Correo electrónico" required> <!-- En este campo se pone el mail-->
				<label for="usuario">Usuario</label><!-- Texto -->
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" required> <!-- En este campo se pone el nombre del usuario -->
				<label for="clave">Clave</label><!-- Texto -->
				<input type="password" name="clave" id="clave" placeholder="Clave de acceso" required> <!-- En este campo se pone la clave  -->
				<label for="rol">Tipo Usuario</label><!-- Texto --> 
      
				<select name="rol" id="rol" class="notItemOne" required>
					<option value="" selected>Seleccione un tipo</option><!-- Menu desplegable con cada valor del rol -->
					<option style="color:black;" value="1">Admin</option>
					<option style="color:black;" value="2">Profesor</option>
					<option style="color:black;" value="3">Alumno</option>
				</select>
     
				<label for="curso">Curso:</label><!-- Texto -->

    <?php
      if ($query_cursos->num_rows) {
        while($datos = $query_cursos->fetch_assoc())
        {
          ?>
        <div class="container"><!--Le damos el estilo "Container", para crear una caja para el formulario-->
          <label class="switch"><!--Le damos el estilo para seleccionar el curso-->
           <h2 style="color:black" for="<?= $datos['curso'] ?>"><?= $datos['curso'] ?></h2>
           <input  type="checkbox" name="<?= "curso" . $datos['idcurso'] ?>" id="<?= $datos['curso'] ?>" value="<?= $datos['idcurso'] ?>" class="input"><!-- Se pasa el valor que tiene relacionado cada curso y en se pasa desde el array a que cursos esta metido el usuario -->
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="indicator"></span>
          </label>
        </div>
        <br>
          <?php
        }
      }
    ?>
				<input  type="submit" value="Registrar usuario" class="btn_save"><!-- El boton para pasar todos los datos al controller -->
			</form>
		</div>
	</section>

	<?php require "vistas/includes/footer.php"; ?><!-- Pie de pagina -->
</body>
</html>