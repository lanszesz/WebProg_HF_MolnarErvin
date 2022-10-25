<?php
    session_start();
?>

    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <input type="hidden" name="elkuldott" value="true">
        Melyik számra gondoltam 1 és 10 között?
        <input name="talalgatas" type="text">
        <br>
        <br>
        <input type="submit" value="Elküld">
    </form>

<?php

    if (!isset($_SESSION['szam'])) {
        $_SESSION['szam'] = rand(1, 10);
    }

    if (isset($_POST["elkuldott"])) {
        if (empty($_POST["talalgatas"])) {
            echo "Először írj be egy számot";
            return;
        }

        if ($_POST["talalgatas"] < $_SESSION['szam']) {
            echo "A szám nagyobb";
        } elseif ($_POST["talalgatas"] > $_SESSION['szam']) {
            echo "A szám kisebb";
        } else {
            echo "Talált!";
            $_SESSION['szam'] = rand(1, 10);
        }
    }