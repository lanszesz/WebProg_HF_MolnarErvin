<?php
    session_start();

    include 'database.php';

    $row = null;

    if ($stmt = $DATABASE->prepare('SELECT id, password FROM users WHERE name = ?')) {
        $stmt->bind_param('s', $_POST['name']);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
    }

    if ($row !== NULL) {
        if (password_verify($_POST['password'], $row['password'])) {
            session_regenerate_id();
            $_SESSION['loggedIn'] = true;
            $_SESSION['name'] = $_POST['name'];

            $DATABASE->close();
            header('Location: index.php');
            return;
        }
    }

    $DATABASE->close();
    $_SESSION['error'] = 'Wrong name or password!';
    header('Location: login.php');