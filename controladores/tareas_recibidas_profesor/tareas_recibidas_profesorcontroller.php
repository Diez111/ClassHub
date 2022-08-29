<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/tareas_recibidas_profesor/tareas_recibidas_profesormodel.php';
require_once ROOT . '/mvc/system/session.php';

class tareas_recibidas_profesorcontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new tareas_recibidas_profesormodel();
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}

		if ($this->session->get('rol') == 3) {
			header('location: /mvc/errorpage');
		}
	}

	public function salir()
	{
		$this->session->close();
		$this->model->close();
		header('location: /mvc/login');
	}

	public function exec()
	{
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'id' => $this->session->get('idUser'));
		$this->render(__CLASS__, $params);

		?>

		<br><br><br><br><br><br>


	<div class="container">
        <table class="table">

 			 <thead>
                <tr>
                    <th>Curso</th>
                    <th>Titulo</th>
                    <th>Fecha de Creacion</th>
                    <th>Archivo</th>
                </tr>
            </thead>



	

		<?php
		$query = $this->model->tareas();

		if ($query->num_rows) {
			while ($datos = $query->fetch_assoc()) {
				?>

				 <tr>
                    <td data-label="Curso"><?= $datos['curso'] ?></td>
                    <td data-label="Titulo"><?= $datos['titulo'] ?></td>
                    <td data-label="Fecha de Creacion"><?= $datos['fecha_creacion'] ?></td>
                    <td data-label="Archivo"> <a href="archivos_subidos/<?= $datos['nombre_archivo'] ?>" download><?= $datos['nombre_archivo'] ?></a> </td>
                    </td>
                </tr>









			
				<?php
			}
		}

		?>
	</section>
	<?php require 'vistas/includes/footer.php' ?>
</body>
</html>
	<?php
		$this->model->close();
	}
}

?>