<?php
	if($rol == 1){//Si el rol que nos paso el controller es igual a 1 muestra estas opciones en el nav
?>
<nav>
	<ul>
		<div class="capa"></div><!-- Estilo para la cama negra que se inserta al activar el menu lateral-->
		<input type="checkbox" id="btn-menu"><!-- La X  y las rellas del nav funcionan como un checkbox que se habilita y desabilita para abrir o cerrar-->
		<div class="container-menu"><!-- Estilo del nav -->
	 	<div class="cont-menu"><!-- Estilo de la distribucion del nav (letras, objetos como el del clima, etc)-->
	 	<nav>
			
			<a style="font-size: 17px;" href="/mvc/crear_curso">Agregar Curso</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/crear_materia">Agregar Materia</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/registrar_usuario" class="btn_new">Nuevo usuario</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/lista_usuarios">Lista de usuarios</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/inicio">Noticias</a> <!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/tareas_enviar">Tareas para alumnos</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/tareas_recibidas_profesor">Tareas recibidas</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/examen_menu_admin">Examen</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/chat_menu">Chat</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/calendario">Calendario</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/temas">Selector de temas</a><!-- Direccion en forma de hipertexto-->
			<a href="/mvc/eliminar_base">Eliminar base de datos</a><!-- Direccion en forma de hipertexto-->

		</nav>
			<label style="font-size: 17px;"style="font-size: 20px;"  for="btn-menu">✖️</label><!--La X es un objeto el cual actua y se trasnforma (actua como un checkbox)-->

				<br><br><br><br><br><br><!-- Salto de linea-->

                <p class="destacado"><!-- Estilo del clima -->
                    <a class="weatherwidget-io" href="https://forecast7.com/es/n34d60n58d38/buenos-aires/"
                        data-label_1="Buenos Aires" data-label_2="Clima" data-theme="original">Buenos Aires Clima</a> <!-- Buscamos la informaicon de forecast y decimos que queremos el clima de "Buenos Aires"-->
                </p>
		</div>
		</div>

		<div class="logo"> <!-- Estilo del titulo-->
			 <h1>ClassHub</h1><!-- Titulo-->
		</div>
	</ul>
</nav>



<?php } ?>

<?php
	if($rol == 2){//Si el rol que nos paso el controller es igual a 2 muestra estas opciones en el nav
?>
<nav>
	<ul>
		<div class="capa"></div><!-- Estilo para la cama negra que se inserta al activar el menu lateral-->
		<input type="checkbox" id="btn-menu"><!-- La X  y las rellas del nav funcionan como un checkbox que se habilita y desabilita para abrir o cerrar-->
	<div class="container-menu"><!-- Estilo del nav -->
	 	<div class="cont-menu"><!-- Estilo de la distribucion del nav (letras, objetos como el del clima, etc)-->
	 	<nav>
			<a style="font-size: 17px;" href="/mvc/inicio">Noticias</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/tareas_enviar">Tareas para alumnos</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/tareas_recibidas_profesor">Tareas recibidas</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/examen_menu_admin">Examen</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/chat_menu">Chat</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/calendario">Calendario</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/temas">Selector de temas</a><!-- Direccion en forma de hipertexto-->
	 	</nav>
	 		<label style="font-size: 20px;" for="btn-menu">✖️</label>
	 	
	 					<br><br><br><br><br><br><!-- Salto de linea-->

                <p class="destacado"><!-- Estilo del clima -->
                    <a class="weatherwidget-io" href="https://forecast7.com/es/n34d60n58d38/buenos-aires/"
                        data-label_1="Buenos Aires" data-label_2="Clima" data-theme="original">Buenos Aires Clima</a> <!-- Buscamos la informaicon de forecast y decimos que queremos el clima de "Buenos Aires"-->
                </p>
	 	</div>
		</div>

		<div class="logo"> <!-- Estilo del titulo-->
			 <h1>ClassHub</h1><!-- Titulo-->
		</div>
	</ul>
</nav>
<?php } ?>

<?php
	if($rol == 3){//Si el rol que nos paso el controller es igual a 3 muestra estas opciones en el nav
?>
<nav>
	<ul>
		<div class="capa"></div><!-- Estilo para la cama negra que se inserta al activar el menu lateral-->
		<input type="checkbox" id="btn-menu"><!-- La X  y las rellas del nav funcionan como un checkbox que se habilita y desabilita para abrir o cerrar-->
	<div class="container-menu"><!-- Estilo del nav -->
	 	<div class="cont-menu"><!-- Estilo de la distribucion del nav (letras, objetos como el del clima, etc)-->
	 	<nav>
			<a style="font-size: 17px;" href="/mvc/inicio">Noticias</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/tareas_recibidas_alumno">Tareas recibidas</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/tareas_enviadas_alumno">Tareas enviadas</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/examen_menu_alumnos">Examen</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/chat_menu">Chat</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/calendario">Calendario</a><!-- Direccion en forma de hipertexto-->
			<a style="font-size: 17px;" href="/mvc/temas">Selector de temas</a><!-- Direccion en forma de hipertexto-->
	 	</nav>
	 		<label style="font-size: 20px;" for="btn-menu">✖️</label>

	 				<br><br><br><br><br><br><!-- Salto de linea-->

                <p class="destacado"><!-- Estilo del clima -->
                    <a class="weatherwidget-io" href="https://forecast7.com/es/n34d60n58d38/buenos-aires/"
                        data-label_1="Buenos Aires" data-label_2="Clima" data-theme="original">Buenos Aires Clima</a> <!-- Buscamos la informaicon de forecast y decimos que queremos el clima de "Buenos Aires"-->
                </p>
                </p>
	 	</div>
		</div>

		<div class="logo"> <!-- Estilo del titulo-->
			 <h1>ClassHub</h1><!-- Titulo-->
		</div>
	</ul>
</nav>
<?php } ?>
