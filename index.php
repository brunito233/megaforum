<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Mega Forum</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
	<link rel="stylesheet" type="text/css" href="CSS/header.css">
	<link rel="stylesheet" type="text/css" href="CSS/register.css">
</head>
<body>
	<?php
		include('Paginas/servidor.php');

		include('Paginas/header.php');

			if(!isset($_GET['page'])) {
				include('Paginas/home.php');
			}else{
				$page = $_GET['page'];
				include("Paginas/$page.php");
			}
		
		include('Paginas/footer.php');
	?>
</body>
</html>