<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"><!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require 'vistas/includes/scripts.php'; ?>  <!-- Cargamos todos los datos para el diseño general de la pagina -->
	
	<title>Inicio</title> <!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require 'vistas/includes/header.php'; ?> <!-- Cargamos el header de la pagina -->
	<?php require 'vistas/includes/nav.php'; ?> <!-- Cargamos el menu lateral de la pagina -->

<section id="container">
	<br><br><br><br> <!-- Saltos de linea -->
	<?php
		if ($rol != 3) { //Mientras el rol no sea el de un alumno esto puede ser visto
	?>
<center>
	<div>
		<form action="<?= FOLDER_PATH . '/inicio/crear_noticia' ?>" method="post" style="width: 350px;" enctype="multipart/form-data"> <!-- Le pasamos los datos al controller mediante el metodo POST para que el envio de datos no sea visible para el usuario-->
			<input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">
			<label for="titulo"><font size=5> Titulo</font></label> <!-- Texto-->
			<input style="color: black;" type="text" name="titulo" id="titulo" placeholder="Titulo" style="width: 300px;" required><!-- Se inserta el titulo de la noticia-->
			<br>
			<label for="contenido"><font size=4> Contenido</font></label><!-- Texto-->
			<textarea style="color:black;" name="contenido" id="contenido" placeholder="Contenido" rows="10" style="width: 300px; resize: none;" required></textarea><!-- Se inserta la noticia que quieras enviar -->
			<br>
			<center><label for="archivo"><font size=4> Archivo</font></label></center><!-- Se sube el archivo-->
			<center><input style="color:white;" type="file" name="archivo" id="archivo" style="width: 300px;"></center>
			<input type="submit" value="Crear Noticia" class="btn_save"> <!-- El boton para cargar la noticia-->
		</form>
	</div>
</center>
	<br><br><br> <!-- Saltos de linea -->
		<?php
		}
		?>
	<div class="container">
		<?php
		if ($query_noticias->num_rows) {//Si la consulta recibe valores
			while ($datos = $query_noticias->fetch_assoc()) {//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
				?>
        <table class="table">

 			 <thead><!-- definimos una sección de encabezado en la tablas -->
                <tr><!-- fila de tabla-->
                	<th style="color: black;">Creador</th> <!-- Crea una columna para los nombres de los creadores -->
                    <th style="color: black;">Título</th> <!-- Crea una columna para los títulos -->
                    <th style="color: black;">Descripción</th><!-- Crea una columna para las descripciones  -->
                    <th style="color: black;">Archivo</th><!-- Crea una columna para los archivos -->
                </tr>
            </thead>
			<center> 
				<tr>
					<td data-label="nombre"><?= $datos['nombre'] ?></td> <!-- El nombre que nos paso el controller -->
                    <td data-label="titulo"><?= $datos['titulo'] ?></td> <!-- El titulo que nos paso el controller -->
                    <td data-label="descripcion"><p><?= $datos['contenido'] ?></p></td> <!-- El contenido que nos paso el controller -->
                    <td data-label="Archivo">  <!-- El nombre del archivo que nos paso el controller -->

                    			<?php
				if ($datos['nombre_archivo'] != '') {
				?>
				<a href="archivos_subidos/<?= $datos['nombre_archivo'] ?>" download><?= $datos['nombre_archivo'] ?></a> <!-- Nos muestra el archivo que nos paso el controller -->
				<?php
				}
			  	?>
                    </td>              
                </tr>
			</center>
		</table>
		<?php
			}
		}
		?>
	</div>
</section>
	<?php require 'vistas/includes/footer.php'; ?> <!-- Pie de pagina-->
</body>
</html>