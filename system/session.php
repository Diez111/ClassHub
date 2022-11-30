<?php
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

/*
Clase para administrar sesiones
*/
class session
{
  public function iniciar() //función que inicia la sesión
  {
    session_start(); //la función de php para iniciar la sesión
  }

  public function add($key, $valor) //función para agregar un elemento a la variable global $_SESSION, se le pasa una 'key'(o índice) y el valor
  {
    $_SESSION[$key] = $valor; //se le asigna un valor a esa 'key'(o índice) de $_SESSION
  }

  public function get($key) //función para obtener un valor de la sesión, se le pasa una 'key'(o índice)
  {
    return !empty($_SESSION[$key]) ? $_SESSION[$key] : null; //retorna el valor de esa 'key'(o índice) si es que existe, sino retorna nulo
  }

  public function getAll()
  {
    return $_SESSION;
  }

  public function close() //función que cierra la sesión
  {
    session_unset(); //función de php que vacia la variable $_SESSION
    session_destroy(); //función de php que elimina la variable $_SESSION
  }
}