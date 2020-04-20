<?php
session_start();

?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Kiwanis Fair - Error</title>
		<link href="/stylesheets/login.css" type="text/css" rel="stylesheet">
	</head>
	<body>
	<form >
		<h1>Error</h1>
		<p>
		<?php
			if( isset($_SESSION['message']) AND !empty($_SESSION['message'])):
				header("location: /views/login.php");
			else:
				header("location: /views/login.php");
			endif;
		?>
		</p>
		<input type = "submit" value ="Signup" class= "submission">
	</form>
	</body>
</html>