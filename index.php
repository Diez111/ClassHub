<?php 
define('BASEPATH', true); //define esta constante para que no se puedan hacer accesos directos de los archivos

require 'system/config.php'; //llama al archivo con las constantes
require 'system/core/router.php'; //llama al archivo de la clase router, que divide en partes la URL
require 'system/core/controller.php'; //llama al archivo de la clase padre de los controladores
require 'system/core/model.php'; //llama al archivo de la clase padre de los modelos
require 'system/core/view.php'; //llama al archivo de la clase de las vistas
require 'system/corehelper.php'; //llama al archivo que verifica si un controlador o un método existen

$router = new router(); //creo al objeto 'router' con la clase 'router' para acceder a las funciones de esa clase
$corehelper = new corehelper(); //creo al objeto 'corehelper' con la clase 'corehelper' para acceder a las funciones de esa clase

$controlador = $router->getController(); //asigno un controlador
$metodo = $router->getMethod(); //asigno un método del controlador
$parametro = $router->getParam(); //asigno el parametro(opcional)

if (!$corehelper->validarControlador($controlador)) { //determina si existe el controlador
	$controlador = 'errorpage'; //si no existe, se asigna el controlador de error
}

require PATH_CONTROLLERS . "{$controlador}/{$controlador}controller.php"; //si existe, se llama al archivo de ese controlador

$controlador .= 'controller'; //se le agrega la palabra 'controller' al controlador asignado para poder identificarlo y realizar el metodo pedido

if (!$corehelper->validarMetodo($controlador, $metodo)) { //determina si existe el método(función) de ese controlador
	$metodo = 'exec'; //si no existe, se ejecuta el método 'exec' como default, el cual lo tienen todos los controladores, que sirve solo para mostrar la vista
}

$controller = new $controlador(); //si existe, se crea al objeto controller, al que se le asigna la clase del controlador anteriormente definido
$controller->$metodo($parametro); //ejecutamos el método pedido, y si tiene algún parametro, se lo envía a ese método
?>