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
	
	<br><br><br><br><br><br><br>

		<div >
			<center><h1>Actualizar usuario</h1></center>

			<form action="<?= FOLDER_PATH . '/editar_usuario/update/' . $id_usuario?>" method="post">
				<input type="hidden" name="id" value="<?= $id_usuario ?>">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" value="<?= $nombre_u; ?>">
				<label for="correo">Correo electrónico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo electrónico" value="<?= $correo; ?>">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?= $usuario; ?>">
				<label for="clave">Clave</label>
				<input type="password" name="clave" id="clave" placeholder="Clave de acceso" >
				<label for="rol">Tipo Usuario</label>
        
				<select  name="rol" id="rol" class="notItemOne">
					<?php 
					if ($rol_u == 1) {
						echo "<option value=\"1\" selected>Admin</option>\n";
					} else if ($rol_u == 2) {
						echo "<option value=\"2\" selected>Profesor</option>\n";
					} else if ($rol_u == 3) {
						echo "<option value=\"3\" selected>Alumno</option>\n";
					}
					?>
					<option style="color: black;" value="1">Admin</option>
					<option style="color: black;" value="2">Profesor</option>
					<option style="color: black;" value="3">Alumno</option>
				</select>





 <br>
    <div class="container"> 
        <label class="switch">
        	  <h2 style="color:black" for="Primero A">Primero           A</h2>
        	<input  type="checkbox" name="curso1" id="Primero A" value="1" class="input"<?php if(in_array('1', $cursos)) {echo "checked";} ?>>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;   <span class="indicator"></span>
        </label>
    </div>
 <br>
  <div class="container">
        <label class="switch">
        	  <h2 style="color:black" for="Primero B">Primero B</h2>
        	<input type="checkbox" name="curso2" id="Primero B" value="2" class="input" <?php if(in_array('2', $cursos)) {echo "checked";} ?>>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="Segundo A">Segundo A</h2>
        	<input  type="checkbox" name="curso3" id="Segundo A" value="3" class="input" <?php if(in_array('3', $cursos)) {echo "checked";} ?> >
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="Segundo B">Segundo B</h2>
        	<input type="checkbox" name="curso4" id="Segundo B" value="4" class="input" <?php if(in_array('4', $cursos)) {echo "checked";} ?> >
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="Tercero A">Tercero A</h2>
        	<input type="checkbox" name="curso5" id="Tercero A" value="5"  class="input"<?php if(in_array('5', $cursos)) {echo "checked";} ?> >
         &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="Tercero B">Tercero B</h2>
        	<input  type="checkbox" name="curso6" id="Tercero B" value="6" class="input" <?php if(in_array('6', $cursos)) {echo "checked";} ?>>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="CuartoEL">Cuarto EL</h2>
        	<input type="checkbox" name="curso7" id="CuartoEL" value="7" class="input" <?php if(in_array('7', $cursos)) {echo "checked";} ?> >
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="CuartoEM">Cuarto   EM</h2>
        	<input type="checkbox" name="curso8" id="CuartoEM" value="8" class="input" <?php if(in_array('8', $cursos)) {echo "checked";} ?>>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="QuintoEL">Quinto  EL</h2>
        	<input type="checkbox" name="curso9" id="QuintoEL" value="9" class="input" <?php if(in_array('9', $cursos)) {echo "checked";} ?>>
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="QuintoEM">Quinto   EM</h2>
        	<input type="checkbox" name="curso10" id="QuintoEM" value="10" class="input" <?php if(in_array('10', $cursos)) {echo "checked";} ?>>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="SextoEL">Sexto    EL</h2>
        	<input  type="checkbox" name="curso11" id="SextoEL" value="11" class="input" <?php if(in_array('11', $cursos)) {echo "checked";} ?> >
          &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="SextoEM">Sexto   EM</h2>
        	<input  type="checkbox" name="curso12" id="SextoEM" value="12" class="input" <?php if(in_array('12', $cursos)) {echo "checked";} ?> >
           &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
     
        <label class="switch">
        	  <h2 style="color:black" for="SeptimoEL">Septimo    EL</h2>
        	<input  type="checkbox" name="curso13" id="SeptimoEL" value="13" class="input"<?php if(in_array('13', $cursos)) {echo "checked";} ?> >
           &nbsp;&nbsp;&nbsp; <span class="indicator"></span>
        </label>
    </div>
       <br>
      <div class="container">
     
        <label class="switch">
        	  <h2 style="color:black" for="SeptimoEM">Septimo    EM</h2>
        	<input  type="checkbox" name="curso14" id="SeptimoEM" value="14" class="input" <?php if(in_array('14', $cursos)) {echo "checked";} ?> >
            &nbsp;<span class="indicator"></span>
        </label>
    </div>
          <div class="container">
<br>








				<label for="estado">Estado:</label>
				<select name="estado" id="estado" class="notItemOne">
					







					<?php 
					if ($estatus == 1) {
						echo "<option value=\"1\" selected>No bloqueado</option>";
					} else {
						echo "<option value=\"2\" selected>Bloqueado</option>";
					}
					?>
					<option style="color: black;" value="2">Bloqueado</option>
					<option style="color: black;" value="1">No bloqueado</option>
				</select>
				<input type="submit" value="Actualizar usuario" class="btn_save">
			</form>
		</div>
	</section>
	<?php require "vistas/includes/footer.php"; ?>
</body>
</html>