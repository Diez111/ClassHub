<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/tareas_enviar/tareas_enviarmodel.php';
require_once ROOT . '/mvc/system/session.php';

class tareas_enviarcontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new tareas_enviarmodel();
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

	public function eliminar_tarea($idtarea)
	{
		$this->model->eliminarTarea($idtarea);
		$this->model->close();
		header('location: /mvc/tareas_enviar');
	}

	public function crear_tarea($parametros)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$fecha = date('Y-m-d H:i:s');

		if (isset($_FILES) && $_FILES['archivo']['name'] != '') {

			$archivo = $_FILES['archivo'];

			$nom_arch = $archivo['name'];
			$tipo_arch = $archivo['type'];
			$tmp_arch = $archivo['tmp_name'];
			$err_arch = $archivo['error'];
			$tam_arch = $archivo['size'];

			$ext_arch = explode('.', $nom_arch);
			$ext_arch2 = strtolower(end($ext_arch));

			$ext_permitidas = array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'rar', 'zip');

			if (in_array($ext_arch2, $ext_permitidas)) {
				if ($err_arch === 0) {
					if ($tam_arch < 10000000) {
						//$nuevo_nom_arch = uniqid('', true).".".$ext_arch2;
						//$ubicacion_arch = 'archivos_subidos/'.$nuevo_nom_arch;
						$ubicacion_arch = 'archivos_subidos/'.$nom_arch;
						move_uploaded_file($tmp_arch, $ubicacion_arch);
					} else {
						exit("El archivo es muy pesado, el maximo es 10mb");
					}
				} else {
					exit("Hubo un error al subir el archivo");
				}
			} else {
				exit("No se pueden enviar archivos con esa extension");
			}
		}

		$this->model->crearTarea($parametros, $fecha, $nom_arch);
		$this->model->close();
		header('location: /mvc/tareas_enviar');
	}

	public function exec()
	{
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'id' => $this->session->get('idUser'));
		$this->render(__CLASS__, $params);

		?>
			<label for="nom_tarea">Nombre de la Tarea</label>
			<input type="text" name="nom_tarea" style="width: 450px">
			<label for="desc_tarea">Descripcion</label>
			<textarea name="desc_tarea" id="desc_tarea" rows="10" style="resize: none; width: 450px;"></textarea>
			<label for="archivo">Archivo</label>
			<input type="file" name="archivo" id="archivo" style="width: 450px;">
			<label for="curso">Curso</label>
			<select name="curso" id="curso" class="notItemOne">
				<option value="" selected>Seleccione un curso</option>
		<?php
		$query = $this->model->cursos();

		if ($query->num_rows) {
			while ($datos = $query->fetch_assoc()) {
				?>
				<option value="<?= $datos['idcurso'] ?>"><?= $datos['curso'] ?></option>
				<?php
			}
		}
		?>
			</select>

			<label for="curso">Materia</label>
			<select name="materia" id="materia" class="notItemOne">
				<option value="" selected>Seleccione la materia</option>
		<?php
		$query = $this->model->materias();

		if ($query->num_rows) {
			while ($datos = $query->fetch_assoc()) {
				?>
				<option value="<?= $datos['idmateria'] ?>"><?= $datos['materia'] ?></option>
				<?php
			}
		}
		?>		
			</select>

			<input type="submit" value="Crear Tarea" class="btn_save">
		</form>
		</div>

		<br><br><br><br><br><br>
		<table>
			<tr class="tabla">
				<th>Curso</th>
				<th>Materia</th>
				<th>Creador</th>
				<th>Titulo</th>
				<th>Descripcion</th>
				<th>Fecha de Creacion</th>
				<th>Archivo</th>
				<th>Acciones</th>
			</tr>

		<?php
		$query = $this->model->tareas();

		if ($query->num_rows) {
			while ($datos = $query->fetch_assoc()) {
				?>
				<tr>
					<td><?= $datos['curso'] ?></td>
					<td><?= $datos['materia'] ?></td>
					<td><?= $datos['nombre'] ?></td>
					<td><?= $datos['titulo'] ?></td>
					<td><?= $datos['descripcion'] ?></td>
					<td><?= $datos['fecha_creacion'] ?></td>
					<td><a href="archivos_subidos/<?= $datos['nombre_archivo'] ?>" download><?= $datos['nombre_archivo'] ?></a></td>
					<td>
                	<a class="link_delete" href="/mvc/tareas_enviar/eliminar_tarea/<?= "{$datos['idtarea']}" ?>">Eliminar</a>
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