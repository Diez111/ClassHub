<?php 

class eliminar_usuariomodel extends model
{
	 
	public function __construct()//te pone automaticamente lo que este en el construct de la clase padre
	{
		parent::__construct();
	}

	public function consulta($id) //De los datos del usuario de la sesion veo
	{
		$sql = "SELECT U.idusuario, U.nombre, U.usuario, R.rol FROM `usuario` AS U\n" //Todos los datos en forma ordenada y como strings

    	. "INNER JOIN rol AS R ON U.rol = R.idrol\n"

    	. "WHERE U.idusuario = '$id'";

    	return $this->db->query($sql); //Al objeto db hago la consulta de que existen esos datos
	}

	public function Eliminar_usuario($parametros)
	{
		extract($parametros);

		$sql = "DELETE FROM `usuario` WHERE idusuario = '$idusuario'"; //Se borra de la tabla usuarios el id del id del usuario y de esa forma no podra volver a iniciar con ese usuario ademas de que los mensajes que dejo ese usuario no corromperan el chat, ni nignuna parte de la pagina que necesite de ese dato

		$this->db->query($sql);
	}
}

?>