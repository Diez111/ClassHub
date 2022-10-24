<?php 
defined('BASEPATH') or exit('No se permite acceso directo');//No se permite el acceso directo
require_once ROOT . '/mvc/modelos/tareas_enviar_alumno/tareas_enviar_alumnomodel.php';//Se conecta al modelo para la consulta de los datos a la bd
require_once ROOT . '/mvc/system/session.php';//Me dice la sesion en la que estoy

class tareas_enviar_alumnocontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new tareas_enviar_alumnomodel();// Cuando creo una nueva tabla llamo al tareas enviar alumnomodel
		$this->session = new session(); //Verifico la sesion del usuario
		$this->session->iniciar();//La sesion del usuario al iniciar
		if (empty($this->session->get('pass'))) { //Verifico si la clave es correcta para la sesion
			header('location: /mvc/login'); //En caso de no ser correcta me mandara al login
		}

		if ($this->session->get('rol') != 3) {
			header('location: /mvc/errorpage');
		}
	}

	public function salir()
	{
		$this->session->close(); //Se cierra la sesion
		$this->model->close();//Se cierra la conexion con la bd
		header('location: /mvc/login');//Me manda al login
	}

	public function enviar_tarea($parametros)//Al enviar la tarea se ejecuta toda esta funcion con los datos que tenga
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires'); //Verifico la fecha en la zona horaria de Buenos Aires Argentina
		$fecha = date('Y-m-d H:i:s'); //Se estructura en año mes dia hora segundos

		if (isset($_FILES) && $_FILES['archivo']['name'] != '') { //Me dice el nombre del archivo que subi

			$archivo = $_FILES['archivo']; //Las propiedades del archivo y todos sus datos derivados necesarios para subir el archivo

			$nom_arch = $archivo['name'];
			$tipo_arch = $archivo['type'];
			$tmp_arch = $archivo['tmp_name'];
			$err_arch = $archivo['error'];
			$tam_arch = $archivo['size'];

			$ext_arch = explode('.', $nom_arch);
			$ext_arch2 = strtolower(end($ext_arch));//Las propiedades del archivo y todos sus datos derivados necesarios para subir el archivo

			$ext_permitidas = array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'rar', 'zip'); //Extensiones permitidas

			if (in_array($ext_arch2, $ext_permitidas)) {
				if ($err_arch === 0) {
					if ($tam_arch < 10000000) { 
						//$nuevo_nom_arch = uniqid('', true).".".$ext_arch2;
						//$ubicacion_arch = 'archivos_subidos/'.$nuevo_nom_arch;
						$ubicacion_arch = 'archivos_subidos/'.$nom_arch;
						move_uploaded_file($tmp_arch, $ubicacion_arch);
					} else {
						exit("El archivo es muy pesado, el maximo es 10mb"); //En caso de ser muy pesado
					}
				} else {
					exit("Hubo un error al subir el archivo");//En caso de error en la subida
				}
			} else {
				exit("No se pueden enviar archivos con esa extension");//En caso de una extension no soportada
			}
		}

		$this->model->enviarTarea($parametros, $fecha, $nom_arch);//Se envia al modelo los parametros,fecha y nombre del archivo a subir
		$this->model->close(); //Al terminar se cierra la conexion con la bd por seguridad
		header('location: /mvc/tareas_recibidas_alumno');
	}

	public function exec($idtarea)
	{
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'id' => $this->session->get('idUser'));//Obtengo el nombre, rol my idusuario de la sesion
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
		$this->model->close(); //Al terminar se cierra la conexion con la bd
	}
}

?>