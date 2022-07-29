<?php 
defined('BASEPATH') or exit('No se permite acceso directo');

//Valores de la URI
define('URI', $_SERVER['REQUEST_URI']);

define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);

//Valores de CORE
define('CORE', 'system/core/');

//Valores de RUTAS
define('FOLDER_PATH', '/mvc');

define('PATH_CONTROLLERS', 'controladores/');

define('PATH_VIEWS', 'mvc/vistas/');

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
?>