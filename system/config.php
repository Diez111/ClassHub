<?php 
defined('BASEPATH') or exit('No se permite acceso directo'); //si la constante esta definida se ejecuta el resto del codigo, sino se detiene la ejecución y tira un mensaje

define('URI', $_SERVER['REQUEST_URI']); //define la constante para referirse a la URI

define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']); //define la constante para referirse al método de una petición(GET o POST)

define('CORE', 'system/core/'); //define la constante para referirse a la ruta de la carpeta 'core'

define('FOLDER_PATH', '/mvc'); //define la constante para referirse a la ruta de la carpeta 'mvc'

define('PATH_CONTROLLERS', 'controladores/'); //define la constante para referirse a la ruta de la carpeta 'controladores'

define('PATH_VIEWS', 'mvc/vistas/'); //define la constante para referirse a la ruta de la carpeta 'vistas'

define('ROOT', $_SERVER['DOCUMENT_ROOT']); //define la constante para referirse al directorio raíz de documentos del servidor(si fuera local sería 'localhost', si fuera en otro entorno, sería diferente)
?>