<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"><!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<?php require "vistas/includes/scripts.php"; ?> <!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Lista De Usuarios</title> <!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require "vistas/includes/header.php"; ?> <!-- Cargamos el header de la pagina -->
	<?php require "vistas/includes/nav.php"; ?>  <!-- Cargamos el menu lateral de la pagina -->
	<section id="container">
	<br><br><br><br><br><br> <!-- Saltos de linea -->
		<div class="container"><!-- Creamos un contenedor para cada fila del chat publico-->
		<?php
		if ($consulta->num_rows) { //Si la consulta recibe valores
		?>
		<table class="table"><!-- Aplicamos el estilo a las tablas -->
 			 <thead> <!-- definimos una sección de encabezado en la tablas -->
                <tr> <!-- fila de tabla-->
                    <th style="color: black;">Nombre</th><!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
                    <th style="color: black;">Usuario</th><!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
                    <th style="color: black;">Email</th><!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
                    <th style="color: black;">Rol</th><!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
                    <th style="color: black;">Acciones</th><!-- definimos una celda como encabezado de un grupo de celdas en la tabla -->
                </tr>
            </thead>
		<?php
			while ($datos = $consulta->fetch_assoc()) {//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
		?>
				 <tr><!-- fila de tabla con estilo del chatmenu-->
                    <td data-label="Nombre"><?php echo $datos['nombre']; ?></td> <!-- Cargamos el nombre que nos paso el controller -->
                    <td data-label="Usuario"><?php echo $datos['usuario']; ?></td><!-- Cargamos el usuario que nos paso el controller-->
                    <td data-label="Email"><?php echo $datos['correo'] ?></td><!-- Cargamos el email que nos paso el controller-->
                    <td data-label="Rol"><?php echo $datos['rol'] ?></td><!-- Cargamos el rol que nos paso el controller-->
                    <td data-label="Acciones">
                	<a class="link_edit" href="/mvc/editar_usuario/exec/<?= "{$datos['idusuario']}" ?>">Editar</a>  <!-- Nos manda a la vista para editar el usuario, pasandole el id del usuario al que hacemos referencia-->
                <?php
                if ($datos['idusuario'] != 1) {
                ?>
                	<a class="link_delete" href="/mvc/eliminar_usuario/exec/<?= "{$datos['idusuario']}" ?>">Eliminar</a><!-- Nos manda a la vista para eliminar el usuario, pasandole por el exec el id del usuario al que hacemos referencia-->
                <?php
            	}
                ?>
                	</td>
                </tr>
        	
		<?php 
			} 
		?>
		</table>
		<?php
		}
		?>
		</div>
	</section>
	<?php require "vistas/includes/footer.php"; ?><!-- Cargamos el pie de pagina -->
</body>
</html>