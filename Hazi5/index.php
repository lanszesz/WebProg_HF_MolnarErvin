<?php
    session_start();
?>

<div style="text-align: center;">

    <h3>Online conference registration</h3>

    <form method="post" action="process.php" enctype="multipart/form-data">

        <label for="fname">First name: *</label>
        <input type="text" id="fname" name="firstName" value="<?php if (isset($_SESSION["validated"]["firstName"])) echo $_SESSION["validated"]["firstName"]?>">
        <?php if (isset($_SESSION["errors"]["firstNameError"])) echo '<p style="color: red;">' . $_SESSION["errors"]["firstNameError"] . '</p>'; ?>

        <br><br>

        <label for="lname">Last name: *</label>
        <input type="text" id="lname" name="lastName" value="<?php if (isset($_SESSION["validated"]["lastName"])) echo $_SESSION["validated"]["lastName"]?>">
        <?php if (isset($_SESSION["errors"]["lastNameError"])) echo '<p style="color: red;">' . $_SESSION["errors"]["lastNameError"] . '</p>'; ?>

        <br><br>

        <label for="email">E-mail: *</label>
        <input type="text" id="email" name="email" value="<?php if (isset($_SESSION["validated"]["email"])) echo $_SESSION["validated"]["email"]?>">
        <?php if (isset($_SESSION["errors"]["emailError"])) echo '<p style="color: red;">' . $_SESSION["errors"]["emailError"] . '</p>'; ?>

        <br><br>

        <label>I will attend: *</label><br>
        <label for="event1">Event 1</label>
        <input type="checkbox" id="event1" name="attend[]" value="Event1"><br>
        <label for="event2">Event 2</label>
        <input type="checkbox" id="event2" name="attend[]" value="Event2"><br>
        <label for="event3">Event 3</label>
        <input type="checkbox" id="event3" name="attend[]" value="Event3"><br>
        <label for="event4">Event 4</label>
        <input type="checkbox" id="event4" name="attend[]" value="Event4"><br>
        <?php if (isset($_SESSION["errors"]["attendError"])) echo '<p style="color: red;">' . $_SESSION["errors"]["attendError"] . '</p>'; ?>

        <br><br>

        <label for="tshirt"> What's your T-Shirt size?</label><br>
        <select id="tshirt" name="tshirt">
            <option value="I don't want a T-Shirt">-</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>

        <br><br>

        <label for="abstract"> Upload your abstract * </label><br>
        <input type="file" id="abstract" name="abstract"/>
        <?php if (isset($_SESSION["errors"]["abstractError"])) echo '<p style="color: red;">' . $_SESSION["errors"]["abstractError"] . '</p>'; ?>

        <br><br>

        <label for="terms">I agree to terms & conditions. *</label>
        <input type="checkbox" id="terms" name="terms" value="agree"><br>
        <?php if (isset($_SESSION["errors"]["termsError"])) echo '<p style="color: red;">' . $_SESSION["errors"]["termsError"] . '</p>'; ?>

        <br><br>

        <input type="submit" name="submit" value="Send registration"/>
    </form>
</div>