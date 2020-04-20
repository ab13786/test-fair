<?php
	if(isset($_POST['Login'])){
		$host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
		$user ="fair_admin";
		$passwordAdmin = "KiwanisClub";
		$db = "applications";
		$con = new mysqli($host, $user, $passwordAdmin, $db);
		session_start();
	
		$email = $con->escape_string($_POST['Email']);
		$sql = "SELECT * FROM applications.users WHERE id="'24'"";
		$result = $con->query($sql);
		
		if($result->num_rows==0){
			$_SESSION['message'] = "User with that email doesn't exist!";
			header("location: /views/error.php");
		}
		else{
			$user = $result->fetch_assoc();
			if( password_verify($_POST['Password'], $user['password'])){
				$_SESSION ['Email'] = $user['email'];;
				$_SESSION ['active'] = $user['active'];
			
				$_SESSION['logged_in'] = true;
				header("location: /views/main.html");
			}
			else {
			    echo "<script type='text/javascript'>alert('You have entered the wrong password, try again!');</script>";
				$_SESSION['message'] = "You have entered the wrong password, try again!";
				header("location: /views/error.php");
			}
		}
	}
?>