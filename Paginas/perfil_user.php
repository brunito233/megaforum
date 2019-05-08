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
				</dl>
			</div>
			<div class="column2">
				<h3>Estatisticas de Bruno Santos</h3>
				<dl class="details">
					<dt>Registado desde:</dt>
					<dd><strong><?php echo $perfil_user['data_registo'];?></strong></dd>
					<dt>Nº de Topicos:</dt>
					<dd><strong>#</strong></dd>
					<dt>Nº de Respostas:</dt>
					<dd><strong>#</strong></dd>
				</dl>
			</div>
			<div class="column3">
				<h3>Alterar Dados</h3>
					<dl class="details">
						<form id="form_nome" method="POST">
          					<a>Nome: </a><input type="text" name="nome_user" id="input_name" value="<?php echo utf8_encode($_SESSION['username']);?>">
         						<button name="submit_nome" id="btn_update_name" style="display: none;">Guardar Alterações</button>
      					</form>
							    <script type="text/javascript">
							      document.addEventListener('click', evt => {
							      if (evt.path.indexOf(document.querySelector('#input_name')) < 0) {
							        document.getElementById('btn_update_name').style.display = "none";
							      } else {
							        document.getElementById('btn_update_name').style.display = "block";
							      }
							    }, true);
							  </script>
					<?php
					     $db = mysqli_connect('localhost', 'root', '', 'pap2018');
					      if(isset($_POST['submit_nome'])){
					        $nome_novo = mysqli_real_escape_string($db, $_POST['nome_user']);
					          if(empty($nome_novo)){
					            echo '<script language="javascript">';
					            echo 'alert("Introduza um nome.")';
					            echo '</script>';
					      }else{
					        $id_utilizador = $_SESSION['id_utilizador'];
					          $sql_nome_update = "UPDATE utilizadores SET nome_utilizador = '$nome_novo' WHERE id_utilizador = '$id_utilizador'";
					            $querynome = mysqli_query($db, $sql_nome_update); 
					              echo("<meta http-equiv='refresh' content='0'>");
					              echo '<script language="javascript">';
					              echo 'alert("Nome alterado com sucesso.")';
					              echo '</script>';
					              $_SESSION['username'] = $nome_novo;
					      }
					    }
    				?>

	<form id="form_email" method="POST">
      <span>Email:</span><input type="text" name="email_user" id="input_email" value="<?php echo utf8_encode($_SESSION['email']);?>"><br>
        <button name="submit_email" id="btn_update_email" style="display: none;">Guardar Alterações</button></dt>
        <?php
		  $db = mysqli_connect('localhost', 'root', '', 'pap2018');
		  if(isset($_POST['submit_email'])){
		    $email_novo = mysqli_real_escape_string($db, $_POST['email_user']);
		      if(empty($email_novo)){
		        echo '<script language="javascript">';
		        echo 'alert("Introduza um Email.")';
		        echo '</script>';
		    }else{
		      $id_utilizador = $_SESSION['id_utilizador'];
		        $sql_email_update = "UPDATE utilizadores SET email= '$email_novo' WHERE id_utilizador = '$id_utilizador'";
		        $queryemail = mysqli_query($db, $sql_email_update); 
		        echo("<meta http-equiv='refresh' content='0'>");
		        echo '<script language="javascript">';
		        echo 'alert("Email alterado com sucesso.")';
		        echo '</script>';
		        $_SESSION['email'] = $email_novo;
		    }
		  }
		?>
	</form>
	<script type="text/javascript">
    document.addEventListener('click', evt => {
        if (evt.path.indexOf(document.querySelector('#input_email')) < 0) {
          document.getElementById('btn_update_email').style.display = "none";
        } else {
          document.getElementById('btn_update_email').style.display = "block";
        }
      }, true);
    </script>
    <form id="form_user_sex" method="POST">
      <a>Sexo</a>
        <select name="option-sexo" id="select_sexo">
          <option selected disabled hidden><?php echo $res['sexo']; ?></option>
          <option>----</option>
          <option>Masculino</option>
          <option>Femenino</option>
          <option>Não Especificado</option>
        </select>
        <button name="sexo-user" id="btn_update_sexo" style="display: none;">Guardar Alterações</button>
        <?php 
          if(isset($_POST['sexo-user'])) {
            $sexo = mysqli_real_escape_string($db, $_POST['option-sexo']);
            if(empty($sexo)) {
              echo '<script language="javascript">';
              echo 'alert("Introduza o seu sexo.")';
              echo '</script>';
            }else {
              $sql_sexo = "UPDATE utilizadores SET sexo = '$sexo' WHERE id_utilizador = '$id_utilizador'";
              $query_sexo = mysqli_query($db, $sql_sexo);
              echo '<script language="javascript">';
              echo 'alert("Informação Alterada com Sucesso")';
              echo '</script>';
              echo("<meta http-equiv='refresh' content='0'>"); 
            }
          }
        ?>
        <script type="text/javascript">
          document.addEventListener('click', evt => {
            if (evt.path.indexOf(document.querySelector('#select_sexo')) < 0) {
        document.getElementById('btn_update_sexo').style.display = "none";
            } else {
        document.getElementById('btn_update_sexo').style.display = "block";
            }
          }, true);
        </script>

  </form>


   <form id="form_especialidade" method="POST">
      <a>Especialidade </a><input type="text" name="especialidade_user" id="especialidade_user" value="<?php echo utf8_encode($res['especialidade']);?>">
      <button name="submit_especialidade" id="btn_update_especialidade" style="display: none;">Guardar Alterações</button>
  </form>

  <script type="text/javascript">
    document.addEventListener('click', evt => {
            if (evt.path.indexOf(document.querySelector('#especialidade_user')) < 0) {
        document.getElementById('btn_update_especialidade').style.display = "none";
            } else {
        document.getElementById('btn_update_especialidade').style.display = "block";
            }
          }, true);
  </script>

<?php
  $db = mysqli_connect('localhost', 'root', '', 'pap2018');
  if(isset($_POST['submit_especialidade'])){
    $especialidade_novo = mysqli_real_escape_string($db, $_POST['especialidade_user']);
      if(empty($especialidade_novo)){
        echo '<script language="javascript">';
        echo 'alert("Introduza uma Especialidade.")';
        echo '</script>';
    }else{
      $id_utilizador = $_SESSION['id_utilizador'];
        $sql_update_especialidade = "UPDATE utilizadores SET especialidade = '$especialidade_novo' WHERE id_utilizador = '$id_utilizador'";
        $query_especialidade = mysqli_query($db, $sql_update_especialidade); 
        echo("<meta http-equiv='refresh' content='0'>");
        echo '<script language="javascript">';
        echo 'alert("Especialidade alterada com sucesso.")';
        echo '</script>';
        $_SESSION['especialidade_novo'] = $especialidade_novo;
    }
  }
?>

  <form id="form_bio" method="POST">
      <a>Bio </a><input type="text" name="bio_user" id="bio_user" value="<?php echo utf8_encode($res['bio']);?>">
      <button name="submit_bio" id="btn_update_bio" style="display: none;">Guardar Alterações</button>
  </form>
  <script type="text/javascript">

    document.addEventListener('click', evt => {
            if (evt.path.indexOf(document.querySelector('#bio_user')) < 0) {
        document.getElementById('btn_update_bio').style.display = "none";
            } else {
        document.getElementById('btn_update_bio').style.display = "block";
            }
          }, true);
  </script>

<?php
  $db = mysqli_connect('localhost', 'root', '', 'pap2018');
  if(isset($_POST['submit_bio'])){
    $bio_novo = mysqli_real_escape_string($db, $_POST['bio_user']);
      if(empty($bio_novo)){
        echo '<script language="javascript">';
        echo 'alert("Introduza uma Bio.")';
        echo '</script>';
    }else{
      $id_utilizador = $_SESSION['id_utilizador'];
        $sql_update_bio = "UPDATE utilizadores SET bio = '$bio_novo' WHERE id_utilizador = '$id_utilizador'";
        $query_bio = mysqli_query($db, $sql_update_bio); 
        echo("<meta http-equiv='refresh' content='0'>");
        echo '<script language="javascript">';
        echo 'alert("Bio alterada com sucesso.")';
        echo '</script>';
        $_SESSION['bio_novo'] = $bio_novo;
    }
  }
?>
</div>

				</div>
			</div>
		</div>
	</div>
</body>
</html>