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
				<h3>Estatisticas de <?php echo $perfil_user['nome_utilizador'];?></h3>
				<dl class="details">
					<dt>Registado desde:</dt>
					<dd><strong><?php echo $perfil_user['data_registo'];?></strong></dd>
					<dt>Nº de Topicos:</dt>
					<dd><strong>#</strong></dd>
					<dt>Nº de Respostas:</dt>
					<dd><strong>#</strong></dd>
				</dl>
			</div>
      </div>
    </div>
    <?php 
      if($_SESSION['id_utilizador'] == $id) {?>
        <div class="column3">
        <button class="btns_alterar" id="btn1" onclick="hide_show()">Alterar Nome</button>
        <button class="btns_alterar" id="btn2" onclick="hide_show1()">Alterar Email</button>
        <button class="btns_alterar" id="btn3" onclick="hide_show2()">Alterar Palavra-Passe</button>
        <div class="alterar_nome" id="alterar_nome" style="display: none; padding: 20px;">
          <form method="POST">  
            Nome: <input type="text" name="nome_utilizador_novo" value="<?php echo $perfil_user['nome_utilizador']; ?>">
            <p><br></p>
            <button name="btn_alterar_nome">Alterar Nome</button>
          </form> 
          <?php
            if(isset($_POST['btn_alterar_nome'])){
              $nome_novo = mysqli_real_escape_string($bd, $_POST['nome_utilizador_novo']);
                if(empty($nome_novo)){
                  echo '<script language="javascript">';
                  echo 'alert("Introduza um nome.")';
                  echo '</script>';
              }else{
                $id_utilizador = $_SESSION['id_utilizador'];
                $sql_nome_update = "UPDATE utilizadores SET nome_utilizador = '$nome_novo' WHERE id_utilizador = '$id_utilizador'";
                $querynome = mysqli_query($bd, $sql_nome_update); 
                echo("<meta http-equiv='refresh' content='0'>");
                echo '<script language="javascript">';
                echo 'alert("Nome alterado com sucesso.")';
                echo '</script>';
                $_SESSION['username'] = $nome_novo;
              }
            }
          ?>
        </div>
        <script type="text/javascript">
          function hide_show() {
            if(document.getElementById('alterar_nome').style.display == "none" & document.getElementById('alterar_email').style.display == "none"){
              document.getElementById('alterar_nome').style.display = "block";
              document.getElementById('alterar_email').style.display = "none";
              document.getElementById('alterar_senha').style.display = "none";
          }else {
             document.getElementById('alterar_nome').style.display = "block";
              document.getElementById('alterar_email').style.display = "none";
              document.getElementById('alterar_senha').style.display = "none";
          }
        }
        </script>
        <form method="POST"> 
          <div class="alterar_email" id="alterar_email" style="display: none; padding: 20px;">
            Email atual: <input type="text" name="email_atual" disabled="true" value="<?php echo $perfil_user['email'];?>">
            <p><br></p>
            Email Novo: <input type="text" name="email_novo">
            <p><br></p>
            <button name="alterar_email">Alterar Email</button>
          </div>
        </form>
        <?php
          if(isset($_POST['alterar_email'])){
            $email_novo = mysqli_real_escape_string($bd, $_POST['email_novo']);
              if(empty($email_novo)){
                echo '<script language="javascript">';
                echo 'alert("Introduza um Email.")';
                echo '</script>';
            }else{
                $id_utilizador = $_SESSION['id_utilizador'];
                $sql_email_update = "UPDATE utilizadores SET email= '$email_novo' WHERE id_utilizador = '$id_utilizador'";
                $queryemail = mysqli_query($bd, $sql_email_update); 
                echo("<meta http-equiv='refresh' content='0'>");
                echo '<script language="javascript">';
                echo 'alert("Email alterado com sucesso.")';
                echo '</script>';
                $_SESSION['email'] = $email_novo;
          }
          }
        ?>
        <script type="text/javascript">
          function hide_show1() {
            if(document.getElementById('alterar_email').style.display == "none" &  document.getElementById('alterar_nome').style.display == "block"){
              document.getElementById('alterar_email').style.display = "block";
              document.getElementById('alterar_nome').style.display = "none";
              document.getElementById('alterar_senha').style.display = "none";
          }else {
             document.getElementById('alterar_email').style.display = "block";
              document.getElementById('alterar_nome').style.display = "none";
              document.getElementById('alterar_senha').style.display = "none";
          }
        }
        </script>
        <form method="POST">
          <div class="alterar_senha" id="alterar_senha" style="display: none; padding: 20px;">
            Palavra-Passe atual: <input type="password" name="passe_atual">
            <p><br></p>
            Palavra-Passe Nova: <input type="password" name="passe_nova">
            <p><br></p>
            Confirmaçao Palavra-Passe: <input type="password" name="confirm_passe"> 
            <p><br></p>
            <button name="alterar_senha">Alterar Email</button>
          </div>
          <?php 
            if(isset($_POST['alterar_senha'])){ 
              $password_atual = mysqli_real_escape_string($bd, $_POST['passe_atual']);
                if($password_atual == $_SESSION['password']){
                  $password_nova = mysqli_real_escape_string($bd, $_POST['passe_nova']);
                  $id_utilizador = $_SESSION['id_utilizador'];
                    $sql_password_update = "UPDATE utilizadores SET password = '$password_nova' WHERE id_utilizador = '$id_utilizador'";
                    $querypass = mysqli_query($bd, $sql_password_update);
                      echo '<script language="javascript">';
                      echo 'alert("Palavra-passe alterada com sucesso!")';
                      echo '</script>'; 
                  }else{
                      echo '<script language="javascript">';
                      echo 'alert("De momento não foi possivel alterar a palavra-passe!Tente mais tarde.")';
                      echo '</script>';
                }
              }
          ?>
        </form>
            <script type="text/javascript">
              function hide_show2() {
                if(document.getElementById('alterar_senha').style.display == "none" &  document.getElementById('alterar_nome').style.display == "block" & document.getElementById('alterar_email').style.display == "block" ){
                  document.getElementById('alterar_senha').style.display = "block";
                  document.getElementById('alterar_nome').style.display = "none";
                  document.getElementById('alterar_email').style.display = "none";
              }else {
                 document.getElementById('alterar_senha').style.display = "block";
                  document.getElementById('alterar_nome').style.display = "none";
                  document.getElementById('alterar_email').style.display = "none";
              }
            }
            </script>
          </div>
      <?php }else { ?>

      <?php } ?>
</body>
</html>