<?php 
	/*Ligação a base de dados*/
	$bd = mysqli_connect ('localhost','root', '' , 'pap2018');
	/*Ligação a base de dados*/

	mysqli_set_charset($bd, 'utf8');

	/*Login*/
	if(isset($_POST['btn_login'])){
		$email = mysqli_real_escape_string($bd , $_POST['email']); 
		$password = mysqli_real_escape_string($bd , $_POST['pass']); 
		$sql = "SELECT * FROM utilizadores WHERE email = '$email' AND password = '$password'";
		$result = mysqli_query($bd,$sql);
			$cont = mysqli_num_rows($result);
			$res = mysqli_fetch_assoc($result);
			if($cont == 1 ){
				do {
					$id_utilizador_logado = $_SESSION['id_utilizador'];
					$username = $res['nome_utilizador'];
					$id = $res['id_utilizador'];
					$_SESSION['id_utilizador'] = $id;
					$_SESSION['username'] = $username;
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $password;
					$_SESSION['foto'] = $res['foto'];
				}while ($res = mysqli_fetch_assoc($result));
				header('location: index.php?page=home');
	}
	}
	/*Login*/


	/*Terminar Sessão*/
		if(isset($_GET['logout'])) {
			$_SESSION['username'] = '';
			session_destroy();	
			header('Location: index.php');		
	}
	/*Terminar Sessão*/

	/*Criar Topico*/
		if(isset($_POST['btn_criar'])){
		$id_utilizador = $_SESSION['id_utilizador'];
		$titulo = mysqli_real_escape_string($bd, $_POST['title']);
		$assunto = mysqli_real_escape_string($bd, $_POST['assunto']);
		$categoria = mysqli_real_escape_string($bd, $_POST['categoria']);

		$sql_titulo = "INSERT INTO titulo (titulo) VALUES ('$titulo')";
		$result = mysqli_query($bd,$sql_titulo);
		$id_titulo = mysqli_insert_id($bd);

		$sql_assunto = "INSERT INTO assunto (assunto) VALUES ('$assunto')";
		$result = mysqli_query($bd,$sql_assunto);
		$id_assunto = mysqli_insert_id($bd);

		$sql = "INSERT INTO topicos (id_categoria,id_titulo,id_utilizador,id_assunto) VALUES ('$categoria','$id_titulo','$id_utilizador','$id_assunto')";
		$result = mysqli_query($bd,$sql);
		echo $sql;
				/*Criar Topico*/
	}
?>	