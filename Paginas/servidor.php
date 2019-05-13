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

	/* Registro*/
		if(isset($_POST['btn_register'])){
				$username = mysqli_real_escape_string($bd, $_POST['username']);
				$email = mysqli_real_escape_string($bd, $_POST['email_register']);
				$password = mysqli_real_escape_string($bd, $_POST['password']);
					$sql = "SELECT * FROM utilizadores WHERE email = '$email'";
					$query = mysqli_query($bd, $sql);
					$cont = mysqli_num_rows($query);
					if($cont > 0) {
							$_SESSION['ver_email'] = "Email ja existente";
						
						}else{
						$foto = "default.png";
						$foto_capa = "default_capa.jpg";
						$activo = 1;
						$sql = "INSERT INTO utilizadores (nome_utilizador,email,password,foto,data_registo,activo,foto_capa) VALUES ('$username','$email','$password','$foto',CURDATE(),'$activo','$foto_capa')";
						$query = mysqli_query($bd, $sql);
						$_SESSION['username'] = $username;
						$_SESSION['email'] = $email;
						$_SESSION['foto'] = $foto;
						$_SESSION['foto_capa'] = $foto_capa;
						$sql = "SELECT * FROM utilizadores WHERE email = '$email' AND password = '$password'";
						$query = mysqli_query($bd, $sql);
						$res = mysqli_fetch_assoc($query);
						$_SESSION['id_utilizador'] = $res['id_utilizador'];
						$_SESSION['password'] = $res['password'];
						header('location: index.php?page=home');	
}
}
	/* Registro*/


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
		header('location: ../index.php?page=home');
	/*Criar Topico*/
	}
?>	