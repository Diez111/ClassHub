<nav>
	<ul>
	<?php
		if($_SESSION['rol'] == 1){
	 ?>
	 <div class="capa"></div>
	 <!--	--------------->
	 <input type="checkbox" id="btn-menu">
	 <div class="container-menu">
	 	<div class="cont-menu">
	 		<nav>
						<a href="index.php">Noticias</a>
						<a href="lista_usuarios.php">Lista de usuarios</a>
						<a href="registro_usuario.php">Registro</a>
						<a href="registro_usuario.php" class="btn_new">Nuevo usuario</a>
	 		</nav>
	 		<label for="btn-menu">✖️</label>
	 	</div>
	 </div>

	 <div class="logo">
			 <h1>ClassHub</h1>
		 </div>

	<?php } 	?>
		</li>
	</ul>
</nav>


<nav>
	<ul>
	<?php
		if($_SESSION['rol'] == 2){
	 ?>
	 <div class="capa"></div>
	 <!--	--------------->
	 <input type="checkbox" id="btn-menu">
	 <div class="container-menu">
	 	<div class="cont-menu">
	 		<nav>
				<a href="#">Cursos</a>
						<a href="index.php">Noticias</a>
						<a href="#">Boletin de notas</a>
						<a href="#">Tareas para alumnos</a>
						<a href="#">Tareas recibidas</a>
						<a href="#">Evaluacion de opcion multiple</a>
						<a href="#">Calendario</a>
	 		</nav>
	 		<label for="btn-menu">✖️</label>
	 	</div>
	 </div>

	 <div class="logo">
			 <h1>ClassHub</h1>
		 </div>

	<?php } 	?>
		</li>
	</ul>
</nav>

<nav>
	<ul>
	<?php
		if($_SESSION['rol'] == 3){
	 ?>
	 <div class="capa"></div>
	 <!--	--------------->
	 <input type="checkbox" id="btn-menu">
	 <div class="container-menu">
	 	<div class="cont-menu">
	 		<nav>
						<a href="index.php">Noticias</a>
						<a href="#">Tareas pendientes</a>
						<a href="#">Tareas enviadas</a>
						<a href="#">Evaluacion de opcion multiple</a>
						<a href="#">Calendario</a>
	 		</nav>
	 		<label for="btn-menu">✖️</label>
	 	</div>
	 </div>

	 <div class="logo">
			 <h1>ClassHub</h1>
		 </div>

	<?php } 	?>
		</li>
	</ul>
</nav>
