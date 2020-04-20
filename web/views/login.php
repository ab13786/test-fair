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
            <form action ="/views/loginCode.php" method="POST">
                <fieldset>
                    <legend>Management Login</legend>

                    <label for="userEmail">E-mail</label>
                    <input type="email" name="Email" id="userEmail">

                    <label for="userPassword">Password</label>
                    <input type="password" name="Password" id="userPassword">

                    <section id="submitButtons">
                        <input type="submit" name= "Login" value="Login"  id="Login" class="submission">
                    </section>					
                </fieldset>
            </form>

            <br>
        </section>
    </body>
</html>
