<?php
	if(isset($_POST['Login'])){
		$host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
		$user ="fair_admin";
		$passwordAdmin = "KiwanisClub";
		$db = "applications";
		$con = new mysqli($host, $user, $passwordAdmin, $db);
		session_start();
	
		$email = $con->escape_string($_POST['Email']);
		$id = 24;
		$sql = "SELECT * FROM applications.users WHERE (`id`=$id AND email = '".$email."')";
		$result = $con->query($sql);
		
		if($result->num_rows==0){
		    echo '<script>alert("User with that email does not exist!")</script>';
		    header("location: /views/login.php");
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
			    echo '<script>alert("You have entered the wrong password, try again!")</script>';
			    header("location: /views/login.php");
            }
		}
	}
?>