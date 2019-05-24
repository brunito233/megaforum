<?php
  session_start();
  include('header2.php');
  include('servidor.php');
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title></title>
    <!--Estilo do More.php-->
    <link rel="stylesheet" type="text/css" href="../CSS/more.css">
    <!--Ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--Textarea-->
    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=enjkmvqbvv5ad8ey4z76voi9xt79co2k7l20kiqs8isbgdh7"></script>
    <script> tinymce.init({ selector: '#mytextarea' }); </script>
    <script> tinymce.init({ selector: '#mytextarea_1' }); </script>

  </head>
  <?php

   $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
   $id = substr($url, strrpos($url, '=') + 1);
   $_SESSION['id_topico'] = $id; //Id do Topico;

   $sql_topico = "SELECT * FROM topicos WHERE id_topico = '$id'";
   $query_topico = mysqli_query($bd, $sql_topico);
   $res_topico = mysqli_fetch_assoc($query_topico);
   $id_ut_login = $_SESSION['id_utilizador'];

   do {
     //A variavel $id_titulo vai tomar o valor do id titulo da Tabelas Topicos
     $id_titulo = $res_topico['id_titulo'];//ID do Titulo do Topico
     //Com o ID do Titulo vai a Tabela Titulo buscar os dados do titulo
     $sql_titulo = "SELECT * FROM titulo WHERE id_titulo = '$id_titulo'";
     $query_titulo = mysqli_query($bd, $sql_titulo);
     $res_titulo = mysqli_fetch_assoc($query_titulo);
     $titulo = $res_titulo['titulo'];


     //Variavel id_utilizador toma o valor do id do utilizador da Tabela Topicos
     $id_utilizador = $res_topico['id_utilizador']; //ID do Utilizador do Topico
     //Com o ID do utilizador vai a tabela Utilizadores buscar os dados do Utilizador
     $sql_utilizador = "SELECT * FROM utilizadores WHERE id_utilizador = '$id_utilizador'";
     $query_utilizador = mysqli_query($bd, $sql_utilizador);
     $res_utilizador = mysqli_fetch_assoc($query_utilizador);
     $nome_utilizador = $res_utilizador['nome_utilizador']; //Nome do Utilizador do Topico
     $data_registo = $res_utilizador['data_registo']; //Data de Registo do Utilizador do Topico
     $rank = $res_utilizador['type']; //Tipo de Utilizador: 1->Administrador; 2->Utilizador;
      if($rank == 1) {
        $rank = "Administrador";
      }else {
        $rank = "Utilizador";
      }

      //Variavel id_categoria toma o valor do id da categoria da Tabela Topicos
      $id_categoria = $res_topico['id_categoria'];
      //Com o ID da categoria vai a Tabela categoria buscar os dados da Categoria
      $sql_categoria = "SELECT * FROM categoria WHERE id_categoria = '$id_categoria'";
      $query_categoria = mysqli_query($bd, $sql_categoria);
      $res_categoria = mysqli_fetch_assoc($query_categoria);
      $categoria = $res_categoria['categoria']; //Categoria do Topico

      //Variavel id_assunto toma o valor do id assunto da Tabela Topicos
      $id_assunto = $res_topico['id_assunto'];
      //Com o id do assunto vai a tabela Assunto buscar os dados do assunto_editar
      $sql_assunto = "SELECT * FROM assunto WHERE id_assunto = '$id_assunto'";
      $query_assunto = mysqli_query($bd, $sql_assunto);
      $res_assunto = mysqli_fetch_assoc($query_assunto);
      $assunto = $res_assunto['assunto']; //Assunto do Topico

      //Verifica se o utilizaodr que esta logado é Administrador
      $id_utilizador_logado = $_SESSION['id_utilizador'];
      $sql_adm = "SELECT * FROM utilizadores WHERE id_utilizador = '$id_utilizador_logado'";
      $query_adm = mysqli_query($bd, $sql_adm);
      $res_adm = mysqli_fetch_assoc($query_adm);
      $rank_utilizador = $res_adm['type']; //Pega o tipo de Utilizador Logado
  ?>
  <body>

    <!--Topico Header-->
    <div class="title_topic">
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
                <dd class="profile-rank"><?php echo $rank; ?></dd>
                <dd class="profile-joined"><strong>Joined:</strong><?php echo date('d-m-Y', strtotime($data_registo));?></dd>
                <?php if(isset($_SESSION['username'])){ // Se estivar Logado Mostra o Botão do Like ?>

                <!---Botao do Like-->

                  <form method="POST" class="forms">
                    <button class="btn_like" name="like_btn" style="display: none;"><i class="fas fa-thumbs-up"></i></button>
                  </form>

                <?php
                  $sql_ver_like = "SELECT * FROM likes WHERE id_topico = '$id' AND id_utilizador = '$id_ut_login'";
                  $query_ver_like = mysqli_query($bd, $sql_ver_like);
                  $cont_ver_like = mysqli_num_rows($query_ver_like);
                  $res_like = mysqli_fetch_assoc($query_ver_like);
                  $id_like = $res_like['id_like'];
                    if($cont_ver_like > 0) {
                ?>

                <form method="POST" class="forms">
								    <button name="btn_remove_like_<?php echo $id_like;?>" class="btn_like_1"><i class="fas fa-thumbs-up"></i></button>
                </form>
                <?php
										if(isset($_POST['btn_remove_like_'.$id_like])) {
                      $sql_remove_like = "DELETE FROM likes WHERE id_like = '$id_like'";
										  $query_remove_like = mysqli_query($bd, $sql_remove_like);
											echo("<meta http-equiv='refresh' content='0'>");
									  }
											}else{
                ?>

								<form method="POST" class="forms">
								    <button name="btn_like" class="btn_like"><i class="fas fa-thumbs-up"></i></button>
                </form>
							   <?php
								     if(isset($_POST['btn_like'])) {
										   $sql_like = "INSERT INTO likes (id_topico,id_utilizador) VALUES ('$id','$id_ut_login')";
										   $query_like = mysqli_query($bd, $sql_like);
										   echo ("<meta http-equiv='refresh' content='0'>");
										 }
										}
								 ?>

                <!---Botao do Like-->

                <!--Botao Editar Topico-->

                <?php if($rank_utilizador == 1){ ?>
                    <button class="btn_editar_adm" id="btn_editar" onclick="abrir();"><i class="fas fa-edit"></i></button>
                    <!-- The Modal -->
                      <div id="modal_editar" class="edit-modal">
                        <!-- Modal content -->
                          <div class="editar-modal-content">
                            <span class="close-edit" onclick="fechar();">&times;</span>
                            <h3>Editar Topico</h3><br>
                            <div class="editar-content">
                              <!--Titulo-->
                              <input name="titulo_editar" class="form-control" type="text" required="true" id="titulo" value='<?php echo $titulo;?>'>

                              <select id="select" name="categoria" required="true">
                                <option selected disabled hidden><?php echo $res_cat['categoria']; ?></option>

                                <!--FORUM TECH-->

                                <optgroup label="Forum Tech">
                                  <?php
                                    $sql = "SELECT * FROM categoria WHERE type = '1'";
                                    $query = mysqli_query($bd, $sql);
                                    $res = mysqli_fetch_assoc($query);
                                      do {
                                  ?>
                                <option value="<?php echo $res['id_categoria'];?>"><?php echo $res['categoria'];?></option>
                                  <?php } while($res = mysqli_fetch_assoc($query));?>
                                </optgroup>

                                <!--FORUM TECH-->

                                <!--Desenvolvimento WEB-->

                                <optgroup label="Desenvolvimento Web">
                                  <?php
                                    $sql = "SELECT * FROM categoria WHERE type = '2'";
                                    $query = mysqli_query($bd, $sql);
                                    $res = mysqli_fetch_assoc($query);
                                      do {
                                  ?>
                                <option value="<?php echo $res['id_categoria'];?>"><?php echo $res['categoria'];?></option>
                                  <?php } while($res = mysqli_fetch_assoc($query));?>
                                </optgroup>

                                <!--Desenvolvimento WEB-->

                                <!--Desenvolvimento Geral-->

                                <optgroup label="Desenvolvimento Geral">
                                  <?php
                                    $sql = "SELECT * FROM categoria WHERE type = '3'";
                                    $query = mysqli_query($bd, $sql);
                                    $res = mysqli_fetch_assoc($query);
                                      do {
                                  ?>
                                <option value="<?php echo $res['id_categoria'];?>"><?php echo $res['categoria'];?></option>
                                  <?php } while($res = mysqli_fetch_assoc($query));?>
                                </optgroup>

                                <!--Desenvolvimento GERAL-->

                                <!--Base de Dados-->

                                <optgroup label="Base de Dados">
                                  <?php
                                    $sql = "SELECT * FROM categoria WHERE type = '4'";
                                    $query = mysqli_query($bd, $sql);
                                    $res = mysqli_fetch_assoc($query);
                                    do {
                                  ?>
                                <option value="<?php echo $res['id_categoria'];?>"><?php echo $res['categoria'];?></option>
                                  <?php } while($res = mysqli_fetch_assoc($query));?>
                                </optgroup>

                                <!--Base de Dados-->
                              </select><br>

                              <!--Textarea-->

                              <textarea id="mytextarea_1" name="assunto_editar" required="TRUE"></textarea>

                              <!--Textarea-->

                              <!--Botao Editar Topico-->

                              <form method="POST">
                                <button name="btn_editar" class="btn_editar">Editar Topico</button>
                              </form>

                              <!--Botao Editar Topico-->

                              <!--Botão Eliminar Topico-->

                              <form method="POST">
                                <button name="btn_eliminar_topico" class="btn_eliminar_topico">Eliminar Topico</button>
                              </form>

                              <!--Botão Eliminar Topico-->

                            </div>
                          </div>
                      </div>
                      <script src="../JS/modal.js"></script>

                <?php }else{} // Fechar o Botao Mostar o botao Editar se for Adm que tivir logado?>
                <?php }else{} //Fechar o "Se estivar Logado Mostra o Botão do Like"?>
              </dl>
            </div>
            <div class="postbody">
              <div id="post_content_topico">
                <h3 class="first"><a href="#"><?php echo $titulo;?></a></h3>
                <p class="author"><span class="responsive-hide">by <strong><a href="../Paginas/perfil_user.php?<?php echo $id_utilizador; ?>"><?php echo $nome_utilizador; ?></a></strong> <i class="fa fa-angle-double-right"></i> <?php echo $categoria; ?></span></p>
                <div class="content"><?php echo $assunto; ?></div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <?php }while($res_topico = mysqli_fetch_assoc($query_topico));?>
    </div>
    <!--Topico Header-->

    <?php
      $sql_resposta = "SELECT * FROM respostas WHERE id_topico = '$id'";
      $query_resposta = mysqli_query($bd, $sql_resposta);
      $res_resposta = mysqli_fetch_assoc($query_resposta);
      $contagem_resposta = mysqli_num_rows($query_resposta);

      do {

        //A Variavel $id_utilizador vai tomar o valor do id do utilizador da tabela Respostas Selecionado
        $id_utilizador = $res_resposta['id_utilizador']; //ID do Utilizador das Respostas
        //Pega na Variavel que contem o id do utilizador da resposta e vai buscar os dados do Utilizador
        $sql_utilizador_resposta = "SELECT * FROM utilizadores WHERE id_utilizador = '$id_utilizador'";
        $query_utilizador_resposta = mysqli_query($bd, $sql_utilizador_resposta);
        $res_utilizador_resposta = mysqli_fetch_assoc($query_utilizador_resposta);
        $nome_utilizador = $res_utilizador_resposta['nome_utilizador']; //Nome do Utilizador das Respostas
        $data_registo = $res_utilizador_resposta['data_registo']; //Data de Registo do Utilizador das Resposta
        $rank = $res_utilizador_resposta['type']; //Tipo de Utilizador: 1->Administrador; 2-> Utilizador;
          if($rank == 1) {
            $rank = "Administrador";
          }else {
            $rank = "Utilizador";
          }

          if($contagem_resposta > 0 ) {
            $id_resposta = $res_resposta['id_respostas']; //ID da Resposta
            $resposta = $res_resposta['resposta']; //Resposta do Utilizador
            $data_resposta = $res_resposta['hora'];

    ?>

    <!--Respostas-->
    <div class="title_topic">
      <span class="topic-list-header--resposta"></span>
      <div class="topic-list--content">
        <ul>
          <li>
            <div class="topic--post post has-profile">
              <dl class="postprofile">
                <dt class="has-profile-rank no-avatar">
                  <div class="avatar-container"></div>
                  <br>
                </dt>
                <dd class="profile-rank"><?php echo $rank; ?></dd>
                <dd class="profile-joined"><strong>Joined:</strong><?php echo date('d-m-Y', strtotime($data_registo));?></dd>
              </dl>
            </div>
            <div class="postbody">
              <div id="post_content_topico">
                <p class="author"><span class="responsive-hide">by <strong><a href="../Paginas/perfil_user.php?<?php echo $id_utilizador; ?>"><?php echo $nome_utilizador; ?></a></strong> <i class="fa fa-angle-double-right"></i> <?php echo $data_resposta; ?></span></p>
                <div class="content"><?php echo $resposta; ?></div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    <?php } }while($res_resposta = mysqli_fetch_assoc($query_resposta));?>
    </div>
    <!--Respostas-->

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

    <?php if(isset($_SESSION['username'])){ //Se estiver logado mostra a textarea e o botão ?>

    <div class="respostas">
			<textarea id="mytextarea"></textarea>
			<button name="btn_comentar" class="btn_comentar" onclick="return comentarios(window.location.reload());">Comentar</button>
		</div>

    <?php } //Se não estiver logado não mostra ?>

  </body>
</html>
