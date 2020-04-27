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

		$sql = "SELECT * FROM applications.users WHERE (email = '".$email."' AND address='".$address."')";
		$result = $con->query($sql);

		if( $result->num_rows == 0){
		    echo '<script>alert("User with that email or address does not exist!");window.location.href="/views/forgot.php";</script>';
		}

		if($_POST['newPassword'] == $_POST['confirmPassword']){
			$newPassword = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);

		    $sql = "UPDATE applications.users SET password= '".$newPassword."', hash=$hash WHERE email = $email AND address = $address";
			if($con->query($sql)){
			    echo '<script>alert("Your password has been reset");window.location.href="/views/login.php";</script>';
			}
		}
		else{
		echo '<script>alert("Your password do not match, try again.");window.location.href="/views/forgot.php";</script>';
		}
	}
?>