<?php 
defined('BASEPATH') or exit('No se permite acceso directo');//Si estas en un archivo raiz y queres entrar a esta pagina sin iniciar sesion te denegara la entrada
require_once ROOT . '/mvc/modelos/tareas_recibidas_profesor/tareas_recibidas_profesormodel.php';//Consulto los datos necesarios en el modelo
require_once ROOT . '/mvc/system/session.php'; //Consulto en que sesion estoy

class tareas_recibidas_profesorcontroller extends controller 
{
	private $model;	
	private $session;

	public function __construct()
	{
		$this->model = new tareas_recibidas_profesormodel(); //Señalo al objeto model para que me cree una nueva tabla en caso de quererlo
		$this->session = new session(); //Señalo la sesion para saber cual usuario soy
		$this->session->iniciar();	
		if (empty($this->session->get('pass'))) { //Verifico que la sesion se inicio de forma correcta y en caso de ser falso me manda al login
			header('location: /mvc/login');
		}

		if ($this->session->get('rol') == 3) { //Los usuarios con el rol 3 osea alumnos no pueden acceder a esta pagina
			header('location: /mvc/errorpage');
		}
	}

	public function salir() //Esta funcion cierra la sesion  y cierra la conexion con la bd por seguridad
	{
		$this->session->close(); 
		$this->model->close();
		header('location: /mvc/login');
	}

	public function exec() //Con exec consulto la barra de direcciones y le paso los datos como el id de mi sesion desde ahi
	{
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'id' => $this->session->get('idUser')); //Al arreglo pido la consulta del nombre de la sesiion y con que rol y id se usuario esta relacionado
		$this->render(__CLASS__, $params);

		?>

		<br><br><br><br><br><br>


	<div class="container">
        <table class="table">

 			 <thead>
                <tr>
                    <th style="color: black;">Curso</th>
                    <th style="color: black;">Titulo</th>
                    <th style="color: black;">Fecha de Creacion</th>
                    <th style="color: black;">Archivo</th>
                </tr>
            </thead>



	

		<?php
		$query = $this->model->tareas();

		if ($query->num_rows) { //Me rellena las columas con los datos de la bd hasta que esta que se inserten todos los datos que solicito
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
		$this->model->close(); //cuando se termina de crear la tabla se cierra a la conexion con la bd por seguridad
	}
}

?>