<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"> <!-- codificación de caracteres españoles -->
	<meta name="viewport" content="width=device-width, initial-scale=1"><!-- Con "viewport" tratamos de adaptar la escala de la pagina segun la pantalla del dispositivo y con el content acompañado de "initial-scale=1" decimos que el zoom predeterminado al cargar la pagina sea del 100% osea por default -->
	<link rel="stylesheet" type="text/css" href="/mvc/vistas/includes/css/chat.css">  <!-- Cargamos el estilo del chat-->
	<?php require "vistas/includes/scripts.php"; ?>  <!-- Cargamos todos los datos para el diseño general de la pagina -->
	<title>Chat</title> <!--Titulo de la pestaña del navegador -->
</head>
<body>
	<?php require "vistas/includes/header.php"; ?>  <!-- Cargamos el header de la pagina -->
	<?php require "vistas/includes/nav.php"; ?> <!-- Cargamos el menu lateral de la pagina -->
	<br><br><br><br> <!-- Saltos de linea -->
	<div id="chat">  <!-- Cargamos el encabezado del chat privado -->     
		<div id="header-chat">  <!-- Cargamos el estilo del encabezado para el chat privado--> 
			Chat Privado 
		</div>
		<div id="mensajes">   <!-- Cargamos el estilo de los mensajes--> 
			<div class="mensaje-autor"> <!-- Cargamos el estilo del autor del mensaje --> 
				<div class="contenido">  <!-- Cargamos el estilo del conenido del chat--> 
				<link rel="stylesheet" type="text/css" href="/mvc/vistas/includes/css/chat.css">  <!-- Cargamos el estilo del css para el chat privado--> 
	<?php

		if ($query->num_rows) { //Si la consulta recibe valores
			while($datos = $query->fetch_assoc())//Crea un array con los datos y con cada ciclo cambia de fila (Array bidimensional)
			{		
			?>
			<div><p style="color: white;"><?= $datos['mensaje'] ?></p></div> <!-- Cargamos el mensaje que nos paso el controller--> 
            <div class="fecha"><p style="color: white; font-size: 15px;"><?= $datos['nombre'] ?></p></div> <!-- Cargamos nombre del autor del mensaje--> 
			<?php
			}
		}
		?>
				</div>
    		</div>
		</div>

<br>
		<form method="POST" action="<?= FOLDER_PATH . '/chat_privado/enviar_mensaje' ?>">  <!-- Le pasamos los datos al controller mediante el metodo POST para que el envio de datos no sea visible para el usuario--> 
			<input type="hidden" name="emisor_id" value="<?= $id_emisor ?>"> <!-- Le pasamos el id del emisor del mensaje --> 
			<input type="hidden" name="receptor_id" value="<?= $id_receptor ?>"> <!--Le pasamos el id del receptor del mensaje --> 
			<center><textarea style="color:black;" name="mensaje" placeholder="Escribe un mensaje" rows="5" required></textarea></center> <!-- El campo donde se carga el mensaje y el usuario pueda escribir con un salto de linea de 5 para que tenga el suficiente espacio para escribir--> 
			<input type="submit" value="Enviar" class="btn_save"> <!-- Boton para enviar la informacion--> 
		</form>
		
		<?php require "vistas/includes/footer.php"; ?><!-- Cargamos el pie de pagina --> 

</body>
</html>