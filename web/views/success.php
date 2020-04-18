<?php
session_start();

?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Kiwanis Fair - Success</title>
		<link href="/stylesheets/login.css" type="text/css" rel="stylesheet">
	</head>
	<body>
	<form >
		<h1>Success</h1>
		<p>
		<?php
			if( isset($_SESSION['message']) AND !empty($_SESSION['message'])):
				echo $_SESSION['message'];
			else:
				header("location: /views/login.php");
			endif;
		?>
		</p>
		<input type = "submit" value ="Signup" class= "submission">
	</form>
	</body>
</html>