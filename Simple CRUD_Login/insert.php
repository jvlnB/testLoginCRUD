<?php
include('includes/authentication.php');
require_once('dbconn.php');

if(isset($_POST['insert'])){

$user = $_POST['username'];
$pwd = $_POST['password'];
$email = $_POST['email'];
//echo $user, $pwd, $email;

		// if(isset($_POST['insert'])){
		// 	$Tusername = $_POST['username'];
		// 	$Tpassword = $_POST['password'];
		// 	$Temail = $_POST['email'];
			
			$checkDupli = sqlsrv_query($oConn, "SELECT * FROM user_login WHERE username LIKE '$user' or email LIKE '$email'");
			$checkDupli_run = sqlsrv_fetch_array($checkDupli);
			if ($checkDupli_run)
			{
				 echo "
				<script>
				Swal.fire({
					title: 'Error!',
					text: 'Existing!',
					icon: 'error',
					confirmButtonText: 'OK'
				  })
				</script>";
			} else {
		$InsertAccount = "INSERT INTO  user_login(username, password, email) VALUES ('$user', '$pwd', '$email')";
		$insert_run= sqlsrv_query($oConn, $InsertAccount);

			if($insert_run){
				echo"
				<script>
				Swal.fire({
					title: 'Success!',
					text: 'Inserted Successfully!',
					icon: 'success',
					confirmButtonText: 'OK'
				  })
				</script>";

			}
			}

		}
