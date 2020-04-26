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
                    <input type="text" name="Email" id="userEmail" placeholder="example@gmail.com">

                    <label for="address"> Street Address</label>
                    <input type="text" name="address" id="address" placeholder="Address">

                    <section id="submitButtons">
                        <input type="submit" name="Reset" value="Reset" class="submission">
                    </section>					
                </fieldset>
            </form>
            <br>
        </section>
    </body>
</html>
