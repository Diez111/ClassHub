<?php 
require_once ROOT . '/mvc/modelos/temas/temasmodel.php'; // verificará si el archivo ya ha sido incluido
require_once ROOT . '/mvc/system/session.php'; // verificará si el archivo ya ha sido incluido

 class temascontroller extends controller //clase temascontroller con la herencia controller
{
	private $model; 	//se pueda utilizar desde la misma clase que las define
	private $session;	//se pueda utilizar desde la misma clase que las define

	public function __construct() //Este método se llama automáticamente cuando se crea un objeto
	{
		$this->model = new temasmodel(); //es una propiedad de objeto y se puede acceder a ella mediante cualquier método de objeto (como las variables globales son visibles dentro de las funciones sin pasarlas como parámetro). $modeles solo una variable local pasada al método (aquí: constructor). Las variables de alcance de método/función se destruyen después de dejar la función, pero se conservan las propiedades. para clases anónimas a través de new class. Estos se pueden usar en lugar de definiciones de clase completas para objetos desechables

		$this->session = new session();

		$this->session->iniciar();                   //Apunto al objeto sesion el cual verifica los datos de inicio
		if (empty($this->session->get('pass'))) {	//Si los datos de la contraseña de la sesion son correctos se ejecuta el cidgo
			header('location: /mvc/login');			//Sino me manda al login
		}

	}
	
	public function exec(){	//Es la funcion que se ejecuta despues de cargar una vista, su funcion es mostrar la parte de la vista que necesita un procesamiento de datos para ser mostrada

		$params = array( 'temavis_u' => $this->session->get('temavis')); //creo una variable que contenga el arreglo de todos los temas de la sesion que a su ves apunta al tema que se usa en la sesion 
		$this->render(__CLASS__, $params); //Esa funcion hace que se cargue la vista que tenga el nombre de la clase, y le pasa los parametros ($params), datos que se utilizan solo en la vista. Osea Va a buscar la vista que se llame temas ya que estamos en temas controller
	}

	public function update($parametros){ //Esta funcion se encargara de actualizar el tema que estemos usando
		$this->model->Update($parametros, $this->session->get('idUser')); //Le pedimos al model que use los nuevos parametros para la id de nuestra sesion

		$this->model->close(); //Cerramos la conexion con el modelo 
		header('location: /mvc/temas'); //Decimos que nos mande a temas para simular una recarga
	}

	public function salir() //Para la funcion salir 
	{
		$this->session->close(); //Cerramos la sesion actual
		$this->model->close(); //Cerramos conexion con el modelo
		header('location: /mvc/login'); //Decimos que nos mande al login
	}

}

?>