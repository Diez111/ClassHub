<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php require 'vistas/includes/scripts.php'; ?> 
	<title>ClassHub</title>
</head>
<body>
		<?php require "vistas/includes/header.php"; ?>
	<?php require "vistas/includes/nav.php"; ?>
	<section id="container">
	
	<br><br><br><br><br><br><br><br><br><br><br>

		<div>
			<center><h1>selector de temas</h1></center>

			<form action="<?= FOLDER_PATH . '/temas/update' ?>" method="post">
				<label for="temavis">Tema</label>
				<select name="temavis" id="temavis" class="notItemOne">
					<?php 
					if ($temavis_u == 1) {
						echo "<option value=\"1\" selected>claro</option>\n";
					} else if ($temavis_u == 2) {
						echo "<option value=\"2\" selected>oscuro</option>\n";
					} else if ($temavis_u == 3) {
						echo "<option value=\"3\" selected>protanopia</option>\n";
					}else if ($temavis_u == 4) {
						echo "<option value=\"4\" selected>tricromacia</option>\n";
					}else if ($temavis_u == 5) {
						echo "<option value=\"5\" selected>pt</option>\n";
					}else if ($temavis_u == 6) {
						echo "<option value=\"6\" selected>nazi</option>\n";
					}
 
					?>
					<option style="color:black;" value="1">claro</option>
					<option style="color:black;" value="2">oscuro</option>
					<option style="color:black;" value="3">protanopia</option>
					<option style="color:black;" value="4">tricromacia</option>
					<option style="color:black;" value="5">daltonismo</option>
									</select>

				<input type="submit" value="Cambiar Tema" class="btn_save">
			</form>
		</div>
	</section>
	<?php require "vistas/includes/footer.php"; ?>
</body>
</html>
 