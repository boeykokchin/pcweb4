<?php
    // require keyword is used to embed PHP code from another file. 
	// If the file is not found, a fatal error is thrown and the program stops
	require "dbconfig/config.php"
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link type="text/css" rel="stylesheet" href="css/style.css">
		<script src="https://kit.fontawesome.com/b26b33266f.js" crossorigin="anonymous"></script>		
	</head>
	<body>
		<?php
			$username = $password = "";
			if(isset($_POST["login"])){
				$username = $_POST["username"];
				$password = $_POST["password"];

				$query = "SELECT * from userinfo WHERE username = '$username' AND password = '$password' ";
				// Perform query against a database
				// https://www.php.net/manual/en/mysqli.query.php
				// https://www.w3schools.com/php/func_mysqli_query.asp => mysqli_query(connection, query, resultmode)
				$query_run = mysqli_query($con, $query);

				// https://www.w3schools.com/php/func_mysqli_num_rows.asp
				// returns the number of rows in a result set   => mysqli_num_rows(result);
				if(mysqli_num_rows($query_run) > 0){
					header("location:homepage.php?user=$username");
				}else{
					echo "<script> alert('Username or Password is incorrect.')</script>";
				}
			}
		?>
		
		<div>
			<h1>
				LOGIN
			</h1>

			<h2>
				<form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class = "loginbox">
					<div class = "loginfield">
						<span style="font-size: 20px; color: white;">
  							<i class="fas fa-user"></i>
						</span>
						<input type="text" placeholder="Your Username" name = "username" required>
					</div>

					<div class = "loginfield">
						<span style="font-size: 20px; color: white;">
							<i class="fas fa-lock"></i>
						</span>
						<input type="password" placeholder="Your Password" name = "password" required>
					</div>
					
					<div>
						<input type="submit" id="loginbtn" value="Login" name="login">
						<!-- window.location.href returns the href (URL) of the current page  -->
						<!-- window.location object can be used to get the current page address (URL) and to redirect the browser to a new page  -->
						<input type="button" id="regbtn" value="Register" onclick= "window.location.href = 'register.php'">
						<input type="button" id="chgbtn" value="Change Your Password" onclick= "window.location.href = 'changepassword.php'">
						<input type="button" id="delbtn" value="Delete Your Account" onclick= "window.location.href = 'delete.php'">
					</div>
				</form>
			</h2>
		</div>

	</body>
</html>