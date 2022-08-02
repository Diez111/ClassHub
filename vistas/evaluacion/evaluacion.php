<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
		<?php require 'vistas/includes/scripts.php'; ?>
	<title>ClassHub</title>
</head>
<body>

	<?php require 'vistas/includes/header.php'; ?>
		<?php require 'vistas/includes/nav.php'; ?>

	<br><br><br><br><br><br>

<form name="form1" method="post" action="/mvc/evaluacionadmin">
<table width="90" border="0">
        <a>Nombre del admin</a>

    <td width="49"><input name="loginid" type="text" id="loginid"></td>
  </tr>
  <tr>
    <td class="style2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  
    <td><input name="submit" type="submit" id="submit" value="Login"></td>
  </tr>
</table></td>
  </tr>
</table>

</form>
	<?php require 'vistas/includes/footer.php'; ?>
</body>
</html>