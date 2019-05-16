<?php 
	session_start();
	include 'header2.php';
	include 'servidor.php';
	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$id = substr($url, strrpos($url, '?') + 1);
	$sql = "SELECT * FROM utilizadores WHERE id_utilizador = '$id'";
	$query = mysqli_query($bd, $sql);
	$perfil_user = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Perfil Utilizador</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../CSS/profile_user.css">
</head>
<body>
	<div class="panel bg2">
		<div class="inner">
			<div class="column1">
				<h3>Utilizador</h3>
				<dl class="details">
					<dt><span>Userame: <strong><?php echo $perfil_user['nome_utilizador'];?></strong></span></dt>
					<?php 
						$rank = $perfil_user['type'];
						if($rank == 1) {
							$rank = "Administrador";
						}else {
							$rank = "Utilizador";
						}
					?>
					<dt><span>Rank: <strong><?php echo $rank;?></strong></span></dt>
					<dt><span>Sexo: <strong><?php echo $perfil_user['sexo']; ?></strong></span>
					<dt><span>Bio: <strong><?php echo $perfil_user['bio'];?></strong></span></dt>
					<dt><span>Especialidade: <strong><?php echo $perfil_user['especialidade']?></strong></span></dt>
				</dl>
			</div>
			<div class="column2">
				<h3>Estatisticas de <?php echo $perfil_user['nome_utilizador'];?></h3>
				<dl class="details">
					<dt>Registado desde:</dt>
					<dd><strong><?php echo date('d-m-Y', strtotime($perfil_user['data_registo']));?></strong></dd>
					<?php 
						$result = mysqli_query($bd, "SELECT COUNT(id_topico) AS id_topico FROM topicos
						WHERE id_utilizador = '$id'");
						$row = mysqli_fetch_array($result);
						$count_ntopicos = $row['id_topico'];
					?>
					<dt>Nº de Topicos:</dt>
					<dd><strong><?php echo $count_ntopicos; ?></strong></dd>
					<?php 
						$result = mysqli_query($bd, "SELECT COUNT(id_respostas) AS id_respostas FROM respostas
						WHERE id_utilizador = '$id'");
						$row = mysqli_fetch_array($result);
						$count_nrespostas = $row['id_respostas'];
					?>
					<dt>Nº de Respostas:</dt>
					<dd><strong><?php echo $count_nrespostas; ?></strong></dd>
				</dl>
			</div>
      </div>
    </div>
</body>
</html>