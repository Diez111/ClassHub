<?php

	if(empty($_SESSION['active']))
	{
		header('location: ../');
	}
 ?>


	<header>
		<header class="header">
				<div class="container">
				<div class="btn-menu">
					<label for="btn-menu">☰</label>

				</div>

					<nav class="menu">
						<a href="#">Desarroladores</a>
						<a href="https://github.com/Diez111/Sandra101">GitHub</a>
						<a href="salir.php">Salir</a>
						<a class="user"><?php echo $_SESSION['user'].' -'.$_SESSION['rol']; ?> </a>
					</nav>
				</div>



		<?php include "nav.php"; ?>
	</header>
