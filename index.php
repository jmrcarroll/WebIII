<?php
require './resources/database.php';
require './resources/Session.php';
//var_dump($_SESSION);
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $user = $_SESSION['user'];
} else {
}
//echo phpversion();
//if (!defined('PDO::ATTR_DRIVER_NAME')) {
//    echo 'PDO unavailable';
//}
//Name John Carroll
//Date 12/11/2019
//Description
//Home page for the index of the e-shop
?>
<!Doctype HTML>
<html lang="en">

<head>
    <link href="resources/mainTheme.css" type="text/css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/de9ec0cacb.js" crossorigin="anonymous"></script>
    <title>Home |E-Shop</title>
</head>
<header id="header">
    <img src="GlobalImages/Banner.png" alt="Site banner">

</header>

<body>
    <div id="navbar">
        <?php
        if (!isset($id)) {
        ?>
            <table>
                <tr>
                    <td>
                        <form action="search/index.php" method="get"><input type="text" placeholder="Search" name="search"><button type="submit" id="search"><i class="fa fa-search"></i></button></form>
                    </td>
                    <td><a class="fas fa-home" href=""> Home</a></td>
                    <td><a class="fas fa-book" href="products/">Show Products</a> </td>
                    <td><a class="fas fa-user" href="registration/"> Register</a></td>
                    <td><a class="fas fa-user" href="login/"> Log in</a></td>
                </tr>
            </table>
        <?php

        } else {
        ?>
            <table>
                <tr>
                    <td>
                        <form action="search/index.php" method="get"><input type="text" placeholder="Search" name="search"><button type="submit" id="search"><i class="fa fa-search"></i></button></form>
                    </td>
                    <td><a class="fas fa-home" href=""> Home</a></td>
                    <td><a class="fas fa-shopping-basket" href="basket/" id="basket"> Basket</a></td>
                    <td><a class="fas fa-book" href="products/">Show Products</a> </td>
                    <td><a class="fas fa-user" href="profile/index.php"> <?php echo $user; ?>'s account</a></td>
                    <td><a class="fas fa-user" href="logout/"> Log Out</a></>
                    </td>
                </tr>
            </table>
        <?php
        }
        ?>


    </div>
</body>
<footer id="Footer">
    &copy; John Carroll 2020
</footer>

</html>