<div class="bar_topicos">
	<h4><i class="fas fa-file-alt"></i> Topicos </h4>	
</div>
<?php 
			$bd = mysqli_connect('localhost', 'root', '', 'pap2018');
			$sql = "SELECT * FROM topicos";
			$query = mysqli_query($bd, $sql);
			$res = mysqli_fetch_assoc($query);
			do {
				$id_topico = $res['id_topico'];
				$id_topico = $res['id_categoria'];
				/*Buscar titulo dos Topicos*/
				$id = $res['id_titulo'];
				$sql_id = "SELECT * FROM titulo WHERE id_titulo ='$id'";
				$query_id = mysqli_query($bd, $sql_id);
				$res_id = mysqli_fetch_assoc($query_id);
				/*Buscar titulo dos Topicos*/

				/*Buscar assunto dos Topicos*/
				$assunto = $res['id_assunto'];
				$sql_assunto = "SELECT * FROM assunto WHERE id_assunto ='$assunto'";
				$query_assunto = mysqli_query($bd, $sql_assunto);
				$res_assunto = mysqli_fetch_assoc($query_assunto);
				/*Buscar assunto dos Topicos*/

				/*Buscar user dos Topicos*/
				$user = $res['id_utilizador'];
				$sql_user = "SELECT * FROM utilizadores WHERE id_utilizador ='$user'";
				$query_user = mysqli_query($bd, $sql_user);
				$res_user = mysqli_fetch_assoc($query_user);
				$img_user = $res_user['foto'];
				/*Buscar user dos Topicos*/

				/*Buscar nºrespostas*/
				$id_topico = $res['id_topico'];
				$result = mysqli_query($bd, "SELECT COUNT(id_topico) AS id_topico FROM respostas
				WHERE id_topico= '$id_topico'");
				$row = mysqli_fetch_array($result);
				$count_respostas = $row['id_topico'];
				/*Buscar nºrespostas*/

				$id_categoria = $res['id_categoria'];
				$sql_cat = "SELECT * FROM categoria WHERE id_categoria = '$id_categoria'";
				$query_cat = mysqli_query($bd, $sql_cat);
				$res_cat = mysqli_fetch_assoc($query_cat);
				
				/*Buscar nlikes*/
				$result = mysqli_query($bd, "SELECT COUNT(id_like) AS id_like FROM likes
				WHERE id_topico = '$id_topico'");
				$row = mysqli_fetch_array($result);
				$count_nlikes = $row['id_like'];
				/*Buscar nlikes*/


				if($res['mostrar'] == 0 ) {
			?>
			<div class="topicos_content">
				<div class="topico_icon">
					<i class="fa fa-comment"></i>
				</div>
				<div class="topico_title">
					<h2><a href="Paginas/more.php?id=<?php echo $id_topico; ?>"><?php echo utf8_encode($res_id['titulo']);?></a></h2>
					<p class="post-by">by<a href="Paginas/perfil_user.php?<?php echo $user;?>"> <?php echo $res_user['nome_utilizador'];?> </a> <i class="fa fa-angle-double-right"></i> <?php echo utf8_encode($res_cat['categoria']);?> <i class="fa fa-angle-double-right"></i></p>
				</div>
				<div class="topico_stats">
					<p><strong><?php echo $count_respostas;?></strong> <i class="fas fa-comment-dots"></i></p>
					<p><strong><?php echo $count_nlikes; ?></strong> <i class="fas fa-thumbs-up"></i></p>
				</div>
			</div>
		<?php
		}
			}while($res = mysqli_fetch_assoc($query));
		?>