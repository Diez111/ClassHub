<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje
require_once ROOT . '/mvc/modelos/tareas_enviar/tareas_enviarmodel.php'; //carga el archivo con el modelo
require_once ROOT . '/mvc/system/session.php'; //carga el archivo de la clase 'session'

class tareas_enviarcontroller extends controller //Crea la clase "tareas_enviarcontroller" con herencia de la clase "controller"
{
	private $session; //Crea la variable 'session'
	private $model; //Crea la variable 'model'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->model = new tareas_enviarmodel(); //creamos el objeto 'model' con la clase 'tareas_enviarmodel' para poder comunicarse con la base de datos a traves del modelo
		$this->session = new session(); //creamos el objeto 'session' con la clase 'session' para poder obtener informacion de la sesión
		$this->session->iniciar(); //iniciamos la sesión

		if (empty($this->session->getAll())) { //pedimos la variable completa de la sesión, si existe se sigue con el código, sino nos manda al login
			header('location: /mvc/login'); //usamos la función header(propia de php) para ir al login
		}

		if ($this->session->get('rol') == 3) { //Todos los roles diferentes a los alumnos pueden ver esto
			header('location: /mvc/errorpage'); //Sino te manda a la pantalla de error
		}	
	}

	public function salir() //Función para cerrar la sesion 
	{
		$this->session->close(); //Cerramos la sesion
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/login'); //Nos manda al login 
	}

	public function eliminar_tarea($idtarea) //función para eliminar una tarea
	{
		$this->model->eliminarTarea($idtarea); //le pedimos al modelo eliminar la tarea que tenga la id que recibimos como parametro
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
		header('location: /mvc/tareas_enviar'); //te recarga la página para ver el cambio
	}

	public function crear_tarea($parametros) //función para crear una tarea
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires'); //Establecemos la zona horaria en Buenos Aires, Argentina
		$fecha = date('Y-m-d H:i:s'); //La fecha se compone del año, mes, día, hora, minutos y segundos, en ese orden

		if (isset($_FILES) && $_FILES['archivo']['name'] != '') { //Si existe la variable $_FILES(es decir, que se haya subido un archivo) y si el archivo tiene un nombre diferente a vacio sucede lo siguiente

			$archivo = $_FILES['archivo']; //Crea un array con los datos del archivo

			$nom_arch = $archivo['name']; //Nombre del archivo
			$tipo_arch = $archivo['type']; //Extensión del archivo
			$tmp_arch = $archivo['tmp_name']; //Ubicacion temporal
			$err_arch = $archivo['error']; //Errores del archivo
			$tam_arch = $archivo['size']; //El tamaño del archivo

			$ext_arch = explode('.', $nom_arch); //Utilizamos explode para sacar el '.' de la extensión del archivo
			$ext_arch2 = strtolower(end($ext_arch)); //Utilizamos strtolower(función de php) para poner en minuscula la extensión del archivo, la función 'end' solo sirve para seleccionar el ultimo elemento de un array, que en este caso seria la extensión

			$ext_permitidas = array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'rar', 'zip'); //Las extensiones permitidas

			if (in_array($ext_arch2, $ext_permitidas)) { //Si el tipo de extension es una de las permitidas se procede a continuar
				if ($err_arch === 0) { //Si no hay errores se procede a continuar
					if ($tam_arch < 10000000) { //El peso del archivo sera el limite de tamaño, en este caso son 10mb
						$ubicacion_arch = 'archivos_subidos/'.$nom_arch; //Declaramos la ruta a la que va a ir el archivo, a la carpeta de 'archivos_subidos'
						move_uploaded_file($tmp_arch, $ubicacion_arch); //Movemos el archivo de su ubicacion temporal a la ruta anteriormente definida con la función de php 'move_uploaded_file'
					} else {
						exit("El archivo es muy pesado, el maximo es 10mb"); //mensaje que aparece si el archivo es demasiado grande
					}
				} else {
					exit("Hubo un error al subir el archivo"); //mensaje que aparece si el archivo produjo errores
				}
			} else {
				exit("No se pueden enviar archivos con esa extension"); //mensaje que aparece si tiene una extensión no permitida
			}
		}

		if (!empty($parametros['nom_tarea']) and !empty($parametros['desc_tarea'])) { //verifica que no haya datos vacíos
			$this->model->crearTarea($parametros, $fecha, $nom_arch); //le pedimos al modelo que envie los datos de la tarea a la base de datos
			$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
			header('location: /mvc/tareas_enviar'); //nos manda a la misma página para simular una recarga de página y ver los datos nuevos
		} else {
			header('location: /mvc/tareas_enviar'); //nos recarga la página
		}
	}

	public function exec() //función que se encarga de obtener los datos para la vista y mostrarla
	{
		$query_cursos = $this->model->cursos(); //le pedimos al modelo información de los cursos
		$query_materias = $this->model->materias(); //le pedimos al modelo información de las materias
		$query_tareas = $this->model->tareas($this->session->get('idUser')); //le pedimos al modelo información de las tareas según la id del usuario

		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'tema' => $this->session->get('temavis'), 'id_user' => $this->session->get('idUser'), 'query_cursos' => $query_cursos, 'query_materias' => $query_materias, 'query_tareas' => $query_tareas); //asignamos los parametros que vamos a enviar a la vista
		$this->render(__CLASS__, $params); //función heredada que permite mostrar la vista y enviarle los datos que queramos, dentro de 'params'
		
		$this->model->close(); //le decimos al modelo que finalice la conexión con la base de datos por seguridad
	}
}

?>