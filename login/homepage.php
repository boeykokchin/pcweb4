<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Welcome</title>
		<script src="https://kit.fontawesome.com/b26b33266f.js" crossorigin="anonymous"></script>
		<link type="text/css" rel="stylesheet" href="http://localhost/login/css/style.css">
			
	</head>
	<body>
		
		<div>
			<h1>
                <!--  superglobals $_GET and $_POST are used to collect form-data.   -->
                <!--  Always accessible, regardless of scope, can access them from any function, class or file   -->
                <!--  without having to do anything special.  -->
                <!--  $_GET["value"] - secure way of processing   -->
				Welcome <?= $_GET['user']; ?>!
			</h1>

		</div>

	</body>
</html>