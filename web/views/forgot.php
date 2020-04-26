<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kiwanis Fair - Password Reset</title>

        <link href="/stylesheets/login.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <header>
            <img src="/images/kiawanis-fair.jpeg" alt="Kiwanis Logo">
        </header>
        <section>
            <form action= "/views/forgotCode.php" method = "POST">
                <fieldset>
                    <legend>Reset Your Password</legend>

                    <label for="userEmail">E-mail</label>
                    <input type="text" name="Email" id="userEmail">

                    <section id="submitButtons">
                        <input type="submit" name="Reset" value="Reset" class="submission">
                    </section>					
                </fieldset>
            </form>
            <br>
        </section>
    </body>
</html>
