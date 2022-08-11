<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php require "vistas/includes/scripts.php"; ?>
	<title>Registrar Usuario</title>
</head>
<body>
	<?php require "vistas/includes/header.php"; ?>
	<?php require "vistas/includes/nav.php"; ?>

	<section id="container">
	
	<br><br><br><br><br><br><br><br><br><br><br>


		<div class="form_register">
			<center><h1>Registrar usuario</h1></center>

			<form action="<?= FOLDER_PATH . '/registrar_usuario/registrar'?>" method="post">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo">
				<label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo electrónico">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario">
				<label for="clave">Clave</label>
				<input type="password" name="clave" id="clave" placeholder="Clave de acceso" >
				<label for="rol">Tipo Usuario</label>
				<select name="rol" id="rol" class="notItemOne">
					<option value="" selected>Seleccione un tipo</option>
					<option value="1">Admin</option>
					<option value="2">Profesor</option>
					<option value="3">Alumno</option>
				</select>
				<label for="curso">Curso:</label>
				<select name="curso" id="curso" class="notItemOne">
					<option value="" selected>Seleccione un curso</option>
					<option value="1">Primero</option>
					<option value="2">Segundo</option>
					<option value="3">Tercero</option>
					<option value="4">Cuarto EL</option>
					<option value="5">Cuarto EM</option>
					<option value="6">Quinto EL</option>
					<option value="7">Quinto EM</option>
					<option value="8">Sexto EL</option>
					<option value="9">Sexto EM</option>
					<option value="10">Septimo EL</option>
					<option value="11">Septimo EM</option>
				</select>
				<input type="submit" value="Registrar usuario" class="btn_save">
			</form>
		</div>
	</section>
	<?php require "vistas/includes/footer.php"; ?>
</body>
</html>