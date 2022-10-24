<?php
	$session = new session();
	if($session->get('rol') == 1){
?>
<nav>
	<ul>
		<div class="capa"></div>
		<input type="checkbox" id="btn-menu">
		<div class="container-menu">
	 	<div class="cont-menu">
	 	<nav>
			<a style="font-size: 17px;" href="/mvc/inicio">Noticias</a>
			<a style="font-size: 17px;" href="/mvc/lista_usuarios">Lista de usuarios</a>
			<a style="font-size: 17px;" href="/mvc/registrar_usuario" class="btn_new">Nuevo usuario</a>
			<a style="font-size: 17px;" href="/mvc/tareas_enviar">Tareas para alumnos</a>
			<a style="font-size: 17px;" href="/mvc/tareas_recibidas_profesor">Tareas recibidas</a>
			<a style="font-size: 17px;" href="/mvc/examen_menu_admin">Examen</a>
			<a style="font-size: 17px;" href="/mvc/chat_menu">Chat</a>
			<a style="font-size: 17px;" href="/mvc/calendario">Calendario</a>
			<a style="font-size: 17px;" href="/mvc/temas">Selector de temas</a>

		</nav>
			<label style="font-size: 17px;"style="font-size: 20px;"  for="btn-menu">✖️</label>

				<br><br><br><br><br><br><br><br>

                <p class="destacado">
                    <a class="weatherwidget-io" href="https://forecast7.com/es/n34d60n58d38/buenos-aires/"
                        data-label_1="Buenos Aires - City" data-label_2="Clima" data-theme="original">Buenos Aires -
                        City Clima</a>
                </p>
		</div>
		</div>

	<div class="logo">
			 <h1 style="font-size: 17px;">ClassHub</h1>
		</div>
	</ul>
</nav>



<?php } ?>

<?php
	if($session->get('rol') == 2){
?>
<nav>
	<ul>
		<div class="capa"></div>
		<input type="checkbox" id="btn-menu">
		<div class="container-menu">
	 	<div class="cont-menu">
	 	<nav>
			<a style="font-size: 17px;" href="/mvc/inicio">Noticias</a>
			<a style="font-size: 17px;" href="/mvc/tareas_enviar">Tareas para alumnos</a>
			<a style="font-size: 17px;" href="/mvc/tareas_recibidas_profesor">Tareas recibidas</a>
			<a style="font-size: 17px;" href="pepe">Calendario</a>
			<a style="font-size: 17px;" href="/mvc/examen_menu_admin">Examen</a>
			<a style="font-size: 17px;" href="/mvc/chat_menu">Chat</a>
			<a style="font-size: 17px;" href="/mvc/calendario">Calendario</a>
			<a style="font-size: 17px;" href="/mvc/temas">Selector de temas</a>
	 	</nav>
	 		<label style="font-size: 20px;" for="btn-menu">✖️</label>
	 	
	 						<br><br><br><br>

	 		  <p class="destacado">
                    <a class="weatherwidget-io" href="https://forecast7.com/es/n34d60n58d38/buenos-aires/"
                        data-label_1="Buenos Aires - City" data-label_2="Clima" data-theme="original">Buenos Aires -
                        City Clima</a>
                </p>
	 	</div>
		</div>

		<div class="logo">
			 <h1>ClassHub</h1>
		</div>
	</ul>
</nav>
<?php } ?>

<?php
	if($session->get('rol') == 3){
?>
<nav>
	<ul>
		<div class="capa"></div>
		<input type="checkbox" id="btn-menu">
		<div class="container-menu">
	 	<div class="cont-menu">
	 	<nav>
			<a style="font-size: 17px;" href="/mvc/inicio">Noticias</a>
			<a style="font-size: 17px;" href="/mvc/tareas_recibidas_alumno">Tareas recibidas</a>
			<a style="font-size: 17px;" href="/mvc/tareas_enviadas_alumno">Tareas enviadas</a>
			<a style="font-size: 17px;" href="/mvc/examen_menu_alumnos">Evaluacion de opcion multiple</a>

			<a style="font-size: 17px;" href="/mvc/chat_menu">Chat</a>
			<a style="font-size: 17px;" href="/mvc/calendario">Calendario</a>
			<a style="font-size: 17px;" href="/mvc/temas">Selector de temas</a>
	 	</nav>
	 		<label style="font-size: 20px;" for="btn-menu">✖️</label>

	 						<br><br><br><br>

	 		  <p class="destacado">
                    <a class="weatherwidget-io" href="https://forecast7.com/es/n34d60n58d38/buenos-aires/"
                        data-label_1="Buenos Aires - City" data-label_2="Clima" data-theme="original">Buenos Aires -
                        City Clima</a>
                </p>
	 	</div>
		</div>

		<div class="logo">
			 <h1>ClassHub</h1>
		</div>
	</ul>
</nav>
<?php } ?>
