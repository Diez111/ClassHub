<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/examen_responder/examen_respondermodel.php';
require_once ROOT . '/mvc/system/session.php';

class examen_respondercontroller extends controller
{
	private $session;
	private $model;
	
	public function __construct()
	{
		$this->model = new examen_respondermodel();
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}

		if ($this->session->get('rol') != 3) {
			header('location: /mvc/errorpage');
		}
	}

	public function corregir($parametros)
	{
		$this->model->insertarRespuestas($parametros);
		$this->model->corregirPrueba($parametros);
		$this->model->close();
		header('location: /mvc/examen_menu_alumnos');
	}

	public function exec($idprueba){
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'), 'id' => $this->session->get('idUser'), 'idprueba' => $idprueba);
		$this->render(__CLASS__, $params);

		$query = $this->model->datosPrueba($idprueba);
		$n = 1;
		if ($query->num_rows) {
			while ($datos = $query->fetch_assoc()) {
				?>

				<h2>Pregunta: <?= $datos['quest_desc'] ?></h2>


<br/>
<label class="pure-material-radio">
   <input style="width: 10px; margin: 10px 10px;" type="radio" id="opcion1" name="<?= "opcion".$n ?>" value="1">
	<span><label for="opcion1" style="margin: 10px 10px;"><?= $datos['ans1'] ?></label></span>
</label>
<br/>
<br/>
<label class="pure-material-radio">
	<input style="width: 10px; margin: 10px 10px;" type="radio" id="opcion2" name="<?= "opcion".$n ?>" value="2">
	<span><label for="opcion2" style="margin: 10px 10px;"><?= $datos['ans2'] ?></label></span>
</label>
<br/>
<br/>
<label class="pure-material-radio">
	<input style="width: 10px; margin: 10px 10px;" type="radio" id="opcion3" name="<?= "opcion".$n ?>" value="3">
	<span><label for="opcion3" style="margin: 10px 10px;"><?= $datos['ans3'] ?></label></span>

</label>
<br/>
<br/>

<label class="pure-material-radio">
     <input style="width: 10px; margin: 10px 10px;" type="radio" id="opcion4" name="<?= "opcion".$n ?>" value="4">
	<span>	<label for="opcion4" style="margin: 10px 10px;"><?= $datos['ans4'] ?></label></span>
</label>
<br/>
<br/>
	
				<?php
				$n++;
			}
			?>
			<input type="submit" class="btn_save" value="Ingresar respuestas">
			<?php
		}
	?>
	</form>
	<?php require 'vistas/includes/footer.php'; ?>
</body>
</html>
	<?php
	}

	public function salir()
	{
		$this->session->close();
		$this->model->close();
		header('location: /mvc/login');
	}
}

?>