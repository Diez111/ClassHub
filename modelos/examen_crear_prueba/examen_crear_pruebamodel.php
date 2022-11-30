<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class examen_crear_pruebamodel extends model //Creamos una clase llamada "examen_crear_pruebamodel" con herencia "model"
{
    public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }

    public function materias() //función para devolver información de las materias
    {
        $sql = "SELECT * FROM materia"; //armo la consulta para sacar todo la información de la tabla 'materia'

        return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
    }

    public function cursos() //función para devolver información de los cursos
    {
        $sql = "SELECT * FROM curso"; //armo la consulta para sacar toda la información de la tabla 'curso'

        return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
    }

    public function agregarTest($parametros) //función para subir la información de una prueba
    {
        extract($parametros); //convierto los índices del array en variables independientes

        $sql = "INSERT INTO exam_test(idmateria, test_name, idcurso) VALUES ('$id_materia', '$nom_prueba', '$id_curso')"; //armo la consulta para ingresar datos a la tabla 'exam_test'

        $this->db->query($sql); //hago la consulta en la base de datos
    }
}
?>