<div class="container-register">
	<form method="POST">
		<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="username" id="username_login" onclick="remove()"> <i class="fas fa-times" id="x_1"></i></td>
				</tr>	
				<tr>
					<td>Email:</td>
					<td><input type="text" name="email_register" id="email_user" onclick="remove()"> <i class="fas fa-times" id="x_2"></i></td>
				</tr>
				<tr>
					<td>Palavra-Passe:</td>
					<td><input type="password" name="password" id="password_1" onclick="remove()"> <i class="fas fa-times" id="x_3"></i></td>
				</tr>
				<tr>
					<td>Confirmar Palavra-Passe:</td>
					<td><input type="password" name="password" id="password_2" onclick="remove()"> <i class="fas fa-times" id="x_4"></i></td>
				</tr>	
			</table>
		</div>
	<div class=control-btn>
			<center>
				<table>
					<tr>
						<td><input type="submit" name="btn_register" value="Registrar" onclick="return(valida_form2())"></td>
						<td><input type="submit" name="btn_cancelar" value="Cancelar"></td>
					</tr>
				</table>
			</center>	
		</form>
	</div>
	<script type="text/javascript">
		function valida_form2() {
			if(document.getElementById('username_login').value === "") {
				document.getElementById('username_login').style.border = "1px solid red";
				document.getElementById('x_1').style.display = "inline-block";
				return false;
			}else {
				if(document.getElementById('email_user').value === "") {
					document.getElementById('email_user').style.border = "1px solid red";
					document.getElementById('x_2').style.display = "inline-block";
					return false;
				}else {
					if(document.getElementById('password_1').value === "") {
						document.getElementById('password_1').style.border = "1px solid red";
						document.getElementById('x_3').style.display = "inline-block";
						return false;
					}else {
						if (document.getElementById('password_2').value === "") {
							document.getElementById('password_2').style.border = "1px solid red";
							document.getElementById('x_4').style.display = "inline-block";
							return false;
						}else {
							if(document.getElementById('password_1').value != document.getElementById('password_2').value) {
								document.getElementById('password_1').style.border = "1px solid red";
								document.getElementById('password_2').style.border = "1px solid red";	
								document.getElementById('x_3').style.display = "inline-block";
								document.getElementById('x_4').style.display = "inline-block";
								return false;
							}
						}
					}
				}
			}
		}

		function remove() {
			if(document.getElementById('username_login').style.border === "1px solid red") {
				document.getElementById('username_login').style.border = "";
				document.getElementById('x_1').style.display = "none";
			}else {
				if(document.getElementById('email_user').style.border === "1px solid red") {
					document.getElementById('email_user').style.border = "";
					document.getElementById('x_2').style.display = "none";
				}else {
					if(document.getElementById('password_1').style.border === "1px solid red") {
					document.getElementById('password_1').style.border = "";
					document.getElementById('x_3').style.display = "none";
					}else {
						if(document.getElementById('password_2').style.border === "1px solid red") {
							document.getElementById('password_2').style.border = "";
							document.getElementById('x_4').style.display = "none";
						}
					}
				}
			}
		}
	</script>
	</div>