<?php

    session_start();

    include "database.php";

    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
        $_SESSION['error'] = 'To add a record you need to log in first!';
        header('Location: login.php');
    }

    if (isset($_POST['submit'])) {
        $nev = $_POST['nev'];
        $szak = $_POST['szak'];
        $atlag = $_POST['atlag'];

        $stmt = $DATABASE->prepare("INSERT INTO hallgatok(nev, szak, atlag) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $nev, $szak, $atlag);

        $stmt->execute();

        $DATABASE->close();
        $_SESSION['success'] = 'Record inserted successfully.';
        header("Location: index.php");
    }
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <table>
        <tr>
            <td>Nev:</td>
            <td><input type="Text" name="nev"></td>
        </tr>
        <tr>
            <td>Szak:</td>
            <td><input type="Text" name="szak"></td>
        </tr>
        <tr>
            <td>Atlag:</td>
            <td><input type="Text" name="atlag"</td>
        </tr>
    </table>

    <input type="Submit" name="submit" value="Add">
</form>
