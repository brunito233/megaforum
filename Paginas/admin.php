<?php
    session_start();
    if(isset($_SESSION['username'])){
        include 'header2.php';
        include 'servidor.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Adms</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="../CSS/admin.css">
</head>
<body>
        <div class="admin_change">
        	<h4>Adicionar Admin's</h4>
        	<form method="POST">
				<a>Nome:</a>
					<select id="select" name="utilizadores">
				       	<optgroup label="Utilizadores">
				        <?php
				          	$sql = "SELECT * FROM utilizadores WHERE activo = '1' AND type = '0'";
				            $query = mysqli_query($bd, $sql);
				            $res = mysqli_fetch_assoc($query);
				            do {?>
				        	<option name="<?php echo $res['nome_utilizador'];?>"><?php echo utf8_encode($res['nome_utilizador']);?></option>
				        	<?php } while($res = mysqli_fetch_assoc($query));?>
				        </optgroup>
		    		</select>
        			<button name="btn_update_utilizador">Adicionar Administrador</button>
        </form>
    </div>
            <?php
                $admin = $_SESSION['username'];
                if(isset($_POST['btn_update_utilizador'])){
                    $nome_utilizador = mysqli_real_escape_string($bd, $_POST['utilizadores']);
                    $sql_ban = "UPDATE utilizadores SET type = '1' WHERE nome_utilizador = '$nome_utilizador'";
                    $query_ban = mysqli_query($bd, $sql_ban);
                    echo("<meta http-equiv='refresh' content='0'>");
                    echo '<script language="javascript">';
                    echo 'alert("Rank Atualizador com Sucesso.")';
                    echo '</script>';
                }
            ?>
        </div>
        <div class="remove_adm">
        	<h4>Remover Administrador </h4>
            <form method="POST">
            	<a>Nome:</a>
                <select id="select" name="utilizadores_adm">
                	<option value="" disabled="" selected="" style="display: none" >Selecione o Utilizador</option>
                            <optgroup label="Utilizadores">
                            <?php
                            $sql = "SELECT * FROM utilizadores WHERE type = '1'";
                            $query = mysqli_query($bd, $sql);
                            $res = mysqli_fetch_assoc($query);
                            do {?>
                            <option name="<?php echo $res['nome_utilizador'];?>"><?php echo utf8_encode($res['nome_utilizador']);?></option>
                            <?php } while($res = mysqli_fetch_assoc($query));?>
                            </optgroup>
                        </select>
                            <button name="btn_remover_adm">Remover Adm</button>
            </form>
            <?php
                if(isset($_POST['btn_remover_adm'])) {
                    $utilizador = mysqli_real_escape_string($bd, $_POST['utilizadores_adm']);
                    $sql_adm_remove = "UPDATE utilizadores SET type = '0' WHERE nome_utilizador = '$utilizador'";
                    $query_ban = mysqli_query($bd, $sql_adm_remove);
                    echo("<meta http-equiv='refresh' content='0'>");
                }
            ?>
        </div>
<table id="customers" border="1">
  <tr>
    <th>Nome</th>
    <th>Email</th>
    <th>Tipo</th>
    <th>Tipo
  </tr>

<?php
$bd = mysqli_connect('localhost', 'root', '', 'pap2018');
			$sql = "SELECT * FROM utilizadores";
			$query = mysqli_query($bd, $sql);
			$res = mysqli_fetch_assoc($query);
			do {
			/*Buscar user dos Topicos*/
			$user = $res['id_utilizador'];
			$sql_user = "SELECT * FROM utilizadores WHERE id_utilizador ='$user'";
			$query_user = mysqli_query($bd, $sql_user);
			$res_user = mysqli_fetch_assoc($query_user);
			$img_user = $res_user['foto'];
			/*Buscar user dos Topicos*/

			/*Buscar NºTopicos de cada memebro*/
			$user = $res['id_utilizador'];
			$result = mysqli_query($bd, "SELECT COUNT(id_topico) AS id_topico FROM topicos
			WHERE id_utilizador = '$user'");
			$row = mysqli_fetch_array($result);
			$count_admin_user_topicos = $row['id_topico'];
			/*Buscar NºTopicos de cada memebro*/

			/*Contar NºRespostas de cada menbro*/
			$id_user = $res['id_utilizador'];
			$result = mysqli_query($bd, "SELECT COUNT(id_utilizador) AS id_utilizador FROM respostas
			WHERE id_utilizador = '$id_user'");
			$row = mysqli_fetch_array($result);
			$count_admin_user_respostas = $row['id_utilizador'];
			/*Contar NºRespostas de cada membro*/
?>

			  <tr>
    <td><a href="Paginas/perfil_user.php?<?php echo $user;?>"><?php echo utf8_encode($res_user['nome_utilizador']); ?></a></td>
    <a href=""></a>
    <td><?php echo $res['email'];?></td>
    <td><?php
    		if($res['type'] == 1){
    			echo "Admin";
    		}else {
    			echo "Utilizador";
    		}
   		?>
    </td>
    <td><?php
    	if($res['activo'] == 1 ) {
    		echo "<a style='background-color: green;'>Ativo</a>";
    }else {
    		echo "<a style='background-color: red;' href='#'>Banido</a>";
    }
    			}while($res = mysqli_fetch_assoc($query));
?>
  </tr>
</table>
<?php
}else {
    header('Location: ../index.php');
}
?>
</head>
<body>

<!-- Trigger/Open The Modal -->
<button id="myBtns">Banir Utilizador</button>

<!-- The Modal -->
<div id="myModalBanir" class="modalbanir">

<!-- Modal content -->
<div class="banir-modal-content">
    <span class="closebanir">&times;</span>
    <center><h4>Banir Utilizador</h4></center>
    <div class="banir">
       <form method="POST">
            <a>Nome:</a>
                 <select id="select" name="utilizadores">
                 <optgroup label="Utilizadores">
                 <?php
                     $sql = "SELECT * FROM utilizadores WHERE activo = '1' AND type = '0'";
                     $query = mysqli_query($bd, $sql);
                     $res = mysqli_fetch_assoc($query);
                     do {?>
                   <option name="<?php echo $res['nome_utilizador'];?>"><?php echo utf8_encode($res['nome_utilizador']);?></option>
                   <?php } while($res = mysqli_fetch_assoc($query));?>
                 </optgroup>
           </select>
             <a>Motivo:</a>
           <select id="select" name="bans">
               <optgroup label="Motivo de Ban">
                   <option>Topico com conteudo não aceitavel</option>
                   <option>Conteudo Improrio</option>
                   <option>Desrespeitar os termos de uso e serviço</option>
               </optgroup>
           </select>
           <button name="btn_banir" class="btn-banir">Banir Utilizador</button>
           <?php
               $admin = $_SESSION['username'];
               if(isset($_POST['btn_banir'])){
                   $nome_utilizador = mysqli_real_escape_string($bd, $_POST['utilizadores']);
                   $motivo_ban = mysqli_real_escape_string($bd, $_POST['bans']);
                   $sql_ban = "UPDATE utilizadores SET activo = '0' WHERE nome_utilizador = '$nome_utilizador'";
                   $query_ban = mysqli_query($bd, $sql_ban);
                   $sql_ban_insert = "INSERT INTO bans (nome_utilizador,motivo,admin,data) VALUES ('$nome_utilizador','$motivo_ban','$admin',CURDATE())";
                   $query_ban_insert = mysqli_query($bd, $sql_ban_insert);
                   echo("<meta http-equiv='refresh' content='0'>");
                   echo '<script language="javascript">';
                   echo 'alert("Utilizador Banido com Sucesso.")';
                   echo '</script>';
               }
           ?>
         </form>
    </div>

    <p><br></p>

    <center>
      <table id="customers" border="1">
      <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Motivo</th>
        <th>Administrador</th>
        <th>Data</th>
      </tr>

    <?php
          $bd = mysqli_connect('localhost', 'root', '', 'pap2018');
    			$sql = "SELECT * FROM bans";
    			$query = mysqli_query($bd, $sql);
    			$res = mysqli_fetch_assoc($query);
    			do {

    			/*Buscar Dados do User Banido*/
    			$user = $res['nome_utilizador'];
    			$sql_user_ban = "SELECT * FROM bans WHERE nome_utilizador ='$user'";
    			$query_user_ban = mysqli_query($bd, $sql_user_ban);
    			$res_user_ban = mysqli_fetch_assoc($query_user_ban);
    			/*Buscar Dados do User Banido*/

          /*-----------*/
          $sql_user = "SELECT * FROM utilizadores WHERE nome_utilizador = '$user'";
          $query_user = mysqli_query($bd, $sql_user);
          $res_user = mysqli_fetch_assoc($query_user);
          /*-----------*/

    ?>

    	<tr>
        <td><a href="../Paginas/perfil_user.php?<?php echo $res_user['id_utilizador'];?>"><?php echo utf8_encode($res_user['nome_utilizador']); ?></a></td>
        <a href=""></a>
        <td><?php echo $res_user['email'];?></td>
        <td><?php echo $res_user_ban['motivo'];?></td>
        <td><?php echo $res_user_ban['admin']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($res_user_ban['data'])); ?></td>
        <?php }while($res = mysqli_fetch_assoc($query));?>
      </tr>
    </table>
  </center>

<p><br></p>

<center><h4>Remover Ban Utilizador</h4></center>
    <div class="remover-ban">
      <form method="POST">
        <a>Nome:</a>
          <select id="select" name="utilizadores_banidos">
            <option value="" disabled="" selected="" style="display: none" >Selecione o Utilizador</option>
                      <optgroup label="Utilizadores Banidos">
                      <?php
                      $sql = "SELECT * FROM bans";
                      $query = mysqli_query($bd, $sql);
                      $res = mysqli_fetch_assoc($query);
                      do {?>
                      <option name="<?php echo $res['nome_utilizador'];?>"><?php echo utf8_encode($res['nome_utilizador']);?></option>
                      <?php } while($res = mysqli_fetch_assoc($query));?>
                      </optgroup>
                  </select>
                      <button name="btn_remover_ban" class="btn_remover_ban">Remover Ban</button>
      </form>
      <?php
          if(isset($_POST['btn_remover_ban'])) {
              $utilizador_banido = mysqli_real_escape_string($bd, $_POST['utilizadores_banidos']);
              $sql_ban_remove = "UPDATE utilizadores SET activo = '1' WHERE nome_utilizador = '$utilizador_banido'";
              $query_ban_removes = mysqli_query($bd, $sql_ban_remove);
              $sql_remove_ban = "DELETE FROM bans WHERE nome_utilizador = '$utilizador_banido'";
              $query_ban_remove = mysqli_query($bd, $sql_remove_ban);
              echo("<meta http-equiv='refresh' content='0'>");
          }
      ?>
    </div>

  </div>

</div>

<script>
// Get the modal
var banir_modal = document.getElementById("myModalBanir");

// Get the button that opens the modal
var btn = document.getElementById("myBtns");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closebanir")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  banir_modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  banir_modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == banir_modal) {
    banir_modal.style.display = "none";
  }
}
</script>


</body>
</html>
