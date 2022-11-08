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
        <h1>Login</h1>

        <?php

            if (isset($_SESSION['success'])) {
                echo '<p>' . $_SESSION['success'] . '</p>';
                unset($_SESSION['success']);
            }

            if (isset($_SESSION['error'])) {
                echo '<p>' . $_SESSION['error'] . '</p>';
                unset($_SESSION['error']);
            }

        ?>

        <form action="authenticate.php" method="POST">
            <label for="name"></label>
            <input type="text" name="name" placeholder="Username" id="name" required>

            <label for="password"></label>
            <input type="password" name="password" placeholder="Password" id="password" required>

            <input type="submit" value="Login">
        </form>

        <p>Don't have an account yet? <a href="register.php">Register</a></p>
    </body>
</html>