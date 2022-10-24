<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/examen_ranking/examen_rankingmodel.php';
require_once ROOT . '/mvc/system/session.php';

class examen_rankingcontroller extends controller
{
	private $session;
	private $model;

	public function __construct()
	{
		$this->model = new examen_rankingmodel();
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}
		if ($this->session->get('rol') != 3) {
			header('location: /mvc/errorpage');
		}
	}

	public function exec(){
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'));
		$this->render(__CLASS__, $params);

		$query = $this->model->consulta($this->session->get('idUser'));

		if ($query->num_rows) {
			while ($datos = $query->fetch_assoc()) {
				?>
			<tr>
				<td><?= $datos['tema'] ?></td>
				<td><?= $datos['test_name']?></td>
				<td><?= $datos['nota'] . "/" . $datos['cant_quest'] ?></td>
			</tr>
				<?php
			}
		}

		?>

		</table>
	</section>
	<?php require 'vistas/includes/footer.php'; ?>
</body>
</html>
		<?php
		$this->model->close();
	}

	public function salir()
	{
		$this->session->close();
		$this->model->close();
		header('location: /mvc/login');
	}
}

?>