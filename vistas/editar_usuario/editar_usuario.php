<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php require "vistas/includes/scripts.php"; ?>
	<script type="text/javascript" src="/mvc/vistas/includes/datos_usuario.js"></script>
	<title>Editar Usuario</title>
</head>
<body>
	<?php require "vistas/includes/header.php"; ?>
	<?php require "vistas/includes/nav.php"; ?>

	<section id="container">
	
	<br><br><br><br>

		<div class="form_register">
			<h1>Actualizar usuario</h1>

			<form action="<?= FOLDER_PATH . '/editar_usuario/update/' . $id?>" method="post">
				<input type="hidden" name="id" value="<?= $id ?>">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" value="<?= $nombre_u; ?>">
				<label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo electrónico" value="<?= $correo; ?>">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?= $usuario; ?>">
				<label for="clave">Clave</label>
				<input type="password" name="clave" id="clave" placeholder="Clave de acceso" >
				<label for="rol">Tipo Usuario</label>
				<select name="rol" id="rol" class="notItemOne">
					<?php 
					if ($rol_u == 1) {
						echo "<option value=\"1\" selected>Admin</option>\n";
					} else if ($rol_u == 2) {
						echo "<option value=\"2\" selected>Profesor</option>\n";
					} else if ($rol_u == 3) {
						echo "<option value=\"3\" selected>Alumno</option>\n";
					}
					?>
					<option value="1">Admin</option>
					<option value="2">Profesor</option>
					<option value="3">Alumno</option>
				</select>
				<label for="curso">Curso:</label>
				<select name="curso" id="curso" class="notItemOne">
					<?php
					switch ($curso) {
						case 1: echo "<option value=\"1\" selected>Primero</option>"; break;
						case 2: echo "<option value=\"2\" selected>Segundo</option>"; break;
						case 3: echo "<option value=\"3\" selected>Tercero</option>"; break;
						case 4: echo "<option value=\"4\" selected>Cuarto EL</option>"; break;
						case 5: echo "<option value=\"5\" selected>Cuarto EM</option>"; break;
						case 6: echo "<option value=\"6\" selected>Quinto EL</option>"; break;
						case 7: echo "<option value=\"7\" selected>Quinto EM</option>"; break;
						case 8: echo "<option value=\"8\" selected>Sexto EL</option>"; break;
						case 9: echo "<option value=\"9\" selected>Sexto EM</option>"; break;
						case 10: echo "<option value=\"10\" selected>Septimo EL</option>"; break;
						case 11: echo "<option value=\"11\" selected>Septimo EM</option>"; break;
						default: break;
					}
					?>
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
				<label for="estado">Estado:</label>
				<select name="estado" id="estado" class="notItemOne">
					<?php 
					if ($estatus == 1) {
						echo "<option value=\"1\" selected>No bloqueado</option>";
					} else {
						echo "<option value=\"2\" selected>Bloqueado</option>";
					}
					?>
					<option value="2">Bloqueado</option>
					<option value="1">No bloqueado</option>
				</select>
				<input type="submit" value="Actualizar usuario" class="btn_save">
			</form>
		</div>
	</section>
	<?php require "vistas/includes/footer.php"; ?>
</body>
</html>