<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/tareas_recibidas_alumno/tareas_recibidas_alumnomodel.php';
require_once ROOT . '/mvc/system/session.php';

class tareas_recibidas_alumnocontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new tareas_recibidas_alumnomodel();
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}

		if ($this->session->get('rol') != 3) {
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
				<th>Materia</th>
				<th>Creador</th>
				<th>Descripcion</th>
				<th>Fecha de Creacion</th>
				<th>Archivo</th>
				<th>Acciones</th>
                </tr>
            </thead>
				



		<?php
		$query = $this->model->tareas();

		if ($query->num_rows) {
			while ($datos = $query->fetch_assoc()) {
				?>



				<tr>
                    <td data-label="curso"><?= $datos['curso'] ?></td>
                    <td data-label="materia"><?= $datos['materia'] ?></td>
                    <td data-label="nombre"><?= $datos['nombre'] ?> </td>
                     <td data-label="descripcion"><?= $datos['descripcion'] ?> </td>
                      <td data-label="fecha_creacion"><?= $datos['fecha_creacion'] ?> </td>
                       <td data-label="archivos_subidos"><a href="archivos_subidos/<?= $datos['nombre_archivo'] ?>" download><?= $datos['nombre_archivo'] ?></a> </td>
                        <td data-label="Acciones">	<a class="link_edit" href="/mvc/tareas_enviar_alumno/exec/<?= "{$datos['idtarea']}" ?>">Enviar Tarea</a> </td>


                   
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