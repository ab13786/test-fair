<?php
	if(isset($_POST['Signup'])){
		$host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
		$user ="fair_admin";
		$passwordAdmin = "KiwanisClub";
		$db = "applications";
		$con = new mysqli($host, $user, $passwordAdmin, $db);
		session_start();
		
		$_SESSION['email'] = $_POST['Email'];

		$email = $con->escape_string($_POST['Email']);
		$password = $con->escape_string(password_hash($_POST['Password'],PASSWORD_BCRYPT));
		$hash = $con->escape_string(md5(rand(0,1000)));
		
		$sql = "SELECT * FROM applications.users WHERE email= '".$email."'";
		$result = $con->query($sql);
		if( $result->num_rows >0){
			$_SESSION['message'] = 'User with this email already exists!';
			header("location: /views/error.php");
		}
		else{
			$sql = "INSERT INTO applications.users (email,password,hash)
				VALUES("."'".$email."', '".$password."','" .$hash."');";
				
			if($con->query($sql)){
				$_SESSION['active'] = 1;
				$_SESSION['logged_in'] = true;
				$_SESSION['message'] = "account created!";
				header("location: /views/success.php");
				/*$_SESSION['message'] = "Confirmation link has been sent to ".$email.", 
					please verify your account by lciking on the link in the message!";
				header("location: success.php");
				
				$to = $email;
				$subject = 'Account Verifcation (someWebsiteHere.com)';
				$message_body ='
				Hello user,
				
				Thank you for signing up!
				Please click this link to activate your account:
				
				http://http://localhost:3307/Fairapp/views/verify.php?email=' .$email. '&hash='.$hash;
				
				$mail = mail($to, $subject, $message_body);
				if($mail){
					$_SESSION['message'] = "Thank you for using mail form";
					header("location: success.php");
				}
				else{
					$_SESSION['message'] = "Mail sending failed.";
					header("location: error.php");
				}
				
				//header("location: login.php");*/
			}
			else{
				$_SESSION['message'] = 'Registration failed!';
				header("location: /views/error.php");
			}
		}
	}
?>