<?php 
defined('BASEPATH') or exit('No se permite acceso directo'); //No se permite el acceso directo
require_once ROOT . '/mvc/modelos/chat_publico/chat_publicomodel.php';//Pide al modelo del chat los datos necesarios
require_once ROOT . '/mvc/system/session.php'; //Pide la sesion del usuario actual

class chat_publicocontroller extends controller
{
	private $model;
	private $session;

	public function __construct()
	{
		$this->model = new chat_publicomodel(); 
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}
	}

	public function enviar_mensaje($parametros) //cuando se apreta el boton enviar mensaje se carga en la bd 
	{
		$this->model->enviar_mensaje($parametros); //se consulta al modelo sobre los parametros solicitados (mensaje y curso)
		$this->model->close();
		$str = 'location: /mvc/chat_publico/exec/' . $parametros['curso_id'];//Se verifica desde que sesion de curso se envio el mensaje
		header($str);
	}

	public function exec($curso)
	{
		$params = array('nombre' => $this->session->get('nombre')); //verifico el nombre de la sesion del mensaje
		$this->render(__CLASS__, $params); //muestro el mensaje en la vista

		$query = $this->model->mensajes($curso); //mando la consulta para ver el resto de mensajes en el caso de existir
?>

	<div id="chat">
    <div id="header-chat">
        Chat publico
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

			<?php //muestra el nombre y el mensaje
			}
		}

		?>
        </div>
    </div>
</div>

<br>
<form method="POST" action="<?= FOLDER_PATH . '/chat_publico/enviar_mensaje' ?>">
					<input type="hidden" name="usuario_id" value="<?= $this->session->get('idUser') ?>">
			<input type="hidden" name="curso_id" value="<?= $curso ?>">
			<center><textarea style="color:black;" name="mensaje" placeholder="Escribe un mensaje" rows="5"></textarea></center>
			<input type="submit" value="Enviar" class="btn_save">
		
		<?php require "vistas/includes/footer.php"; ?>
		<?php
		
		$this->model->close();
	}

	public function salir()
	{
		$this->session->close(); //cerrar sesion
		$this->model->close(); //cerrar conexion con la bd
		header('location: /mvc/login'); //me manda al login
	}
}

?>