<?php
    require 'vendor/autoload.php';

	if(isset($_POST['Reset'])){
		$host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
		$user ="fair_admin";
		$passwordAdmin = "KiwanisClub";
		$db = "applications";
		$con = new mysqli($host, $user, $passwordAdmin, $db);
		session_start();
		
		$email = $con->escape_string($_POST['Email']);
		$address = $con->escape_string($_POST['address']);
		
		$sql = "SELECT * FROM applications.users WHERE (email = '".$email."' AND security='".$address."')";
		$result = $con->query($sql);
		
		if( $result->num_rows == 0){
		    echo '<script>alert("User with that email or address does not exist!");window.location.href="/views/forgot.php";</script>';
		}
		else{
		    echo '<script>alert("You may now reset your password.");window.location.href="/views/reset.php"</script>';
		}	
	}
?>