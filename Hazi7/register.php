<?php

    session_start();

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h1>Register</h1>

        <form action="verifyRegistration.php" method="GET">
            <label for="name"></label>
            <input type="text" name="name" placeholder="Username" id="name" required>

            <label for="password"></label>
            <input type="password" name="password" placeholder="Password" id="password" required>

            <input type="submit" name="submit" value="Register">
        </form>

        <p>Already have an account? <a href="login.php">Login</a></p>
    </body>
</html>