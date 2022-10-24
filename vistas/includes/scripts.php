<?php  
$id = $_SESSION['idUser'];

$db = new mysqli('localhost', 'root', '', 'classhub');

$dato = $db->query("SELECT temavis FROM usuario WHERE idusuario = '{$id}'");

$datotema = $dato->fetch_assoc();

$str = 'temavis';


if ($datotema[$str] == 1) {
       ?>
    <link rel="stylesheet" type="text/css" href="/mvc/vistas/includes/css/POSTLOGIN.css?n=1">
    <?php 
    }
    elseif( $datotema[$str] == 2){
    ?>
    <link rel="stylesheet" type="text/css" href="/mvc/vistas/includes/css/POSTLOGIN2.css?n=2">
    <?php 
    }
    elseif( $datotema[$str] == 3){
    ?>
 <link rel="stylesheet" type="text/css" href="/mvc/vistas/includes/css/POSTLOGIN3.css?n=3">
    <?php 
}
elseif( $datotema[$str] == 4){
?>
 <link rel="stylesheet" type="text/css" href="/mvc/vistas/includes/css/POSTLOGIN4.css?n=4">
   
 <?php
 }
 elseif( $datotema[$str] == 5){
 ?> 

 <link rel="stylesheet" type="text/css" href="/mvc/vistas/includes/css/POSTLOGIN5.css?n=3">

 <?php
 }
 ?>

	<script type="text/javascript" src="/mvc/vistas/includes/js/panCARGA.js"></script>
	<link rel="stylesheet" href="/mvc/vistas/includes/css/tarea.css">
	<link rel="stylesheet" href="/mvc/vistas/includes/css/calendario.css">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum scale=1.0/">










        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,500;1,300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,500;1,900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="img/iconos/gato.png">
    <script type="text/javascript" src="js/scripts.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,500;1,300&family=Kdam+Thmor+Pro&family=Open+Sans:wght@300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,500;1,900&display=swap"
        rel="stylesheet">
    <script type="text/javascript" src="js/scripts.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,500;1,300&family=Kdam+Thmor+Pro&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,500;1,900&display=swap"
        rel="stylesheet">

    <script>
        !function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (!d.getElementById(id)) { js = d.createElement(s); js.id = id; js.src = 'https://weatherwidget.io/js/widget.min.js'; fjs.parentNode.insertBefore(js, fjs); } }(document, 'script', 'weatherwidget-io-js');
    </script>
    <script type="text/javascript" src="js/scripts.js"></script>
    