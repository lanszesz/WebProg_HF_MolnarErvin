<?php

    session_start();

    include 'database.php';

    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
        $_SESSION['error'] = 'To update a record you need to log in first!';
        header('Location: login.php');
    }

    if (isset($_GET['id'])) {
        $sql = "SELECT * FROM hallgatok WHERE id = {$_GET['id']}";
        $result = $DATABASE->query($sql);
        $row = $result->fetch_assoc();
    }

    if (isset($_POST['submit'])) {
        $nev = $_POST['nev'];
        $szak = $_POST['szak'];
        $atlag = $_POST['atlag'];
        $id = $_POST['id'];

        $stmt = $DATABASE->prepare("UPDATE hallgatok SET nev = ?, szak = ?, atlag = ? WHERE id = ?");
        $stmt->bind_param("ssdi", $nev, $szak, $atlag, $id);

        $stmt->execute();

        $DATABASE->close();
        $_SESSION['success'] = 'Record updated successfully.';
        header("Location: index.php");
    }

?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <table>
        <tr>
            <td>Nev:</td>
            <td><input type="Text" name="nev" value="<?php echo $row["nev"]; ?>"></td>
        </tr>
        <tr>
            <td>Szak:</td>
            <td><input type="Text" name="szak" value="<?php echo $row["szak"]; ?>"></td>
        </tr>
        <tr>
            <td>Atlag:</td>
            <td><input type="Text" name="atlag" value="<?php echo $row["atlag"]; ?>"></td>
        </tr>
    </table>

    <input type="hidden" name="id" value=<?php echo $row['id']; ?>>
    <input type="Submit" name="submit" value="Update">
</form>
