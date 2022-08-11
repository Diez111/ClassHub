<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php require "vistas/includes/scripts.php"; ?>
	  <link href="http://localhost/exam/exam/css/bootstrap.min.css" rel="stylesheet" type="text/css" /><!-- INCLUYE AL BOSSTRAP ALA WEB -->
    <link href="http://localhost/exam/exam/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Include all compiled plugins (below), or include individual files as needed -->      
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css" />
	<title>ClassHub</title>
</head>
<body>

	<?php require "vistas/includes/header.php"; ?>
			<?php require "vistas/includes/nav.php"; ?>

<br><br><br><br><br>
	
<title>Agregar Tema</title>
	<form method="POST" action="<?= FOLDER_PATH . '/examen_crear_tema/agregar_tema'?>">
  <table width="41%"  border="0" align="center">
    <tr>
      <input name="tema_examen" placeholder="Ingrese el nombre del tema" type="text" id="subname">
    </tr>
    <tr>

      <td><input type="submit" value="Agregar" ></td>
    </tr>
  </table>
</form>




	<?php require "vistas/includes/footer.php"; ?>
</body>
</html>
