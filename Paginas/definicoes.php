<?php
	session_start();
	include 'servidor.php';
	include 'header2.php';
	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$id = substr($url, strrpos($url, '?') + 1);
	$sql = "SELECT * FROM utilizadores WHERE id_utilizador = '$id'";
	$query = mysqli_query($bd, $sql);
	$perfil_user = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Definições</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../CSS/definicoes.css">
</head>
<body>
	<!--<?php 
      if($_SESSION['id_utilizador'] == $id) {?>
        <div class="column3">
        <button class="btns_alterar" id="btn1" onclick="hide_show()">Alterar Nome</button><br>
        <button class="btns_alterar" id="btn2" onclick="hide_show1()">Alterar Email</button><br>
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

      <?php } ?>-->
        <div class="main">
      		<div class="tab">
      		  <button class="tablinks" onclick="openCity(event, 'ediar_perfil')" id="defaultOpen">Editar Perfil</button>
      		  <button class="tablinks" onclick="openCity(event, 'alterar_senha')">Alterar Senha</button>
      		</div>

      <div id="ediar_perfil" class="tabcontent">
      <form id="form_nome" method="POST">
          <a>Nome </a><input type="text" name="nome_user" id="input_name" value="<?php echo utf8_encode($_SESSION['username']);?>">
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
      <a>Email </a><input type="text" name="email_user" id="input_email" value="<?php echo utf8_encode($_SESSION['email']);?>"><br>
        <button name="submit_email" id="btn_update_email" style="display: none;">Guardar Alterações</button>
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
        <button name="sexo-user" id="btn_update_sexo">Guardar Alterações</button>
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
      <a>Bio </a><input type="text" name="bio_user" size="30" id="bio_user" value="<?php echo utf8_encode($res['bio']);?>">
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


	<div id="alterar_senha" class="tabcontent">
		    <form id="form_senha" method="POST">
		    	<div class="oldpassword">
			      <a>Senha antiga</a>
			        <input type="password" name="password_atual">
			    </div>
			    <div class="newpassword"> 
			          <a>Nova senha</a>
			            <input type="password" name="password_nova">
			    </div>        
			    <div class="confirmpassword">
		              <a>Confirme a nova senha</a>
		                <input type="password" name="password_nova2">
		        </div>
		        <div class="btn_confirm">
		        	 <a></a>
		            <button name="submit_password" class="btn_update_password">Alterar senha</button>
		        </div>    
		    </form>

<?php 
  if(isset($_POST['submit_password'])){ 
    $password_atual = mysqli_real_escape_string($bd, $_POST['password_atual']);
      if($password_atual == $_SESSION['password']){
        $password_nova = mysqli_real_escape_string($bd, $_POST['password_nova']);
        $id_utilizador = $_SESSION['id_utilizador'];
          $sql_password_update = "UPDATE utilizadores SET password = '$password_nova' WHERE id_utilizador = '$id_utilizador'";
          $querypass = mysqli_query($db, $sql_password_update);
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
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>
</html>