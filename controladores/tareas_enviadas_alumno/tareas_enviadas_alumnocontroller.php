<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/tareas_enviadas_alumno/tareas_enviadas_alumnomodel.php';
require_once ROOT . '/mvc/system/session.php';

class tareas_enviadas_alumnocontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new tareas_enviadas_alumnomodel();
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

	public function eliminar_tarea($idtarea)
	{
		$this->model->eliminarTarea($idtarea);
		$this->model->close();
		header('location: /mvc/tareas_enviadas_alumno');
	}

	public function exec()
	{
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'id' => $this->session->get('idUser'));
		$this->render(__CLASS__, $params);

		?>

		<br><br><br><br><br><br>
		<table>
			<tr class="tabla">
				<th>Materia</th>
				<th>Titulo</th>
				<th>Fecha de Creacion</th>
				<th>Archivo</th>
				<th>Acciones</th>
			</tr>

		<?php
		$query = $this->model->tareas($this->session->get('idUser'));

		if ($query->num_rows) {
			while ($datos = $query->fetch_assoc()) {
				?>
				<tr>
					<td><?= $datos['materia'] ?></td>
					<td><?= $datos['titulo'] ?></td>
					<td><?= $datos['fecha_creacion'] ?></td>
					<td><a href="archivos_subidos/<?= $datos['nombre_archivo'] ?>" download><?= $datos['nombre_archivo'] ?></a></td>
					<td>
                	<a class="link_delete" href="/mvc/tareas_enviadas_alumno/eliminar_tarea/<?= "{$datos['idtarea']}" ?>">Eliminar</a>
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