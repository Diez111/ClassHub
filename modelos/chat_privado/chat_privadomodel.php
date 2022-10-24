<?php 

class chat_privadomodel extends model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function mensajes($usuario_id1, $usuario_id2)
	{

		$sql = "SELECT C.mensaje, U.nombre FROM chat_privado AS C INNER JOIN usuario AS U ON C.emisor_id = U.idusuario WHERE (C.emisor_id = '{$usuario_id1}' AND C.receptor_id = '{$usuario_id2}') OR (C.emisor_id = '{$usuario_id2}' AND C.receptor_id = '{$usuario_id1}')ORDER BY C.mensaje_id ASC";

		return $this->db->query($sql);
	}

	public function enviar_mensaje($parametros)
	{
		extract($parametros);

		$sql = "INSERT INTO chat_privado(mensaje, emisor_id, receptor_id) VALUES('$mensaje', '$emisor_id', '$receptor_id')";

		$this->db->query($sql);
	}

}

?>