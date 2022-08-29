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
			<a href="/mvc/inicio">Noticias</a>
			<a href="/mvc/lista_usuarios">Lista de usuarios</a>
			<a href="/mvc/registrar_usuario" class="btn_new">Nuevo usuario</a>
			<a href="/mvc/tareas_enviar">Tareas para alumnos</a>
			<a href="/mvc/tareas_recibidas_profesor">Tareas recibidas</a>
			<a href="/mvc/examen_menu_admin">Examen</a>
			<a href="/mvc/chat">Chat</a>
		</nav>
			<label for="btn-menu">✖️</label>

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
	if($session->get('rol') == 2){
?>
<nav>
	<ul>
		<div class="capa"></div>
		<input type="checkbox" id="btn-menu">
		<div class="container-menu">
	 	<div class="cont-menu">
	 	<nav>
			<a href="#">Cursos</a>
			<a href="/mvc/inicio">Noticias</a>
			<a href="#">Boletin de notas</a>
			<a href="/mvc/tareas_enviar">Tareas para alumnos</a>
			<a href="/mvc/tareas_recibidas_profesor">Tareas recibidas</a>
			<a href="pepe">Calendario</a>
			<a href="/mvc/examen_menu_admin">Examen</a>
			<a href="/mvc/chat">Chat</a>
	 	</nav>
	 		<label for="btn-menu">✖️</label>
	 	
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
			<a href="/mvc/inicio">Noticias</a>
			<a href="/mvc/tareas_recibidas_alumno">Tareas recibidas</a>
			<a href="/mvc/tareas_enviadas_alumno">Tareas enviadas</a>
			<a href="/mvc/examen_menu_alumnos">Evaluacion de opcion multiple</a>
			<a href="../calendario/index.php">Calendario</a>
			<a href="/mvc/chat">Chat</a>
	 	</nav>
	 		<label for="btn-menu">✖️</label>

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
