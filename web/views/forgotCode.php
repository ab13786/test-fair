<?php
	if(isset($_POST['Reset'])){
		$host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
		$user ="fair_admin";
		$passwordAdmin = "KiwanisClub";
		$db = "applications";
		$con = new mysqli($host, $user, $passwordAdmin, $db);
		session_start();
		
		$email = $con->escape_string($_POST['Email']);
		$address = $con->escape_string($_POST['address']);
		$newPassword = $con->escape_string($_POST['newPassword']);
		$confirmPassword = $con->escape_string($_POST['confirmPassword']);

		if($newPassword == $confirmPassword){
			$password = password_hash($newPassword, PASSWORD_BCRYPT);

		    $sql = "UPDATE applications.users SET password= '".$password."' WHERE email = '"$email"' AND address = '"$address"'";
		    $result = $con->query($sql)
			if($result){
			    echo '<script>alert("Your password has been reset");window.location.href="/views/login.php";</script>';
			}
			else{
			    echo '<script>alert("Your email or address is incorrect.");window.location.href="/views/forgot.php";</script>';
			}
		}
		else{
		    echo '<script>alert("Your password do not match, try again.");window.location.href="/views/forgot.php";</script>';
		}
	}
?>