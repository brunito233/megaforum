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
				<textarea required="true" name="assunto" class="form-control" id="desc" placeholder="Descrição" onclick="remove()"></textarea>
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