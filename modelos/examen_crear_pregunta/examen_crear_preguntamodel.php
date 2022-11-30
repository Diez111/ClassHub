<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

class examen_crear_preguntamodel extends model //Creamos una clase llamada "examen_crear_preguntamodel" con herencia "model"
{
    public function __construct() //función que se ejecuta al asignarle la clase a un objeto
    {
        parent::__construct(); //hereda o "copia" lo que está en el '__construct' de la clase padre, es decir, la clase 'model'
    }
    
    public function pruebas() //función que devuelve la información de las prubas en la base de datos
    {
        $sql = "SELECT test_name, test_id FROM `exam_test`"; //armo la consulta para sacar información de la tabla 'exam_test'

        return $this->db->query($sql); //hace la consulta en la base de datos y retorna la información al controlador
    }
    public function agregarPregunta($parametros) //función que carga los datos de una pregunta a la base
    {
        extract($parametros); //convierto los índices del array en variables independientes

        $sql = "INSERT INTO exam_question(test_id, quest_desc, ans1, ans2, ans3, ans4, res_correct) VALUES('$id_prueba', '$nom_pregunta', '$nom_respuesta1', '$nom_respuesta2', '$nom_respuesta3', '$nom_respuesta4', '$res_correct')"; //armo la consulta para ingresar datos a la tabla 'exam_question'
         
        $this->db->query($sql); //hago la consulta en la base de datos
    }
}
?>