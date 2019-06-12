<link rel="stylesheet" type="text/css" href="CSS/header.css">
<div class="header">
  <!-- Header do Forum -->
    <h2 class="logo"><a href="index.php">Mega Forum</a></h2>
    <ul class="menu">
      <a href="#"><i class="fas fa-users"></i> Membros</a>
      <a href="#"><i class="fas fa-question-circle"></i> FAQ</a>
    </ul>
    <!-- Header do Forum -->

    <ul class="header-login-menu">
       <?php if(isset($_SESSION['username'])){?>
      <a href="Paginas/creattopic.php"><i class="fas fa-plus"></i></a>
      <a href="Paginas/definicoes.php?<?php echo $_SESSION['id_utilizador'];?>"><i class="fas fa-cog"></i></a>
      <?php
          $id_utilizador = $_SESSION['id_utilizador'];
          $sql = "SELECT * FROM utilizadores WHERE id_utilizador = '$id_utilizador'";
          $query = mysqli_query($bd,$sql);
          $res = mysqli_fetch_assoc($query);
          if($res['type'] == 1){?>
      <a href="Paginas/admin.php"><i class="fas fa-users-cog"></i></a>
        <?php }?>
      <a href="Paginas/perfil_user.php?<?php echo $_SESSION['id_utilizador'];?>"><?php echo utf8_encode($_SESSION['username']);?></a>
      <a href="index.php?logout=1"><i class="fas fa-sign-out-alt"></i></a>
    <?php }else{?>
      <a href="index.php?page=register">Criar Conta</a>
      <span>/</span>
      <a href="#" id="myBtn">Iniciar Sessão</a>
    <?php } ?>
    </ul>

    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <div class="header-modal">
          <span class="close">&times;</span>
          <h4><i class="fas fa-users"></i> Login</h4>
        </div>
        <div class="modal-body">
          <form method="POST">
            <input type="text" name="email" id="email" placeholder="Email" class="form-control" onclick="remove()">
            <input type="password" name="pass" id="passe" placeholder="Palavra-Passe" class="form-control" onclick="remove()">
            <input type="submit" name="btn_login" value="Login" class="submit-btn" onclick="return(valida_form())">
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function valida_form() {
        if(document.getElementById('email').value === "" ){
          document.getElementById('email').style.border = "1px solid red";
          return false;
        }else {
          document.getElementById('email').style.border = "";
          if(document.getElementById('passe').value === "") {
            document.getElementById('passe').style.border = "1px solid red";
            return false;
          }
        }
      }

      function remove() {
        if(document.getElementById('email').style.border === "1px solid red") {
          document.getElementById('email').style.border = "";
        }else {
          if(document.getElementById('passe').style.border = "1px solid red") {
            document.getElementById('passe').style.border = "";
          }
        }
      }
    </script>
    <script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    </script>
  </div>
