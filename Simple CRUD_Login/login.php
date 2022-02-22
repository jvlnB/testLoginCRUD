<!DOCTYPE html> 
<meta charset="UTF-8">
<html> 	
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>LOGIN</title>	
	</head>
<body>
    <center>
    <h2>LOGIN</h2>
   <?php  echo "login"; ?>
    <form action="includes/login_include.php" method="post">
<input type="text" name="uname" placeholder="Username"></input><br><br>
<input type="password" name="pass" placeholder="Password"></input><br><br>
<button type="text" name="login">LOGIN</button>

    </form>
</center>