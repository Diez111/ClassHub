<?php 

class iniciomodel extends model
{
	public function __construct()
	{
		parent::__construct();//Sirve para que me pomga automaticamente lo que este en el contruct de la clase padre
	}

	public function crearNoticia($parametros, $fecha, $nom_arch)
	{
		extract($parametros); //Descompone los datos de los parametros para analizarlos

		$sql = "INSERT INTO noticias(titulo, contenido, fecha_subido, nombre_archivo) VALUES('$titulo', '$contenido', '$fecha', '$nom_arch')"; //Inseto en la tabla noticias el titulo, contenido, archivo, etc con sus correspondientes valores

		$this->db->query($sql);//Mando estos datos a la llamada querry que lo solicite
	}

	public function noticias()
	{
		$sql = "SELECT * FROM noticias ORDER BY idnoticia DESC"; //Tomo todos los datos de la tabla noticias ordenado por el id de la noticia en orden desendente

		return $this->db->query($sql); //Mando estos datos a la consulta querry que lo pida
	}
}

?>