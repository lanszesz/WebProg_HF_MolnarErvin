<?php

    session_start();

    include 'database.php';

    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
        $_SESSION['error'] = 'To delete a record you need to log in first!';
        header('Location: login.php');
    }

    if (isset($_GET['id'])) {
        if ($stmt = $DATABASE->prepare('DELETE FROM hallgatok WHERE id = ?')) {
            $stmt->bind_param('i', $_GET['id']);
            $stmt->execute();

            $_SESSION['success'] = 'Record deleted successfully';
        } else {
            $_SESSION['error'] = "Error deleting record: ";
        }

        $DATABASE->close();
        header("Location: index.php");
        return;
    }