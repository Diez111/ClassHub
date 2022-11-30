<?php 
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

/*
Clase que muestra las vistas
*/
class view
{
	protected $template; //se crea la variable protegida 'template'
	protected $nombre_controlador; //se crea la variable protegida 'controller_name'
	protected $params; //se crea la variable protegida 'params'

	public function __construct($nombre_controlador, $params) //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->nombre_controlador = $nombre_controlador; //le asigno a 'nombre_controlador' lo que recibe por parametro como 'nombre_controlador' del objeto 'view' dentro de la clase 'controller'
		$this->params = $params; //le asigno a 'params' lo que recibe por parametro como 'params'
		$this->render(); //ejecuto la función render de esta clase
	}

	protected function render() //función que muestra el contenido del archivo de la vista correspondiente
	{
		if (class_exists($this->nombre_controlador)) //si la clase del controlador existe, se muestra la vista
		{
			$file_name = str_replace('controller', '', $this->nombre_controlador); //creo la variable 'file_name' que es la que va a tener el nombre de la vista, con la función str_replace(propia de php), le quito el 'controller' del nombre del controlador
			$this->template = $this->getContentTemplate($file_name); //a la variable 'template' se le pasa el contenido de la función 'getContentTemplate', al que le paso la variable 'file_name' como parametro
			echo $this->template; //muestra todo el contenido de 'template'
		}
	}

	protected function getContentTemplate($file_name) //función que retorna el contenido dentro de un archivo, recibe el nombre de un archivo
	{
		$file_path = ROOT . '/' . PATH_VIEWS . "{$file_name}/{$file_name}.php"; //creo la variable 'file_path', que va a tener la ruta del archivo de la vista que necesitemos
		if (is_file($file_path)) { //si existe el archivo de esa ruta sucede lo siguiente
			extract($this->params); //extraigo el contenido del array 'params', la función extract(propia de php) extrae los valores de un array y los convierte en variables, los nombres de esas variables son los índices o "keys" del array
			ob_start(); //activo el buffer de php, esto sirve para que me "cargue en segundo plano" el contenido de la vista y evitar que me lo muestre proceduralmente
			require($file_path); //llamo al archivo de la vista de la ruta que tiene 'file_path'
			$template = ob_get_contents(); //cargo el contenido del archivo con 'ob_get_contents'(función del buffer propia de php) y se lo doy a 'template'
			ob_end_clean(); //limpio el contenido del buffer y lo desactivo
			return $template; //retorno el contenido de 'template'
		}
	}
}

?>