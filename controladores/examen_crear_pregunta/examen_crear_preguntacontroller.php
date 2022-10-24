<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/examen_crear_pregunta/examen_crear_preguntamodel.php';
require_once ROOT . '/mvc/system/session.php';


 class examen_crear_preguntacontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new examen_crear_preguntamodel();
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}			
if ($this->session->get('rol') == 3) {
			header('location: /mvc/errorpage');
}
}	


	public function exec(){

		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'));
		$this->render(__CLASS__, $params);
			?>
			<label for="tema">Seleccionar Prueba:</label>
			<select name="nom_tema" id="tema" class="notItemOne">
			<option value="" selected>Seleccione una prueba</option>			
		<?php 
		$query = $this->model->consulta();

		If ($query->num_rows)
		{
			while ($datos = $query->fetch_assoc())
			{
			?>
			<option style="color:black;" value="<?= $datos['test_name']?>"><?= $datos['test_name']?></option>
			<?php
			}
		}
		?>
		</select>
		<label for="nom_pregunta"> Ingresar pregunta: </label>
		<input type="text" name="nom_pregunta" id="nom_pregunta" placeholder="Nombre de la pregunta">

		<label for="nom_respuesta1"> Ingresar respuesta 1: </label>
		<input type="text" name="nom_respuesta1" id="nom_respuesta1" placeholder="Nombre de la respuesta1">

		<label for="nom_respuesta2"> Ingresar respuesta 2: </label>
		<input type="text" name="nom_respuesta2" id="nom_respuesta2" placeholder="Nombre de la respuesta2">

		<label for="nom_respuesta3"> Ingresar respuesta 3: </label>
		<input type="text" name="nom_respuesta3" id="nom_respuesta3" placeholder="Nombre de la respuesta3">

		<label for="nom_respuesta4"> Ingresar respuesta 4: </label>
		<input type="text" name="nom_respuesta4" id="nom_respuesta4" placeholder="Nombre de la respuesta4">

		<label for="res_correct">La respuesta correcta es:</label>
		<input type="text" name="res_correct" id="res_correct" placeholder="Ejemplo: respuesta 5">
		<br><br>
		<input type="submit" value="Añadir Pregunta">
		</form>
	</div>
	</section>
	<?php require 'vistas/includes/footer.php'; ?>
</body>
</html>
<?php
	$this->model->close();
	}

	public function agregar_pregunta($parametros){
			$this->model->agregarPregunta($parametros);
			$this->model->close();
			header('location: /mvc/examen_crear_pregunta');
	}

	public function salir()
	{
		$this->session->close();
		$this->model->close();
		header('location: /mvc/login');
	}
}
?>