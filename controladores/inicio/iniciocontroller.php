<?php 
defined('BASEPATH') or exit('No se permite acceso directo');
require_once ROOT . '/mvc/modelos/inicio/iniciomodel.php';
require_once ROOT . '/mvc/system/session.php';

class iniciocontroller extends controller
{
	private $session;
	private $model;

	public function __construct()
	{
		$this->model = new iniciomodel();
		$this->session = new session();
		$this->session->iniciar();
		if (empty($this->session->get('pass'))) {
			header('location: /mvc/login');
		}
	}

	public function crear_noticia($parametros)
	{
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$fecha = date('Y-m-d H:i:s');

		if (isset($_FILES) && $_FILES['archivo']['name'] != '') {

			$archivo = $_FILES['archivo'];

			$nom_arch = $archivo['name'];
			$tipo_arch = $archivo['type'];
			$tmp_arch = $archivo['tmp_name'];
			$err_arch = $archivo['error'];
			$tam_arch = $archivo['size'];

			$ext_arch = explode('.', $nom_arch);
			$ext_arch2 = strtolower(end($ext_arch));

			$ext_permitidas = array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'rar', 'zip');

			if (in_array($ext_arch2, $ext_permitidas)) {
				if ($err_arch === 0) {
					if ($tam_arch < 10000000) {
						//$nuevo_nom_arch = uniqid('', true).".".$ext_arch2;
						//$ubicacion_arch = 'archivos_subidos/'.$nuevo_nom_arch;
						$ubicacion_arch = 'archivos_subidos/'.$nom_arch;
						move_uploaded_file($tmp_arch, $ubicacion_arch);
					} else {
						exit("El archivo es muy pesado, el maximo es 10mb");
					}
				} else {
					exit("Hubo un error al subir el archivo");
				}
			} else {
				exit("No se pueden enviar archivos con esa extension");
			}
		}

		$this->model->crearNoticia($parametros, $fecha, $nom_arch);
		$this->model->close();
		header('location: /mvc/inicio');
	}

	public function exec(){
		$params = array('nombre' => $this->session->get('nombre'), 'rol' => $this->session->get('rol'));
		$this->render(__CLASS__, $params);
	?>
	<section id="container">
	<br><br><br><br>
	<?php
		if ($this->session->get('rol') != 3) {
	?>


<center>

	<div class="form_register">
		<form action="<?= FOLDER_PATH . '/inicio/crear_noticia' ?>" method="post" style="width: 600px;" enctype="multipart/form-data">
			<label for="titulo"><font size=5> Titulo</font></label>
			<input type="text" name="titulo" id="titulo" placeholder="Titulo" style="width: 550px;">
			<br>
			<label for="contenido"><font size=4> Contenido</font></label>
			<textarea name="contenido" id="contenido" placeholder="Contenido" rows="10" style="width: 550px; resize: none;"></textarea>
			<br>
			<center><label for="archivo"><font size=4> Archivo</font></label></center>
			<center><input type="file" name="archivo" id="archivo" style="width: 550px;"></center>

			<input type="submit" value="Crear Noticia" class="btn_save">
		</form>
	</div>

</center>


	<br>	<br>	<br>
		<?php
		}
		$query = $this->model->noticias();





		if ($query->num_rows) {
			while ($datos = $query->fetch_assoc()) {
				?>
			<article>
				



<div class="container">
    <div class="row mb-5">
  
    </div>
    

    
    <!--start code-->
	<div class="container">
	    <div class="col-12 py-4 bg-dark">
    	    <div class="row">
                <!--Breaking box-->
                <div class="col-md-3 col-lg-2 pr-md-0">
                    <div class="p-2 bg-primary text-white text-center breaking-caret"><span class="font-weight-bold"><p><?= $datos['titulo'] ?></p></span></div>
                </div>
                <!--end breaking box-->
                <!--Breaking content-->
                <div class="col-md-9 col-lg-10 pl-md-4 py-2">
                    <div class="breaking-box">
                        <div id="carouselbreaking" class="carousel slide" data-ride="carousel">
                            <!--breaking news-->
                            <div class="carousel-inner">
                                <!--post-->
                                <div >
                                    <a ><span class="position-relative mx-2 badge badge-primary rounded-0"><p><?= $datos['fecha_subido'] ?></p></span></a> <a class="text-white" ><p><?= $datos['contenido'] ?></p></p></span></a> <a class="text-white" >

                                   <p>


			<?php
				if ($datos['nombre_archivo'] != '') {
				?>
				<a href="archivos_subidos/<?= $datos['nombre_archivo'] ?>" download><?= $datos['nombre_archivo'] ?></a>
				<?php
				}
				


			  ?>



                                </div>
                                
                            
                            </div>
                        
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
	</div>








				
			</article>
				<?php
			}
		}

		?>
	</section>












	<?php require 'vistas/includes/footer.php'; ?>
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