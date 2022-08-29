<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/chat_menu/chat_menumodel.php';
require_once ROOT . '/mvc/system/session.php';

class chat_menucontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new chat_menumodel();
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
		?>

	<section id="container">
	<br><br><br><br><br><br>
		<table>
			<tr class="tabla">
				<th>Chats Publicos</th>
			</tr>
			<?php
			$query = $this->model->chats_publicos($this->session->get('rol'), $this->session->get('cursos'));
			
			if ($query->num_rows) {
				while ($datos = $query->fetch_assoc()) {
			?>
			<tr>
				<td><a href="/mvc/chat_publico/exec/<?= $datos['idcurso'] ?>"><?= $datos['curso'] ?></a></td>
			</tr>
			<?php
				}
			}
			?>
			
		</table>

	<br><br><br>
		
		<table>
			<tr class="tabla">
				<th>Chats Privados</th>
			</tr>
			<tr class="tabla">
				<th>Administradores</th>
			</tr>
			<?php
			$query = $this->model->administradores($this->session->get('idUser'));

			if ($query->num_rows) {
				while ($datos = $query->fetch_assoc()) {
			?>
			<tr>
				<td><a href="/mvc/chat_privado/exec/<?= $datos['idusuario'] ?>"><?= $datos['nombre'] ?></a></td>
			</tr>
			<?php
				}
			}
			?>
			<tr class="tabla">
				<th>Profesores</th>
			</tr>
			<?php
			$query = $this->model->profesores($this->session->get('idUser'));

			if ($query->num_rows) {
				while ($datos = $query->fetch_assoc()) {
			?>
			<tr>
				<td><a href="/mvc/chat_privado/exec/<?= $datos['idusuario'] ?>"><?= $datos['nombre'] ?></a></td>
			</tr>
			<?php
				}
			}
			?>
			<tr class="tabla">
				<th>Alumnos</th>
			</tr>
			<?php
			$query = $this->model->alumnos($this->session->get('idUser'), $this->session->get('rol'), $this->session->get('curso'));

			if ($query->num_rows) {
				while ($datos = $query->fetch_assoc()) {
			?>
			<tr>
				<td><a href="/mvc/chat_privado/exec/<?= $datos['idusuario'] ?>"><?= $datos['nombre'] ?></a></td>
			</tr>
			<?php
				}
			}
			?>
		</table>
	<br><br><br><br><br><br>
	</section>
	<?php require "vistas/includes/footer.php"; ?>
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