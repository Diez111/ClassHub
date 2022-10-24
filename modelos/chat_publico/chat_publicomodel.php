<?php 

class chat_publicomodel extends model
{
	
	public function __construct() //te pone automaticamente lo que este en el construct de la clase padre
	{
		parent::__construct();
	}

	public function mensajes($idcurso) //el id del mensaje se relaciona con el usuario al solicitarse 
	{
		$sql = "SELECT P.mensaje, U.nombre FROM chat_publico AS P INNER JOIN usuario AS U ON P.usuario_id = U.idusuario WHERE P.curso_id = '$idcurso' ORDER BY P.mensaje_id DESC"; //se muestran todos los mensajes del chat publico con el nombre del usuario emisor y en orden desendente

		return $this->db->query($sql);
	}

	public function enviar_mensaje($parametros)
	{
		extract($parametros);

		$sql = "INSERT INTO chat_publico(mensaje, usuario_id, curso_id) VALUES('$mensaje', '$usuario_id', '$curso_id')"; //al enviar el mensaje se relaciona con el nombre e id del usuario ademas del curso

		$this->db->query($sql);
	}

}

?>