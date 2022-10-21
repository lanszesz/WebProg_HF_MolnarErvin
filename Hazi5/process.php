<?php

    session_start();
    unset($_SESSION["errors"], $_SESSION["validated"]);

    $errors = [];
    $validated = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // First Name
        if (empty($_POST["firstName"])) {
            $errors += ["firstNameError" => "First name is required"];
        } else {
            $validated += ["firstName" => validate_input($_POST["firstName"])];
        }

        // Last Name
        if (empty($_POST["lastName"])) {
            $errors += ["lastNameError" => "Last name is required"];
        } else {
            $validated += ["lastName" => validate_input($_POST["lastName"])];
        }

        // Email
        if (empty($_POST["email"])) {
            $errors += ["emailError" => "Email is required"];
        } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errors += ["emailError" => "Invalid email format"];
        } else {
            $validated += ["email" => $_POST["email"]];
        }

        // Attend
        if (!isset($_POST["attend"])) {
            $errors += ["attendError" => "Choose at least one event you will attend"];
        } else {
            $validated += ["attend" => $_POST["attend"]];
        }

        // T-SHIRT
        $validated += ["tshirt" => $_POST["tshirt"]];

        // Abstract
        if (!is_uploaded_file($_FILES["abstract"]["tmp_name"])) {
            $errors += ["abstractError" => "You must upload your abstract"];
        } else {
            $uploadErrors = "";
            $ok = true;

            if ($_FILES["abstract"]["size"] > 3145728) {
                $uploadErrors = " Maximum file size is 3MB.";
                $ok = false;
            }

            if (mime_content_type($_FILES['abstract']['tmp_name']) != "application/pdf") {
                $uploadErrors .= " The file must be .pdf.";
                $ok = false;
            }

            if ($ok) {
                move_uploaded_file($_FILES['abstract']['tmp_name'], 'abstracts/' . $_FILES['abstract']['name']);
                $validated += ["abstract" => 'abstracts/' . $_FILES['abstract']['name']];
            } else {
                $errors += ["abstractError" => "Error(s):" . $uploadErrors];
            }
        }

        // Terms
        if (!isset($_POST["terms"]) || $_POST["terms"] !== "agree") {
            $errors += ["termsError" => "You must agree to terms & conditions"];
        } else {
            $validated += ["terms" => "You agreed to our terms & conditions"];
        }
    }

    function validate_input($input)
    {
        $validated_input = trim($input);
        $validated_input = stripslashes($validated_input);
        $validated_input = htmlspecialchars($validated_input);

        return $validated_input;
    }

    if (count($errors) == 0) {
        $_SESSION += ["success" => $validated];
        header("Location: /success.php");
        exit();
    } else {
        $_SESSION = ["errors" => $errors];
        $_SESSION += ["validated" => $validated];
        header("Location: /index.php");
        exit();
    }

