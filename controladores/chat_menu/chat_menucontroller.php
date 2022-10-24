<?php 
require_once ROOT . '/mvc/modelos/chat_menu/chat_menumodel.php'; // verificará si el archivo ya ha sido incluido
require_once ROOT . '/mvc/system/session.php'; // verificará si el archivo ya ha sido incluido
 
class chat_menucontroller extends controller  //clase chat_menucontroller con la herencia controller
{
	private $model; 	//se pueda utilizar desde la misma clase que las define
	private $session; 	//se pueda utilizar desde la misma clase que las define
 
	public function __construct() //Este método se llama automáticamente cuando se crea un objeto
	{
		$this->model = new chat_menumodel(); //es una propiedad de objeto y se puede acceder a ella mediante cualquier método de objeto (como las variables globales son visibles dentro de las funciones sin pasarlas como parámetro). $modeles solo una variable local pasada al método (aquí: constructor). Las variables de alcance de método/función se destruyen después de dejar la función, pero se conservan las propiedades. para clases anónimas a través de new class. Estos se pueden usar en lugar de definiciones de clase completas para objetos desechables
		$this->session = new session();
		$this->session->iniciar();   //Apunto al objeto sesion el cual verifica los datos de inicio
		if (empty($this->session->get('pass'))) { //Si los datos de la contraseña de la sesion son correctos se ejecuta el codigo
			header('location: /mvc/login'); //Sino me manda al login
		}
	}

	public function exec()//Es la funcion que se ejecuta despues de cargar una vista, su funcion es mostrar la parte de la vista que necesita un procesamiento de datos para ser mostrada
	{
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'));  //creo una variable que contenga el arreglo de todos los temas de la sesion que a su ves apunta al tema que se usa en la sesion 
		$this->render(__CLASS__, $params); //Esa funcion hace que se cargue la vista que tenga el nombre de la clase, y le pasa los parametros ($params), datos que se utilizan solo en la vista. Osea Va a buscar la vista que se llame temas ya que estamos en temas controller
		?>

	<section id="container"> <!– Al recuadro le doy el identificador de "lindo" –>
	
		<div class="container"> <!– Todo lo que contiene el div tiene la clase container de css –>
        <table class="table"><!– la tabla tiene el estilo table –>

 			 <thead> 
                <tr> 
                    <th style="color: black;">Chats publicos</th> 
                </tr>
            </thead>
		 </div>
			<?php
			$query = $this->model->chats_publicos($this->session->get('rol'), $this->session->get('cursos')); //A querry le paso el dato del objeto model que a su ves apunte a chats publicos que tiene la informacion de los roles y cursos que tiene disponibles el usuario

			if ($query->num_rows) {//Si la consulta devuelve datos, osea, si hay columnas, se ejecuta el while, que por cada ciclo va a avanzar por cada fila de los datos que se consultaron
				while ($datos = $query->fetch_assoc()) {   //hago un ciclo infinito para que no pare hasta generar todas las columnas 
			?>
			<tr>
				<td data-label="Chats publicos"><a style="color: red;" href="/mvc/chat_publico/exec/<?= $datos['idcurso'] ?>"><?= $datos['curso'] ?></a></td>  <!– Se generan las columnas de los chats publicos disponibles –>
			</tr>
			<?php
				}
			}
			?>
	</table>
	<br><br><br>
	<section id="container">
		<div class="container">
        <table class="table">

 			 <thead> 
                <tr> 
                     <th style="color: black;">Chats Administradores/Privado</th>
                </tr>

            </thead>
		 </div>
			<?php
			$query = $this->model->administradores($this->session->get('idUser'));
			if ($query->num_rows) {
				while ($datos = $query->fetch_assoc()) {
			?>
			<tr>
				<td data-label="Administradores"><a style="color: red; " href="/mvc/chat_privado/exec/<?= $datos['idusuario'] ?>"><?= $datos['nombre'] ?></a></td>
			</tr>
			<?php
				}
			}
			?>
			<section id="container">
	
		<div class="container">
        <table class="table">
 			 <thead> 
                <tr> 
                     <th style="color: black;">Chats Profesores/Privado</th>
                </tr>
            </thead>
		 </div>
			<?php
			
$query = $this->model->profesores($this->session->get('idUser'), $this->session->get('rol'), $this->session->get('cursos'));
			if ($query->num_rows) {
				while ($datos = $query->fetch_assoc()) {
			?>
 			<tr>
                 <td data-label="Profesores"><a style="color: red; text-align: center;" href="/mvc/chat_privado/exec/<?= $datos['idusuario'] ?>"><?= $datos['nombre'] ?></a></td>  
                </tr>
			<?php
				}
			}
			?>
			<section id="container">
	
		<div class="container">
        <table class="table">

 			 <thead> 
                <tr> 
                     <th style="color: black;">Chats Alumnos/Privado</th>
                </tr>

            </thead>
		 </div>
			<?php
			$query = $this->model->alumnos($this->session->get('idUser'), $this->session->get('rol'), $this->session->get('cursos'));

			if ($query->num_rows) {
				while ($datos = $query->fetch_assoc()) {
			?>
<tr class="chatmenu">
				<td data-label="Alumnos"><a style="color: red; text-align: center;" href="/mvc/chat_privado/exec/<?= $datos['idusuario'] ?>"><?= $datos['nombre'] ?></a></td>
			</tr>
			<?php
				}
			}
			?>
		</table>
	<br><br><br><br><br><br>
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