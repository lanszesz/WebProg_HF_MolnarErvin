<?php

    session_start();

    if (isset($_SESSION['success'])) {
        echo "<b>You have successfully registered with the following data: </b><br><br>";
        echo "First name: " . $_SESSION['success']['firstName'] . "<br><br>";
        echo "Last name: " . $_SESSION['success']['lastName'] . "<br><br>";
        echo "Email: " . $_SESSION['success']['email'] . "<br><br>";
        echo "Events: <br>";
        foreach ($_SESSION['success']['attend'] as $event) {
            echo $event . "<br>";
        }
        echo "<br>";
        echo "T-Shirt: " .  $_SESSION['success']['tshirt'] . "<br><br>";
        echo 'Abstract: <a href="' . $_SESSION['success']['abstract'] . '">File</a>' . "<br><br>";
        echo 'Terms: ' . $_SESSION['success']['terms'] . "<br><br>";
    } else {
        header("Location: /index.php");
        exit();
    }

    session_destroy();