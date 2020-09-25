<?php

//include "../resources/header.html";
require '../resources/database.php';
require '../resources/utilities.php';
require '../resources/Session.php';
ob_start();
$ReqFields = array("email", "password");
$formError = array();

if (isset($_POST["submit"])) {
    $formError = array_merge($formError, emptyField($ReqFields));

    $email = $_POST["email"];
    $password = $_POST["password"];
    $formError = array_merge($formError, validEmail($_POST));

    //echo "BOO";
    if (empty($formError)) {
        $sqlQuery = "select * from customer where emailaddress = :email";
        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(":email" => $email));

        while ($row = $statement->fetch()) {
            $id = $row['CustomerID'];
            $hashDB = $row['PASSWORD'];
            $user = $row['FirstName'] . " " . $row['LastName'];
            if (password_verify($password, $hashDB)) {
                $_SESSION['id'] = $id;
                $_SESSION['user'] = $user;
                var_dump($_SESSION);
                header("location: ../index.php");
                //echo "<script>location.href = \"../\";</script>";
                echo phpversion("tidy");
            } else {

                $result = "Username and password do not match what we have on record.";
            }
        }
    } else {
        $result = "<p>You have the following Error(s):</p><ul>";
        foreach ($formError as $error) {
            $result .= "<li>$error</li>";
        }
        $result .= "</ul>";
    }
}
ob_end_clean();
?>
<html lang="en">

<html lang="en">
    <head>
            <link href="../resources/mainTheme.css" type="text/css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
            <meta charset="utf-8">
            <script src="https://kit.fontawesome.com/de9ec0cacb.js" crossorigin="anonymous"></script>
            <title>Login |E-Shop</title>
            </head>
            <header id ="header">
                <img src="../GlobalImages/Banner.png">

            </header>
            <body>
    <div id="navbar"><a class="fas fa-home" href="../"> Home</a></div>
    <div id="content">
        <?php if (isset($result)) {
            echo $result;
        } ?>
        <form method="POST" action="">
            <label>E-mail:</label><br />
            <input type="text" name="email"><br />
            <label>Password:</label><br />
            <input type="password" name="password"><br />

            <input type="submit" name="submit">

        </form>
        <p>Forgotten Password?<a href="../reset/">Click here</a></p>
    </div>
</body>

</html>