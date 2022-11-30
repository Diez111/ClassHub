<?php 
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

/*
Clase principal o padre de todos los modelos
*/
class model
{
	protected $db; //se crea la variable protegida 'db'

	public function __construct() //función que se ejecuta al asignarle la clase a un objeto
	{
		$this->db = new mysqli('localhost', 'root', ''); //creo el objeto 'db' con la clase 'mysqli'(propia de php), para interactuar con las bases de datos y le paso como parámetros: el host, usuario y contraseña

		$sql = "CREATE DATABASE IF NOT EXISTS classhub"; //armo la consulta para crear la base de datos en caso de que no exista
		$this->db->query($sql);//realizo la consulta

		$this->db->select_db('classhub'); //selecciono la base de datos a utilizar

		$temp = $this->db->query("SELECT usuario FROM usuario WHERE idusuario = '1'"); //hago una consulta de prueba para ver si tiene al usuario 1, esto es para verificar que la base tenga algún dato, en caso de haber algún error, va a devolver falso

		if (!$temp) //si lo que contiene 'temp' es falso, creo el contenido de la base de datos y creo un usuario predeterminado, que va a servir para crear los cursos, materias y usuarios
		{
			$sql = "CREATE TABLE rol
				  	(idrol int NOT NULL AUTO_INCREMENT,
  				   	rol varchar(20) DEFAULT NULL,
  				   	PRIMARY KEY (idrol))"; //armo la consulta para crear la tabla 'rol'
  			$this->db->query($sql); //realizo la consulta en la base de datos

  			$sql = "CREATE TABLE materia
				 	(idmateria int NOT NULL AUTO_INCREMENT,
				 	materia varchar (30) DEFAULT NULL,
				  	PRIMARY KEY (idmateria))"; //armo la consulta para crear la tabla 'materia'
			$this->db->query($sql); //realizo la consulta en la base de datos


			$sql = "CREATE TABLE usuario
				 	(idusuario int NOT NULL AUTO_INCREMENT,
				  	nombre varchar(50) DEFAULT NULL,
				  	correo varchar(100) DEFAULT NULL,
				  	usuario varchar(50) DEFAULT NULL,
				  	clave varchar(100) DEFAULT NULL,
				  	rol int(5) DEFAULT NULL,
				  	estatus int(5) NOT NULL DEFAULT 1,
				  	intentos int(5) NOT NULL DEFAULT 5,
				  	cursos varchar(100) DEFAULT NULL,
				  	temavis int(5) NOT NULL DEFAULT 2,
				  	PRIMARY KEY (idusuario),
				  	FOREIGN KEY (rol) REFERENCES rol (idrol))"; //armo la consulta para crear la tabla 'usuario'
			$this->db->query($sql); //realizo la consulta en la base de datos


			$sql = "CREATE TABLE curso
				  	(idcurso int NOT NULL AUTO_INCREMENT,
				   	curso varchar (50) DEFAULT NULL,
				   	PRIMARY KEY(idcurso))"; //armo la consulta para crear la tabla 'curso'
			$this->db->query($sql); //realizo la consulta en la base de datos


			$sql = "CREATE TABLE chat_privado 
				 	(mensaje_id int NOT NULL AUTO_INCREMENT ,
				  	mensaje varchar(500) NOT NULL, 
				  	emisor_id int(5) NOT NULL, 
				  	receptor_id int (5) NOT NULL ,
				  	PRIMARY KEY (mensaje_id),
				  	FOREIGN KEY (emisor_id) REFERENCES usuario (idusuario),
				  	FOREIGN KEY (receptor_id) REFERENCES usuario (idusuario))"; //armo la consulta para crear la tabla 'chat_privado'
			$this->db->query($sql); //realizo la consulta en la base de datos

			$sql = "CREATE TABLE chat_publico
				 	(mensaje_id int NOT NULL AUTO_INCREMENT, 
				  	mensaje varchar (500) NOT NULL,
				  	usuario_id int (5) NOT NULL, 
				  	curso_id int (5) NOT NULL , 
				  	PRIMARY KEY(mensaje_id),
				  	FOREIGN KEY (usuario_id) REFERENCES usuario (idusuario),
				  	FOREIGN KEY (curso_id) REFERENCES curso (idcurso))"; //armo la consulta para crear la tabla 'chat_publico'
			$this->db->query($sql); //realizo la consulta en la base de datos

			$sql = "CREATE TABLE eventos
				 	(ideventos int NOT NULL AUTO_INCREMENT,
				  	titulo varchar (100) NOT NULL,
				  	contenido varchar (500) NOT NULL,
				  	idusuario int (5) NOT NULL,
				  	PRIMARY KEY(ideventos),
				  	FOREIGN KEY (idusuario) REFERENCES usuario (idusuario))"; //armo la consulta para crear la tabla 'eventos'
			$this->db->query($sql); //realizo la consulta en la base de datos

			$sql = "CREATE TABLE exam_test
				 	(test_id int NOT NULL AUTO_INCREMENT,
				  	idmateria int (5) NOT NULL,
				  	test_name varchar (50) NOT NULL,
				  	idcurso int (5) NOT NULL,
				  	PRIMARY KEY (test_id),
				  	FOREIGN KEY (idmateria) REFERENCES materia (idmateria),
				  	FOREIGN KEY (idcurso) REFERENCES curso (idcurso))"; //armo la consulta para crear la tabla 'exam_test'
			$this->db->query($sql); //realizo la consulta en la base de datos

			$sql = "CREATE TABLE exam_notas
				 	(nota_id int NOT NULL AUTO_INCREMENT,
				  	test_id int(5) NOT NULL,
				  	user_id int(5) NOT NULL,
				  	nota varchar(10) NOT NULL,
				  	materia_id int(5) NOT NULL,
				  	PRIMARY KEY(nota_id),
				  	FOREIGN KEY (test_id) REFERENCES exam_test (test_id),
				  	FOREIGN KEY (user_id) REFERENCES usuario (idusuario),
				  	FOREIGN KEY (materia_id) REFERENCES materia (idmateria))"; //armo la consulta para crear la tabla 'exam_notas'
			$this->db->query($sql); //realizo la consulta en la base de datos

			$sql = "CREATE TABLE exam_question
				 	(quest_id int NOT NULL AUTO_INCREMENT,
				  	test_id int (5) NOT NULL,
				  	quest_desc varchar (500) NOT NULL,
				  	ans1 varchar (500) NOT NULL,
				  	ans2 varchar (500) NOT NULL,
				  	ans3 varchar (500) NOT NULL,
                  	ans4 varchar (500) NOT NULL,
				  	res_correct int (5) NOT NULL,
				  	PRIMARY KEY(quest_id),
				  	FOREIGN KEY (test_id) REFERENCES exam_test (test_id))"; //armo la consulta para crear la tabla 'exam_question'
			$this->db->query($sql); //realizo la consulta en la base de datos

			$sql = "CREATE TABLE noticias
				 	(idnoticia int NOT NULL AUTO_INCREMENT,
  				  	titulo varchar(100) NOT NULL,
  				  	contenido varchar(800) NOT NULL,
  				  	fecha_subido datetime NOT NULL,
  				  	nombre_archivo varchar(100) DEFAULT NULL,
  				  	idusuario int (5) NOT NULL,
  				  	PRIMARY KEY (idnoticia),
  				  	FOREIGN KEY (idusuario) REFERENCES usuario (idusuario))"; //armo la consulta para crear la tabla 'noticias'
  			$this->db->query($sql); //realizo la consulta en la base de datos

  			$sql = "CREATE TABLE tarea 
  				 	(idtarea int NOT NULL AUTO_INCREMENT,
  				  	curso int(5) NOT NULL,
  				  	materia int(5) NOT NULL,
  				  	titulo varchar(100) DEFAULT NULL,
  				  	descripcion varchar(500) DEFAULT NULL,
  				  	fecha_creacion datetime NOT NULL,
  				  	nombre_archivo varchar(100) NOT NULL,
					idusuario int(5) NOT NULL,
  				  	PRIMARY KEY (idtarea),
  				  	FOREIGN KEY (idusuario) REFERENCES usuario (idusuario),
				  	FOREIGN KEY (curso) REFERENCES curso (idcurso),
				  	FOREIGN KEY (materia) REFERENCES materia (idmateria))"; //armo la consulta para crear la tabla 'tarea'
			$this->db->query($sql); //realizo la consulta en la base de datos

			$sql = "CREATE TABLE tarea_alumnos 
  				 	(idrespuesta int NOT NULL AUTO_INCREMENT,
  				 	idtarea int(5) NOT NULL,
  				  	curso int(5) NOT NULL,
  				  	materia int(5) NOT NULL,
  				  	fecha_enviado datetime NOT NULL,
  				  	nombre_archivo varchar(100) NOT NULL,
					idusuario int(5) NOT NULL,
					idcreador int(5) NOT NULL,
  				  	PRIMARY KEY (idrespuesta),
  				  	FOREIGN KEY (idusuario) REFERENCES usuario (idusuario),
  				  	FOREIGN KEY (idcreador) REFERENCES usuario (idusuario),
  				  	FOREIGN KEY (idtarea) REFERENCES tarea (idtarea),
				  	FOREIGN KEY (curso) REFERENCES curso (idcurso),
				  	FOREIGN KEY (materia) REFERENCES materia (idmateria))"; //armo la consulta para crear la tabla 'tarea_alumnos'
			$this->db->query($sql); //realizo la consulta en la base de datos

			$sql = "INSERT INTO rol (rol) VALUES ('Admin')"; //armo la consulta para ingresar valores en la tabla 'rol', y así crear el rol del administrador
                $this->db->query($sql); //realizo la consulta en la base de datos
        	$sql = "INSERT INTO rol (rol) VALUES ('Profesor')"; //armo la consulta para ingresar valores en la tabla 'rol', y así crear el rol del profesor
                $this->db->query($sql); //realizo la consulta en la base de datos
        	$sql = "INSERT INTO rol (rol) VALUES ('Alumno')"; //armo la consulta para ingresar valores en la tabla 'rol', y así crear el rol del alumno
                $this->db->query($sql); //realizo la consulta en la base de datos
            $contra = md5('Classhub12341');
        	$sql = "INSERT INTO usuario (usuario, clave, rol, correo, nombre) VALUES ('admin', '$contra', '1', 'ejemplo@gmail.com', 'Administrador')"; //armo la consulta para ingresar valores en la tabla 'usuario', y así crear el primer usuario, que se encarga de personalizar el sistema
                $this->db->query($sql); //realizo la consulta en la base de datos
		}
	}

	public function close() //función para cerrar la conexión con la base de datos
	{
		$this->db->close(); //uso la función 'close'(propia de la clase 'mysqli') para finalizar la conexión
	}
}
?>