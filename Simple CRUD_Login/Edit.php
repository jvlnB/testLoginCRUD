<?php	
	if(isset($_GET['Edit'])){
			$Edit_id = $_GET['Edit'];

			$consulta = "SELECT * FROM user_login WHERE id ='$Edit_id'";
			$ejecutar = sqlsrv_query($oConn, $consulta);

			$fila = sqlsrv_fetch_array($ejecutar);

			$username = $fila['username'];
			$password = $fila['password'];
			$email = $fila['email'];
		}

?>

<br />

<div class="col-md-8 col-md-offset-2">
		<form method="POST" action="">
			<div class="form-group">
				<label>Username:</label>
				<input type="text" name="username" class="form-control" value="<?php echo $username; ?>"><br required/>
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input type="password" name="password" class="form-control" value="<?php echo $password; ?>"><br required/>
			</div>
			<div class="form-group">
				<label>Email:</label>
				<input type="email" name="email" class="form-control" value="<?php echo $email; ?>"><br required/>
			</div>
			<div class="form-group">				
				<input type="submit" name="Update" class="btn btn-warning" value="Update"><br />
			</div>
		</form>
</div>

<?php

	if(isset($_POST['Update'])){
			$TUsername = $_POST['username'];
			$TPassword = $_POST['password'];
			$TEmail = $_POST['email'];

			$checkDupliUname = sqlsrv_query($oConn, "SELECT * FROM user_login WHERE username = '$TUsername'");
			$checkDupli_run = sqlsrv_fetch_array($checkDupliUname);

			$checkDupliMail = sqlsrv_query($oConn, "SELECT * FROM user_login WHERE email = '$TEmail'");
			$checkDuplimail_run = sqlsrv_fetch_array($checkDupliMail);

			if ($TUsername!=$username && $checkDupli_run > 0){ 
				echo"
				<script>
				Swal.fire({
					title: 'Error!',
					text: 'Username already exist!',
					icon: 'error',
					confirmButtonText: 'OK'
				  })
				</script>";
			} else if ($TEmail!=$email && $checkDuplimail_run > 0)
			{
				echo"
				<script>
				Swal.fire({
					title: 'Error!',
					text: 'Email already exist!',
					icon: 'error',
					confirmButtonText: 'OK'
				  })
				</script>";
			} else {

			$consulta = "UPDATE user_login SET username ='$TUsername', password ='$TPassword', email ='$TEmail' WHERE id ='$Edit_id'";
			$ejecutar = sqlsrv_query($oConn, $consulta);

			if($ejecutar){
				echo"
				<script>
				Swal.fire({
					title: 'Success!',
					text: 'Updated Successfully!',
					icon: 'success',
					confirmButtonText: 'OK'
				  })
				</script>";
				}	
			}		
		}

?>