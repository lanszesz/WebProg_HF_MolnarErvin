<?php

    session_start();

    include 'database.php';

    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
        echo '<p>Welcome <b>' . $_SESSION['name'] . '</b>. You can log out <a href="logout.php">here.</a></p>';
        echo '<p>Click <a href="add.php">here</a> to add a new record</p>';
    } else echo '<p>Click <a href="login.php">here</a> to login</p>';

    if (isset($_SESSION['success'])) {
        echo '<p>' . $_SESSION['success'] . '</p>';
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
        echo '<p>' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }

    if ($stmt = $DATABASE->prepare('SELECT * FROM hallgatok')) {
        $stmt->execute();

        $result = $stmt->get_result();
    }

    echo "<table border='1'>";
    echo "<tr><td>Id</td><td>Hallgato</td><td>Szak</td><td>Atlag</td><td>DELETE</td><td>UPDATE</td></tr>";
    while($row = $result->fetch_assoc()) {
        $deleteLink = "delete.php?id=" . $row['id'];
        $updateLink  = "update.php?id=" . $row['id'];

        echo '<tr><td>' . implode('</td><td>', $row) . '</td>';

        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
            echo "<td> <a href='".$deleteLink."'>DELETE</a></td>";
            echo "<td><a href='".$updateLink."'>UPDATE</a></td></tr>";
        }
    }
    echo "</table>";