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
		<title>Change Password</title>
		<script src="https://kit.fontawesome.com/b26b33266f.js" crossorigin="anonymous"></script>
		<link type="text/css" rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<?php
			$username = $password = $cpassword = "";
			if(isset($_POST["change"])){
				$username = $_POST["username"];
				$password = $_POST["password"];
				$npassword = $_POST["npassword"];
				
					$query = "SELECT * from userinfo WHERE username ='$username' AND password = '$password'";
					// Perform query against a database
					// https://www.php.net/manual/en/mysqli.query.php
					// https://www.w3schools.com/php/func_mysqli_query.asp => mysqli_query(connection, query, resultmode)

					$query_run = mysqli_query($con, $query);

					// https://www.w3schools.com/php/func_mysqli_num_rows.asp
					// returns the number of rows in a result set   => mysqli_num_rows(result);
					if(mysqli_num_rows($query_run)>0){
						$query = "UPDATE userinfo SET password = '$npassword' WHERE username = '$username'";
						$query_run = mysqli_query($con, $query);
						echo "<script> alert('Password changed')</script>";
					}else{
							echo "<script> alert('Unable to change password')</script>";
						}
				}
		?>
		
		<div>
			<h1>
				UPDATE
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
						<input type="password" placeholder="Old Password" name = "password" required>
					</div>

					<div class = "loginfield">
						<span style="font-size: 20px; color: white;">
							<i class="fas fa-lock"></i>
						</span>
						<input type="password" placeholder="New Password" name = "npassword" required>
					</div>
					
					<div>
						<input type="submit" id="chgbtn" value="Change password" name="change">
						<br>
						<input type="button" id="backbtn" value="Back to Login Page" onclick= "window.location.href = 'index.php'">
					</div>
				</form>
			</h2>
		</div>

	</body>
</html>