<?php 

class iniciomodel extends model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function crearNoticia($parametros, $fecha, $nom_arch)
	{
		extract($parametros);

		$sql = "INSERT INTO noticias(titulo, contenido, fecha_subido, nombre_archivo) VALUES('$titulo', '$contenido', '$fecha', '$nom_arch')";

		$this->db->query($sql);
	}

	public function noticias()
	{
		$sql = "SELECT * FROM noticias ORDER BY idnoticia DESC";

		return $this->db->query($sql);
	}
}

?>