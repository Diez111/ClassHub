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
                    <td data-label="Nombre"><?php echo $datos['nombre']; ?></td>
                    <td data-label="Usuario"><?php echo $datos['usuario']; ?></td>
                    <td data-label="Email"><?php echo $datos['correo'] ?></td>
                    <td data-label="Rol"><?php echo $datos['rol'] ?></td>
                    <td data-label="Acciones">
                    	    	 
                <a class="link_edit" href="/mvc/editar_usuario/exec/<?= "{$datos['idusuario']}" ?>">Editar</a>

                <a class="link_delete" href="/mvc/eliminar_usuario/exec/<?= "{$datos['idusuario']}" ?>">Eliminar</a>
                </td>
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