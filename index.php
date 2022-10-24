<?php 
define('BASEPATH', true);

require 'system/config.php';
require 'system/core/router.php';
require 'system/core/controller.php';
require 'system/core/model.php';
require 'system/core/view.php';
require 'system/corehelper.php';

$router = new router();

$controlador = $router->getController();
$metodo = $router->getMethod();
$parametro = $router->getParam();

if (!corehelper::validarControlador($controlador)) {
	$controlador = 'errorpage';
}

require PATH_CONTROLLERS . "{$controlador}/{$controlador}controller.php";

$controlador .= 'controller';

if (!corehelper::validarMetodo($controlador, $metodo)) {
	$metodo = 'exec';
}

$controller = new $controlador();
$controller->$metodo($parametro);
?>