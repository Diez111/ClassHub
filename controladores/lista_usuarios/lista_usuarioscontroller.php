<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/lista_usuarios/lista_usuariosmodel.php';
require_once ROOT . '/mvc/system/session.php';

class lista_usuarioscontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new lista_usuariosmodel();
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}

		if ($this->session->get('rol') != 1) {
			header('location: /mvc/errorpage');
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
                <td><?php echo $datos['idusuario']; ?></td>
                <td><?php echo $datos['nombre']; ?></td>
                <td><?php echo $datos['correo']; ?></td>
                <td><?php echo $datos['usuario']; ?></td>
                <td><?php echo $datos['rol'] ?></td>
                <td><?php echo $datos['curso'] ?></td>
                <td>
                <a class="link_edit" href="editar_usuario/exec/<?= "{$datos['idusuario']}"; ?>">Editar</a>

                <a class="link_delete" href="eliminar_usuario/<?= "{$datos['idusuario']}"; ?>">Eliminar</a>
                </td>
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
		header('location: /mvc/login');
	}
}

?>