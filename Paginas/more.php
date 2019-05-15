<head>
	<link rel="stylesheet" type="text/css" href="../CSS/more.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=enjkmvqbvv5ad8ey4z76voi9xt79co2k7l20kiqs8isbgdh7
"></script>
  	<script>
	  tinymce.init({
	    selector: '#mytextarea'
	  });
  </script>
</head>
<?php
	session_start();
	include('header2.php');
	include('servidor.php');
	//include('funcoes.php');

	$bd = mysqli_connect('localhost', 'root', '', 'pap2018');
	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$id = substr($url, strrpos($url, '=') + 1);
	$_SESSION['id_topico'] = $id;
	$sql = "SELECT * FROM topicos where id_topico='$id'";
	$query = mysqli_query($bd, $sql);
	$res = mysqli_fetch_assoc($query);
	do{

		$id_titulo = $res['id_titulo'];
		$sql_id = "SELECT * FROM titulo WHERE id_titulo ='$id_titulo'";
		$query_id = mysqli_query($bd, $sql_id);
		$res_id = mysqli_fetch_assoc($query_id);
		$titulo = $res_id['titulo'];
	
		$assunto = $res['id_assunto'];
		$sql_assunto = "SELECT * FROM assunto WHERE id_assunto ='$assunto'";
		$query_assunto = mysqli_query($bd, $sql_assunto);
		$res_assunto = mysqli_fetch_assoc($query_assunto);
		$assunto = $res_assunto['assunto'];

		$id_categoria = $res['id_categoria'];
		$sql_cat = "SELECT * FROM categoria WHERE id_categoria ='$id_categoria'";
		$query_cat = mysqli_query($bd, $sql_cat);
		$res_cat = mysqli_fetch_assoc($query_cat);
		$categoria = $res_cat['categoria'];

		$user = $res['id_utilizador'];
		$assunto = $res_assunto['assunto'];
		$id_username_go = $res['id_utilizador'];

		$sql_user = "SELECT * FROM utilizadores WHERE id_utilizador ='$user'";
		$query_user = mysqli_query($bd, $sql_user);
		$res_user = mysqli_fetch_assoc($query_user);
		$img_user = $res_user['foto'];
		$user_topico = $res_user['nome_utilizador'];
		$user_id = $res_user['id_utilizador'];
		$data_registo = $res_user['data_registo'];
		$rank = $res_user['type'];
		if($rank == 1) {
			$rank = "Administrador";	
		}else {
			$rank = "Utilizador";
		}
?>

<div class=title_topic>
		<span class="topic-list-header--title"></span>
	<div class="topic-list--content">
		<ul>
			<li>
				<div class="topic--post post has-profile">
					<dl class="postprofile">
						<dt class="has-profile-rank no-avatar">
							<div class="avatar-container"></div>
							<br>
						</dt>
						<dd class="profile-rank"><?php echo $rank;?></dd>
						<dd class="profile-joined">
							<strong>Joined:</strong>
							<?php echo $res_user['data_registo'];?>
						</dd>
						<?php 
							if(isset($_SESSION['username'])){?>
						<dd><form method="POST"><button name="btn_like" style="display: none;" class="btn_like"><i class="fas fa-thumbs-up"></i></button></form></dd>	
						
						<?php
							$sql_ver_like = "SELECT * FROM likes WHERE id_topico = '$id' AND id_utilizador = '$id_utilizador'";
							$query_ver_like = mysqli_query($bd, $sql_ver_like);
							$cont_ver_like = mysqli_num_rows($query_ver_like);
							if($cont_ver_like > 0) {?>
									<dd><form method="POST"><button name="btn_like" style="background-color: #256267;" class="btn_like"><i class="fas fa-thumbs-up"></i></button></form></dd>	
								<?php 
							}else{?>

							<dd>
								<form method="POST">
									<button name="btn_like" class="btn_like"><i class="fas fa-thumbs-up"></i></button>
								</form>

							<?php 
							if(isset($_POST['btn_like'])) {
								/*ID Topico,ID Utilizador*/
								echo $id;
								echo $id_utilizador;

								$sql_like = "INSERT INTO likes (id_topico,id_utilizador) VALUES ('$id','$id_utilizador')";
								$query_like = mysqli_query($bd, $sql_like);
								echo "(<meta http-equiv='refresh' content='0'>)";

							}
						}
						?>
						<dd>
							<?php 
								/*echo $id;  Id Topico
								echo $user_topico; Nome do User do topico
								echo $user_id;  Id do utilizador do topico*/
								if($_SESSION['username'] == $user_topico){
							?>
							<button class="btn_delete" name="btn_delete" onclick="doSomething()"><i class="fas fa-trash"></i></button>
						</dd>
						<form method="POST">
							<div id="id_confrmdiv">
								<p>Tem a certeza que quer eliminar o seu topico?</p>
									<button id="id_truebtn" name="sim">Sim</button>
									<button id="id_falsebtn">Não</button>
							</div>
							<?php
								if(isset($_POST['sim'])) {
									$sql_delete_respostas = "DELETE FROM respostas WHERE id_topico = '$id'";
									$query_delete = mysqli_query($bd, $sql_delete_respostas); 
									$sql_delete = "DELETE FROM topicos WHERE id_topico = '$id'";
									$query_delete = mysqli_query($bd, $sql_delete);
									$sql_delete_assunto = "DELETE FROM assunto WHERE id_assunto = '$id_assunto'";
									$query_delete = mysqli_query($bd, $sql_delete_assunto);
									$sql_delete_titulo = "DELETE FROM titulo WHERE id_titulo = '$id_titulo'";
									$query_delete = mysqli_query($bd, $sql_delete_titulo);
									echo '<script type="text/javascript">
	          						window.location = "../index.php"
	      							</script>';
								} 
						}
					}else {
						
					}
						?>
						</form>	
						<script>
							function doSomething(){
								document.getElementById('id_confrmdiv').style.display="block"; //this is the replace of this line
							}
						</script>
						</dd>
					</dl>
					<div class="postbody">
						<div id="post_content1" style="padding: 0px 30px;">
							<h3 class="first"><a href="#"><?php echo utf8_encode($titulo);?></a></h3>
							<p class="author"><span class="responsive-hide">by <strong><a href="../Paginas/perfil_user.php?<?php echo $id_username_go;?>"> <?php echo $res_user['nome_utilizador'];?></a></strong></span></p>
							<div class="content"><?php echo utf8_encode($res_assunto['assunto']);?></div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<?php 
	}while($res = mysqli_fetch_assoc($query));
	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$id = substr($url, strrpos($url, '=') + 1);
	$sql = "SELECT * FROM respostas WHERE id_topico = '$id'";
	$query = mysqli_query($bd, $sql);
	$res = mysqli_fetch_assoc($query);
	$contagem = mysqli_num_rows($query);
	do{
		$id_username = $res['id_utilizador'];
		$sql_username = "SELECT * FROM utilizadores WHERE id_utilizador = '$id_username'";
		$query_username = mysqli_query($bd, $sql_username);
		$res_username = mysqli_fetch_assoc($query_username);
		$rank = $res_username['type'];
		if($rank == 1) {
			$rank = "Administrador";	
		}else {
			$rank = "Utilizador";
		}
	do {

		$username = $res_username['nome_utilizador'];
		$foto = $res_username['foto'];
	}while ($res_username = mysqli_fetch_assoc($query_username));
		if($contagem > 0 ) { $id_resposta = $res['id_respostas'];?>
<form method="POST">
 	<div class="topic-list--content">
		<ul>
			<li>
				<div class="topic--post post has-profile">
					<dl class="postprofile">
						<dd class="profile-rank" style="margin-top: 25px;"><?php echo $rank;?></dd>
						<dd class="profile-joined">
							<strong>Joined:</strong>
							<?php echo $res_user['data_registo'];?>
						</dd>
						<dd>
							<?php if($_SESSION['id_utilizador'] == $id_username){?>
							<button class="btns" name="<?php echo $id_resposta;?>btn_delete_respostas"><i class="fas fa-trash"></i></button>
							<?php }else {?>
						</dd>	
							<?php } ?>
						<?php 
							if(isset($_POST[$id_resposta.'btn_delete_respostas'])) {
								$sql_resposta = "DELETE FROM respostas WHERE id_respostas = '$id_resposta'";
					  			$query_resposta_delete = mysqli_query($bd, $sql_resposta);
					  			echo("<meta http-equiv='refresh' content='0'>");
							}
						?>
</form>
					</dl>
					<div class="postbody">
						<div id="post_content1" style="padding: 0px 30px;">
							<h3 class="first"><a href="#"></a></h3>
							<p class="author"><span class="responsive-hide">by <strong><a href="../Paginas/perfil_user.php?<?php echo $id_username;?>"><?php echo utf8_encode($username);?></a></strong></span></p>
							<div class="content-respostas"><?php echo $res['resposta'];?></div>
						</div>
					</div>
				</div>
			</li>
		</ul>

		 <?php 
		  if($res_username['type'] == 1){?>
		<a href="" style="float: right;">Eliminar</a>
	<?php }else { ?>
	</div>
		
<?php
}
		}
	}while($res = mysqli_fetch_assoc($query));

?>
<p id='msg'></p>

<script>
	function comentarios(){
		var comentario = document.getElementById('mytextarea').value;
		$.ajax ({
			type: "post",
			url:"comentarios.php",
			data: {comentario},
			success: function(html){
				$('#msg').html(html);
			}
		});
		return false;
	}
</script>


<?php 
	if(isset($_SESSION['username'])){?> 
	<form method="post" style="margin: 10px 55px;">
    	<textarea id="mytextarea" style="resize: none;"></textarea>
    	<button name="btn_comentar" class="btn_comentar" onclick="return comentarios(window.location.reload());">Comentar</button>
  	</form>
  <?php } ?>

  
