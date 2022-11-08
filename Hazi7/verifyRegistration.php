<?php

    session_start();

    include 'database.php';

    if (isset($_GET['submit'])) {
        $stmt = $DATABASE->prepare('INSERT INTO users(name, password) VALUES (?, ?)');

        $password = password_hash($_GET['password'], PASSWORD_DEFAULT);
        $stmt->bind_param("ss", $_GET['name'], $password);
        $stmt->execute();

        $_SESSION['success'] = "You have registered successfully!";
    }

    $DATABASE->close();
    header('Location: login.php');