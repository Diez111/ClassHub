<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php require "vistas/includes/scripts.php"; ?>
	<title>Eliminar Usuario</title>
</head>
<body>
	<?php require "vistas/includes/header.php"; ?>
	<?php require "vistas/includes/nav.php"; ?>

	<section id="container">
	<br><br><br><br>
		<div class="data_delete">
			<h2>Esto eliminara el registro del usuario</h2>
			<p>Nombre: <?= $nombre_u ?></p>
			<p>Usuario: <?= $usuario ?></p>
			<p>Tipo Usuario: <?= $rol_u ?></p>

			<form method="post" action="<?= FOLDER_PATH . '/eliminar_usuario/eliminar/' ?>">
				<input type="hidden" name="idusuario" value="<?= $id ?>">
				<input type="submit" value="Aceptar" class="btn_ok">
			</form>
				<a href="/mvc/lista_usuarios" class="btn_cancel">Cancelar</a>
		</div>
	</section>	

	<?php require "vistas/includes/footer.php"; ?>
</body>
</html>