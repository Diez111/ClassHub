<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/tareas_enviar_alumno/tareas_enviar_alumnomodel.php';
require_once ROOT . '/mvc/system/session.php';

class tareas_enviar_alumnocontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new tareas_enviar_alumnomodel();
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

	public function enviar_tarea($parametros)
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

		$this->model->enviarTarea($parametros, $fecha, $nom_arch);
		$this->model->close();
		header('location: /mvc/tareas_recibidas_alumno');
	}

	public function exec($idtarea)
	{
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'id' => $this->session->get('idUser'));
		$this->render(__CLASS__, $params);

		$query = $this->model->consulta($idtarea);
		$datos = $query->fetch_assoc();

		?>
			<input type="hidden" name="curso" value="<?= $this->session->get('curso') ?>">
			<input type="hidden" name="materia" value="<?= $datos['materia'] ?>">
			<input type="hidden" name="titulo" value="<?= $datos['titulo'] ?>">
			<label for="archivo">Archivo</label>
			<input type="file" name="archivo" id="archivo" style="width: 450px;">

			<input type="submit" value="Enviar Tarea" class="btn_save">
		</form>
		</div>
	</section>
	<?php require 'vistas/includes/footer.php' ?>
</body>
</html>
	<?php
		$this->model->close();
	}
}

?>