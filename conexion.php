<?php

	$host = 'localhost';  /*Tipo de conexion*/
	$user = 'root';				/*Usuario de la base de datos*/
	$password = '';				/*Contraseña de la base de datos*/
	$db = 'classhub';			/*Nombre de la base de datos*/

	$conection = @mysqli_connect($host,$user,$password,$db);		/*Conexion con la base de datos*/

	if(!$conection){
		echo "Error en la conexión";			/*Si no se conecta muestra ese mensaje*/
	}

?>
