<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php require "vistas/includes/scripts.php"; ?>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<title>Registrar Usuario</title>
</head>
<body>
	<?php require "vistas/includes/header.php"; ?>
	<?php require "vistas/includes/nav.php"; ?>

	<section id="container">
	
	<br><br><br><br><br><br>

		<div>
			<center><h1 style="color:white";>Registrar usuario</h1></center>

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
					<option style="color:black;" value="1">Admin</option>
					<option style="color:black;" value="2">Profesor</option>
					<option style="color:black;"  selected value="3">Alumno</option>
				</select>
     
				<label for="curso">Curso:</label>
			

 <br>
    <div class="container"> 
        <label class="switch">
        	  <h2 style="color:black" for="Primero A">Primero           A</h2>
        	<input  type="checkbox" name="curso1" id="Primero" value="1" class="input">
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;   <span class="indicator"></span>
        </label>
    </div>
 <br>
  <div class="container">
        <label class="switch">
        	  <h2 style="color:black" for="Primero B">Primero B</h2>
        	<input type="checkbox" name="curso2" id="Primero" value="2" class="input">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="Segundo A">Segundo A</h2>
        	<input  type="checkbox" name="curso3" id="Segundo" value="3" class="input">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="Segundo B">Segundo B</h2>
        	<input  type="checkbox" name="curso4" id="Segundo" value="4" class="input">
          &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="Tercero A">Tercero A</h2>
        	<input  type="checkbox" name="curso5" id="Tercero" value="5" class="input">
         &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="Tercero B">Tercero B</h2>
        	<input  type="checkbox" name="curso6" id="Tercero" value="6" class="input">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="CuartoEL">Cuarto EL</h2>
        	<input type="checkbox" name="curso7" id="CuartoEL" value="7" class="input">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="CuartoEM">Cuarto   EM</h2>
        	<input  type="checkbox" name="curso8" id="CuartoEM" value="8"class="input">
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:black" class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="QuintoEL">Quinto  EL</h2>
        	<input  type="checkbox" name="curso9" id="QuintoEL" value="9" class="input">
        &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="QuintoEM">Quinto   EM</h2>
        	<input type="checkbox" name="curso10" id="QuintoEM" value="10" class="input">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="SextoEL">Sexto    EL</h2>
        	<input  type="checkbox" name="curso11" id="SextoEL" value="11"class="input">
          &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="indicator"></span>
        </label>
    </div>
     <br>
     <br>
      <div class="container">
      
        <label class="switch">
        	  <h2 style="color:black" for="SextoEM">Sexto   EM</h2>
        	<input  type="checkbox" name="curso12" id="SextoEM" value="12" class="input">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="indicator"></span>
        </label>
    </div>
     <br>
      <div class="container">
     
        <label class="switch">
        	  <h2 style="color:black" for="SeptimoEL">Septimo    EL</h2>
        	<input  type="checkbox" name="curso13" id="SeptimoEL" value="13" class="input">
           &nbsp;&nbsp;&nbsp; <span class="indicator"></span>
        </label>
    </div>
       <br>
      <div class="container">
     
        <label class="switch">
        	  <h2 style="color:black" for="SeptimoEM">Septimo    EM</h2>
        	<input  type="checkbox" name="curso14" id="SeptimoEM" value="14" class="input">
            &nbsp;<span class="indicator"></span>
        </label>
    </div>
          <div class="container">



<br>



		
	
			
		

				<input  type="submit" value="Registrar usuario" class="btn_save">
			</form>
		</div>
	</section>

	<?php require "vistas/includes/footer.php"; ?>
</body>
</html>