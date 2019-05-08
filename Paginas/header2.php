<?php 
  include 'servidor.php';
?>
<link rel="stylesheet" type="text/css" href="../CSS/header.css">
<div class="header">
  <!-- Header do Forum -->
    <h2 class="logo"><a href="../index.php">Mega Forum</a></h2>
    <ul class="menu">
      <a href="#"><i class="fas fa-users"></i> Membros</a>
      <a href="#"><i class="fas fa-question-circle"></i> FAQ</a>
    </ul>
    <!-- Header do Forum -->

    <ul class="header-login-menu">
       <?php if(isset($_SESSION['username'])){?>
      <a href="#"><i class="fas fa-plus"></i></a>
      <a href="#"><i class="fas fa-cog"></i></a>
      <?php 
          $id_utilizador = $_SESSION['id_utilizador'];
          $sql = "SELECT * FROM utilizadores WHERE id_utilizador = '$id_utilizador'"; 
          $query = mysqli_query($bd,$sql);
          $res = mysqli_fetch_assoc($query);
          if($res['type'] == 1){?>
      <a href="#"><i class="fas fa-users-cog"></i></a>
        <?php }?>
      <a href="../Paginas/perfil_user.php?<?php echo $_SESSION['id_utilizador'];?>"><?php echo utf8_encode($_SESSION['username']);?></a>
      <a href="../index.php?logout=1"><i class="fas fa-sign-out-alt"></i></a>
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
            <input type="submit" name="btn_login2" value="Login" class="submit-btn" onclick="return(valida_form())">
          </form>
        </div>
      </div>
    </div>
    <?php 
    if(isset($_POST['btn_login2'])){
    $email = mysqli_real_escape_string($bd , $_POST['email']); 
    $password = mysqli_real_escape_string($bd , $_POST['pass']); 
    $sql = "SELECT * FROM utilizadores WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($bd,$sql);
      $cont = mysqli_num_rows($result);
      $res = mysqli_fetch_assoc($result);
      if($cont == 1 ){
        do {
          $id_utilizador_logado = $_SESSION['id_utilizador'];
          $username = $res['nome_utilizador'];
          $id = $res['id_utilizador'];
          $_SESSION['id_utilizador'] = $id;
          $_SESSION['username'] = $username;
          $_SESSION['email'] = $email;
          $_SESSION['password'] = $password;
          $_SESSION['foto'] = $res['foto'];
        }while ($res = mysqli_fetch_assoc($result));
        header('location: ../index.php?page=home');
  }
  }
    ?>
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

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>

  </div>
