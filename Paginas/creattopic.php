<?php
	session_start();
	include 'header2.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Criar Topico</title>
	<link rel="stylesheet" type="text/css" href="../CSS/creattopic.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=enjkmvqbvv5ad8ey4z76voi9xt79co2k7l20kiqs8isbgdh7"></script>
	<script> tinymce.init({ selector: '#mytextarea3' }); </script>
</head>
<body>
	<div class=control-navigation>
		<a href=""><i class="fas fa-align-center"></i></i> Criar Novo Topico</a>
	</div>
	<div class="posttopic">
		<form method="POST">
			<div class="posttopic-content" style="padding: 10px;">
				<input class="form-control" type="text" required="true" name="title" placeholder="Introduza o titulo do Topico" id="titulo" required="True">
			<select id="select" name="categoria" required="true">
				<option value="" disabled="" selected="" style="display: none" >Selecione a Categoria</option>
           		<optgroup label="Forum Tech">
                <?php
								//$bd = mysqli_connect ('sql107.alojamento-gratis.com','ljmn_24004633', 'b0kp5s8f' , 'ljmn_24004633_pap2018');
								$bd = mysqli_connect ('localhost','root', '' , 'pap2018');
                $sql = "SELECT * FROM categoria WHERE type = '1'";
                $query = mysqli_query($bd, $sql);
                $res = mysqli_fetch_assoc($query);
               	do {?>
                <option value="<?php echo $res['id_categoria'];?>"><?php echo $res['categoria'];?></option>
                <?php } while($res = mysqli_fetch_assoc($query));?>
                </optgroup>
                <optgroup label="Desenvolvimento Web">
                <?php
                $sql = "SELECT * FROM categoria WHERE type = '2'";
                $query = mysqli_query($bd, $sql);
                $res = mysqli_fetch_assoc($query);
                do {?>
               	<option value="<?php echo $res['id_categoria'];?>"><?php echo $res['categoria'];?></option>
               	<?php } while($res = mysqli_fetch_assoc($query));?>
                </optgroup>
               	<optgroup label="Desenvolvimento Geral">
                <?php
                $sql = "SELECT * FROM categoria WHERE type = '3'";
                $query = mysqli_query($bd, $sql);
                $res = mysqli_fetch_assoc($query);
               	do {?>
               	<option value="<?php echo $res['id_categoria'];?>"><?php echo $res['categoria'];?></option>
               	<?php } while($res = mysqli_fetch_assoc($query));?>
                </optgroup>
                <optgroup label="Base de Dados">
                <?php
                $sql = "SELECT * FROM categoria WHERE type = '4'";
                $query = mysqli_query($bd, $sql);
               	$res = mysqli_fetch_assoc($query);
              	do {?>
                <option value="<?php echo $res['id_categoria'];?>"><?php echo $res['categoria'];?></option>
                <?php } while($res = mysqli_fetch_assoc($query));?>
            	</optgroup>
        </select>
				<textarea name="assunto" class="form-control" id="mytextarea3" placeholder="Descrição"></textarea>
			</div>
	</div>
	<div class=control-btn>
			<center>
				<table>
					<tr>
						<td><input type="submit" name="btn_criar" value="Criar Topico"></td>
					</tr>
				</table>
			</center>
		</form>
	</div>
</body>
</html>
