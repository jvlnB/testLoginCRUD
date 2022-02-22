<?php
session_start();
include('includes/authentication.php');	
	if(isset($_GET['Delete'])){

			$Delete_id = $_GET['Delete'];

			$Delete = "DELETE FROM user_login WHERE id='$Delete_id'";
			
			$ejecutar = sqlsrv_query($oConn, $Delete);

			if($ejecutar){
				echo"
				<script>
				Swal.fire({
					title: 'Success!',
					text: 'Deleted Successfully!',
					icon: 'success',
					confirmButtonText: 'OK'
				  })
				</script>";
			}	else {
				echo"
				<script>
				Swal.fire({
					title: 'Error!',
					text: 'Something Went Wrong!',
					icon: 'warning',
					confirmButtonText: 'OK'
				  })
				</script>";			}
		}
?>