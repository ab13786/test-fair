<?php
	$host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
	$user ="fair_admin";
	$passwordAdmin = "KiwanisClub";
	$db = "applications";
	$con = new mysqli($host, $user, $passwordAdmin, $db);
	session_start();
	
	if( isset($_GET['email']) && !empty($_GET['email'])){
		$email = $con->escape_string($_GET['email']);
		$_SESSION['email'] = stripslashes($email);
		
		$sql = "SELECT * FROM applications.users WHERE email = $email";
		$sql = stripslashes($sql);
		
		$result = $con->query($sql);
		if ($result-> num_rows ==0){
		    echo '<script>alert("Invalid URL");window.location.href="/views/forgot.php";</script>';
		}
	}
	else{
	    echo '<script>alert("Sorry verification failed");window.location.href="/views/forgot.php";</script>';
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kiwanis Fair - Reset Password</title>

        <link href="/stylesheets/login.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="/images/kiawanis-fair.jpeg" alt="Kiwanis Logo">
        </header>

        <section>
            <form action= "/views/resetPassword.php" method = "POST">
				<input type = "submit" value ="Logout" class= "submission">
                <fieldset>
                    <legend>Choose New Password</legend>

                    <label for="userPassword">New Password</label>
                    <input type="password" name="newPassword" id="newPassword">

                    <label for="userPasswordReset">Confirm New Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword">

                    <section id="submitButtons">
                        <input type="submit" name="Reset" value="Reset" class="submission">
                    </section>					
                </fieldset>
            </form>
            <br>
        </section>
    </body>
</html>
