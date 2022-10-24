<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/examen_menu_pruebas/examen_menu_pruebasmodel.php';
require_once ROOT . '/mvc/system/session.php';

class examen_menu_pruebascontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new examen_menu_pruebas();
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}

	}

	public function exec($idtema)
	{
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'));
		$this->render(__CLASS__, $params);

		$query = $this->model->consulta($idtema);
		
		if ($query->num_rows) {
			while ($datos = $query->fetch_assoc()) {
		?>




	<tr>
                    <td data-label="test_name"><?= $datos['test_name'] ?></td>
                    <td data-label="total_que"><?= $datos['total_que'] ?></td>
                      <td data-label="Hacer"><a href="/mvc/examen_responder/exec/<?= $datos['test_id'] ?>">Hacer Prueba</a></td>
                   

                   
                </tr>


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
		$this->model->close();
		header('location: /mvc/login');
	}
}

?>