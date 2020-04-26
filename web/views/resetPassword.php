<?php
	$host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
	$user ="fair_admin";
	$passwordAdmin = "KiwanisClub";
	$db = "applications";
	$con = new mysqli($host, $user, $passwordAdmin, $db);
	session_start();
	
	if(isset($_POST['Reset'])){
		if($_POST['newPassword'] == $_POST['confirmPassword']){
			$newPassword = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);
			
			$email = $_SESSION['email'];
			$hash = $_SESSION['hash'];
			
			$sql = "UPDATE applications.users SET password= '".$newPassword."', hash=$hash WHERE email = $email";
			if($con->query($sql)){
			echo '<script>alert("Your password has been reset");window.location.href="/views/login.php";</script>';
			}
		}
		else{
		echo '<script>alert("Your password do not match, try again.");window.location.href="/views/reset.php";</script>';
		}	
	}
?>