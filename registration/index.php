<?php
include "../resources/header.html";
require '../resources/database.php';
require "../resources/utilities.php";

if(isset($_POST['submit'])) {
    $important_fields = array('email', 'password','firstName','lastName',"address",'dob','postCode','password2','email2');

    $FormErrors = array();
    $LengthFields = array('password' => 8,'password2' => 8);

    $FormErrors = array_merge($FormErrors, emptyField($important_fields));
    $FormErrors = array_merge($FormErrors, matchMinLen($LengthFields));
    $FormErrors = array_merge($FormErrors, validEmail($_POST));
    $FormErrors = array_merge($FormErrors, compFields($_POST['email'], $_POST['email2'], "E-Mail"));
    $FormErrors = array_merge($FormErrors, compFields($_POST['password'], $_POST['password2'], "Password"));

    if (empty($FormErrors)) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $FirstName = $_POST['firstName'];
        $LastName = $_POST['lastName'];
        $address = $_POST['address'];
        $postCode = $_POST['postCode'];
        $DOB = $_POST['dob'];
        $ContactNum = $_POST['contactNum'];
        echo $DOB;

        $hash = password_hash($password, PASSWORD_DEFAULT);

        try {
            $sqlInsert = "INSERT INTO customer(emailaddress,PASSWORD, FirstName, LastName, DOB, address, postcode, ContactNum) VALUES(:email,:password,:FirstName,:LastName,:DOB,:address, :postCode,:contactNum)";
            $Statement = $db->prepare($sqlInsert);
            $Statement->execute(array(':email' => $email, ':password' => $hash,':FirstName'=>$FirstName,':LastName'=>$LastName,':DOB'=>$DOB,':address'=>$address,':postCode'=>$postCode,':contactNum'=>$ContactNum));
            if ($Statement->rowCount() == 1) {
                $result = '<p style="background-color:green;">Account creation successful</p>';
            }
        } catch (PDOException $ex) {
            $result = '<p style="background-color:red;">Account creation Failed</p><br>' . $ex;
        }
    } else {

        $result = displayErrors($FormErrors);
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Registration</title>
    </head>
    <header>

    </header>
    <body>
        <div id="navbar"><a class="fas fa-home" href="../"> Home</a></div>
        <div id="content">
            <?php if (isset($result)){ echo $result;}else{?>
            Already got an account? <a href="../login/">Login here.</a>
            <form method="post" action="">
                <label>E-mail:</label><br/>
                <input type="text" name="email"><br/>
                <label>Confirm E-mail</label><br/>
                <input type="text" name="email2"><br/>
                <label>First name:</label><br/>
                <input type="text" name="firstName"><br/>
                <label>Surname:</label><br/>
                <input type="text" name="lastName"><br/>
                <label>Date of Birth</label><br>
                <input type="date" name="dob"><br>
                <label>Delivery Address:</label><br/>
                <input type="text" name="address"><br/>
                <label>PostCode:</label><br/>
                <input type="text" name="postCode"><br/>
                <label>Contact number:</label><br/>
                <input type="text" name="contactNum"><br/>
                <label>Password:</label><br/>
                <input type="password" name="password"><br/>
                <label>Confirm password:</label><br/>
                <input type="password" name="password2"><br/><br/>
                <input type="submit" name="submit" value="Register">

            </form><?php } ?>
        </div>
    </body>
</html>