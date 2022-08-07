<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php require 'vistas/includes/scripts.php'; ?>
	<title>Examen</title>
</head>
<body>
	<?php require 'vistas/includes/header.php'; ?>
	<?php require 'vistas/includes/nav.php'; ?>
	<br><br><br><br><br><br>
	<form method="post" action="/mvc/examen_responder/corregir">
		<input type="hidden" name="idusuario" value="<?= $id ?>">
		<input type="hidden" name="idprueba" value="<?= $idprueba ?>">