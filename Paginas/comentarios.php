<?php
	session_start();
	date_default_timezone_set("Portugal");
	$bd = mysqli_connect('localhost','root','','pap2018');
	$comentario = $_POST['comentario'];
	$id_utilizador = $_SESSION['id_utilizador'];
	$id_topico = $_SESSION['id_topico'];
	$hora = date("Y-m-d H:i:s");
	$sql = "INSERT INTO respostas (resposta,id_utilizador,id_topico,hora) values ('$comentario','$id_utilizador','$id_topico','$hora')";
	$query = mysqli_query($bd, $sql);



?>
