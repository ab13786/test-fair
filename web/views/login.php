<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kiwanis Fair - Login</title>
        <link href="/stylesheets/login.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="/images/kiawanis-fair.jpeg" alt="Kiwanis Logo">
        </header>

        <section>
            <form action ="" method="POST">
                <fieldset>
                    <legend>Management Login</legend>

                    <label for="userEmail">E-mail</label>
                    <input type="email" name="Email" id="userEmail">

                    <label for="userPassword">Password</label>
                    <input type="password" name="Password" id="userPassword">

                    <section id="submitButtons">
                        <input type="submit" name= "Login" value="Login" class="submission">
                    </section>					
                </fieldset>
            </form>
			<form action = "/views/signup.php" method ="post">
				<input type = "submit" value ="Signup" class= "submission">
			</form>
            <br>
        </section>

        <?php
            if(isset($_POST['Login'])){
                $host = "ogeechee-fair.cyxvjubgt7cw.us-east-1.rds.amazonaws.com";
                $user ="fair_admin";
                $passwordAdmin = "KiwanisClub";
                $db = "applications";
                $con = new mysqli($host, $user, $passwordAdmin, $db);
                session_start();

                $email = $_POST['Email'];
                $sql = "SELECT *FROM applications.users WHERE email = '".$email."'";
                $result = $con->query($sql);

                if($result->num_rows==0){
                    echo "<script type='text/javascript'>alert('User with that email doesn't exist!');</script>";
                    //$_SESSION['message'] = "User with that email doesn't exist!";
                    //header("location: /views/error.php");
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
                        //$_SESSION['message'] = "You have entered the wrong password, try again!";
                        //header("location: /views/error.php");
                    }
                }
            }
        ?>
    </body>
</html>
