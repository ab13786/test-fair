<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kiwanis Fair - Signup</title>

        <link href="/stylesheets/login.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="/images/kiawanis-fair.jpeg" alt="Kiwanis Logo">
        </header>

        <section>
            <form action= "/views/signupCode.php" method = "post">
				<input type = "submit" value ="Logout" class= "submission">
                <fieldset>
                    <legend>User Signup</legend>

                    <label for="userEmail">E-mail</label>
                    <input type="text" name="Email" id="userEmail">

                    <label for="userPassword">Password</label>
                    <input type="password" name="Password" id="password">

                    <section id="submitButtons">
                        <input type="submit" name="Signup" value="signup" class="submission">
                    </section>					
                </fieldset>
            </form>
            <br>
        </section>
    </body>
</html>
