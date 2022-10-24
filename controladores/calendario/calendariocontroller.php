<?php 
require_once ROOT . '/mvc/modelos/calendario/calendariomodel.php';  // verificará si el archivo ya ha sido incluido
require_once ROOT . '/mvc/system/session.php';  // verificará si el archivo ya ha sido incluido

class calendariocontroller extends controller //Clase calendariocontroller con la herencia controller
{
	private $session;//se pueda utilizar desde la misma clase que las define
	private $model; //se pueda utilizar desde la misma clase que las define

	public function __construct() //Este método se llama automáticamente cuando se crea un objeto
	{
		$this->model = new calendariomodel(); //es una propiedad de objeto y se puede acceder a ella mediante cualquier método de objeto (como las variables globales son visibles dentro de las funciones sin pasarlas como parámetro). $modeles solo una variable local pasada al método (aquí: constructor). Las variables de alcance de método/función se destruyen después de dejar la función, pero se conservan las propiedades. para clases anónimas a través de new class. Estos se pueden usar en lugar de definiciones de clase completas para objetos desechables

		$this->session = new session();

		$this->session->iniciar();	//Apunto al objeto sesion el cual verifica los datos de inicio
		if (empty($this->session->get('pass'))) { //verifica que la clave de la sesion sea correcta
			header('location: /mvc/login'); //en caso de no, te manda al login
		}

	}

	public function crear_evento($parametros) //Creo una funcion llamada crear_evento la cual contiene los parametros a mostrar en la vista
	{
		$this->model->crearevento($parametros); //le dice a la variable parametro que mande la solicitud de los datos a agregar a la bd
		$this->model->close(); //Al terminar de mandarse se cierra la conexion con la bd por seguridad
		header('location: /mvc/calendario'); //recarga la pagina Calendario
	}

	public function exec(){ //Es la funcion que se ejecuta despues de cargar una vista, su funcion es mostrar la parte de la vista que necesita un procesamiento de datos para ser mostrada
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol')); //Consulto los eventos que puede ver la sesion
		$this->render(__CLASS__, $params);  //Esa funcion hace que se cargue la vista que tenga el nombre de la clase, y le pasa los parametros ($params), datos que se utilizan solo en la vista. Osea Va a buscar la vista que se llame temas ya que estamos en temas controller
	?>
	<section id="lindo"> <!– Al recuadro le doy el identificador lindo –>
	<br><br><br><br> <!–Saltos de linea–>
	<?php
		if ($this->session->get('rol') ) { //Estoy diciendo que al objeto sesion obtengo el rol, pero como no tengo ninguna condicion todos pueden ver el codigo que sigue (con esto podemos decir que roles pueden ver partes de la pagina de una forma simple)
	?>

<center class="centrar" style="margin-left: 65px;">	<!– Centramos todo lo que este contenido con  un margen izquierdo de 65px –>
	<center>
		<section id="mon">  <!– Al recuadro le digo que tenga el identificador mon –>
		<div class="lindo" style="display: inline-block;"> <!– al contenedor le digo que todo lo que tenga en si use la clase lindo de css –>
			<form action="<?= FOLDER_PATH . '/calendario/crear_evento' ?>" method="post" style=" width: 300px;" enctype="multipart/form-data"> <!– Con Folder path decimos que es una constante para no poner /mvc –>
			<label for="titulo"><font size=5> Titulo</font></label> <!– El titulo del formulario –>
			<input style="color:red;" type="text" name="titulo" id="titulo" placeholder="Titulo" style="width: 300px;"> <!– definimos el titulo –>
			<br> <!–Salto de linea –>
			<label for="contenido"><font size=3>Fecha evento</font></label><!– EL contenido de la fecha del evento –>
			<textarea style="color:red;" name="contenido" id="contenido" placeholder="Contenido" rows="10" style="width: 300px; resize: none;"></textarea> <!– Aca se puede escribir el contenido con un recuadro, para escrobir el contenido que vamos a mandar sobre el evento que creamos anteriormente –>
			<br>
			<input type="submit" value="Crear eventos" class="btn_save"> <!– Boton de guardar con la clase de btn_save para el tema visual  –>
			</form>
		</div>

 	</section>
	</center>

			<?php
			}
			$query = $this->model->eventos(); //hago la consulta a la bd de todos los eventos

			if ($query->num_rows) { //Si la consulta devuelve datos, osea, si hay columnas, se ejecuta el while, que por cada ciclo va a avanzar por cada fila de los datos que se consultaron
				while ($datos = $query->fetch_assoc()) { //hago un ciclo infinito para que no pare hasta generar todas las columnas de los eventos
					?>
		<div class="container" style="margin-top: 30px;"> <!– estilo del container –>
		<br><br><!– Salto de linea –>
        <table class="table">  <!– estilo de la tabla –>
 			 <thead> <!– contiene una o mas filas de una tabla –>
                <tr> <!–  define una fila de celdas en una tabla –>
                    <th style="color: black;">titulo</th> <!–  define una celda como encabezado de un grupo de celdas en una tabla –>
                    <th style="color: black;">Fecha evento</th>
                </tr>
            </thead>
				

			<center> 

				<tr>
                    <td data-label="titulo"><?= $datos['titulo'] ?></td> ) <!– define la celda de una tabla que contiene datos–>
                    <td data-label="descripcion"><p><?= $datos['contenido'] ?></p></td> <!– define la celda de una tabla que contiene datos–>
                </tr>

			</center>

</center>
                                </div>
                                
                            
                            </div>
                        
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
	</div>
				<?php
			}

		}

		?>
	
</body>
</html>
	<?php
	$this->model->close(); //cierro conexion con el modelo
	}
	public function salir()
	{
		$this->session->close(); //cierro la sesion
		$this->model->close(); //cierro la conexion con el modelo
		header('location: /mvc/login'); //me manda al login
	}
}

?>