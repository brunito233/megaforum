<?php
session_start();
$bd = mysqli_connect('localhost','root','','pap2018');
	$comentario = $_POST['comentario'];
	$id_utilizador = $_SESSION['id_utilizador'];
	$id_topico = $_SESSION['id_topico'];
	$sql = "INSERT INTO respostas (resposta,id_utilizador,id_topico) values ('$comentario','$id_utilizador','$id_topico')";
	$query = mysqli_query($bd, $sql);
	echo("<meta http-equiv='refresh' content='0'>");
		
	
?>	