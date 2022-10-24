<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/examen_crear_prueba/examen_crear_pruebamodel.php';
require_once ROOT . '/mvc/system/session.php';


 class examen_crear_pruebacontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new examen_crear_pruebamodel();
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');

if ($this->session->get('rol') != 1) {
			header('location: /mvc/errorpage');
}
}
	}
	public function exec(){

		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'));
		$this->render(__CLASS__, $params);
			?>
			<label for="tema">Seleccionar Tema:</label>
			<select name="nom_tema" id="tema" class="notItemOne">
			<option value="" selected>Seleccione un tema</option>
		<?php 
		$query = $this->model->consulta();

		If ($query->num_rows)
		{
			while ($datos = $query->fetch_assoc())
			{
			?>
			<option style="color:black;"  value="<?= $datos['tema']?>"><?= $datos['tema']?></option>
			<?php
			}
		}
		?>
		</select>
		<label for="nom_prueba">Ingrese el nombre de la prueba:</label>
		
		<input type="text" name="nom_prueba" id="nom_prueba" placeholder="Nombre de la prueba">
		<label for="cant_quest">Ingrese la cantidad de preguntas:</label>
		<input type="text" name="cant_quest" id="cant_quest" placeholder="Ejemplo: 5">
		<br><br>
		<input type="submit" value="Crear Prueba">
		</form>
	</div>
	</section>
	<?php require 'vistas/includes/footer.php'; ?>
</body>
</html>
<?php
	$this->model->close();
	}

	public function agregar_prueba($parametros){
			$this->model->agregarTest($parametros);
			$this->model->close();
			header('location: /mvc/examen_menu_admin');
	}

	public function salir()
	{
		$this->session->close();
		$this->model->close();
		header('location: /mvc/login');
	}
}
?>