<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php require 'vistas/includes/scripts.php'; ?>
	<title>Enviar Tarea</title>
</head>
<body>
	<?php require 'vistas/includes/header.php'; ?>
	<?php require 'vistas/includes/nav.php' ?>

	<section id="container">

	<br><br><br><br>

		<div class="form_register">
		<center><h1>Enviar Tarea</h1></center>
		<form action="<?= FOLDER_PATH . '/tareas_enviar_alumno/enviar_tarea' ?>" method="post" style="width: 500px;" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?= $id ?>">
			<input type="hidden" name="rol" value="<?= $rol ?>">