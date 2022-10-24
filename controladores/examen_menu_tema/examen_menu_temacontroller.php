<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/examen_menu_tema/examen_menu_temamodel.php';
require_once ROOT . '/mvc/system/session.php';

class examen_menu_temacontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new examen_menu_temamodel();
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}

	}

	public function exec()
	{
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'));
		$this->render(__CLASS__, $params);

		$query = $this->model->consulta();
		
		if ($query->num_rows) {
			while ($datos = $query->fetch_assoc()) {
		?>

		<tr>
                    <td data-label="id tema"><?php echo $datos['idtema']; ?></td>
                    <td data-label="tema"><a class="#" href="/mvc/examen_menu_pruebas/exec/<?= $datos['idtema']?> " > <?php echo $datos['tema'] ?></a></td>

                    
		<?php 
			} 
		}
		?>

			</table>
		</section>
	<?php require "vistas/includes/footer.php"; ?>
</body>
</html>
	<?php
	}

	public function salir()
	{
		$this->session->close();
		header('location: /mvc/login');
	}
}

?>