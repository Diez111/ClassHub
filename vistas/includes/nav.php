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
			<a href="/mvc/pepe">Noticias</a>
			<a href="/mvc/lista_usuarios">Lista de usuarios</a>
			<a href="mvc/pepe" class="btn_new">Nuevo usuario</a>
			<a href="mvc/pepe">Tareas para alumnos</a>
			<a href="mvc/pepe">Examen</a>
		</nav>
			<label for="btn-menu">✖️</label>
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
			<a href="../inicio/index.php">Noticias</a>
			<a href="#">Boletin de notas</a>
			<a href="../tarea/tarea.php">Tareas para alumnos</a>
			<a href="#">Tareas recibidas</a>
			<a href="../calendario/index.php">Calendario</a>
			<a href="../examen/index.php">Examen</a>
	 	</nav>
	 		<label for="btn-menu">✖️</label>
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
			<a href="index.php">Noticias</a>
			<a href="../tarea/tarea.php">Tareas pendientes</a>
			<a href="#">Tareas enviadas</a>
			<a href="#">Evaluacion de opcion multiple</a>
			<a href="../calendario/index.php">Calendario</a>
	 	</nav>
	 		<label for="btn-menu">✖️</label>
	 	</div>
		</div>

		<div class="logo">
			 <h1>ClassHub</h1>
		</div>
	</ul>
</nav>
<?php } ?>
