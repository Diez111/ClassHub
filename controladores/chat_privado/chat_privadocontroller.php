<?php 
defined('BASEPATH') or exit('No se permite acceso directo'); //No se permite el acceso directo
require_once ROOT . '/mvc/modelos/chat_privado/chat_privadomodel.php';//Se conecta al modelo para la consulta de los datos a la bd
require_once ROOT . '/mvc/system/session.php'; //Me dice la sesion en la que estoy


class chat_privadocontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new chat_privadomodel(); //
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}
	}

	public function enviar_mensaje($parametros)
	{
		$this->model->enviar_mensaje($parametros);
		$this->model->close();
		$str = 'location: /mvc/chat_privado/exec/' . $parametros['receptor_id'];
		header($str);
	}

	public function exec($usuario_id){

		$params = array('nombre' => $this->session->get('nombre'), 'usuario_id' => $usuario_id);
		$this->render(__CLASS__, $params);

		$query = $this->model->mensajes($usuario_id, $this->session->get('idUser'));


		?>

		<div id="chat">
		<div id="header-chat">
			Chat Privado 
		</div>
		<div id="mensajes">
			<div class="mensaje-autor">
				<div class="contenido">
				<link rel="stylesheet" type="text/css" href="/mvc/vistas/includes/css/chat.css">
	<?php

		if ($query->num_rows) {
			while($datos = $query->fetch_assoc())
			{		
			?>
			<div>
			<p style="color: white;"><?= $datos['mensaje'] ?></p>
            </div>
            <div class="fecha"><p style="color: white;"><?= $datos['nombre'] ?></p></div>
			<?php
			}
		}

		?>

</div>
    </div>
</div>

<br>
		<form method="POST" action="<?= FOLDER_PATH . '/chat_privado/enviar_mensaje' ?>">
			<input type="hidden" name="emisor_id" value="<?= $this->session->get('idUser') ?>">
			<input type="hidden" name="receptor_id" value="<?= $usuario_id ?>">
			<center><textarea style="color:black;" name="mensaje" placeholder="Escribe un mensaje" rows="10" style="resize: none; width: 250px;"></textarea></center>
			<input type="submit" value="Enviar" class="btn_save">
		</form>
		
		<?php require "vistas/includes/footer.php"; ?>
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