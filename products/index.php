<?php
require "../resources/header.html";
require "../resources/Session.php";
require "../resources/utilities.php";
require "../resources/database.php";
if (isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $user = $_SESSION['user'];
} else{
}
?>
<html>
    <head>
        <title id="title">Products |E-Shop<</title>
        <script src="../resources/scripts.js"></script>
    </head>
    <body>
    <div id="navbar">
        <?php
        if (!isset($id)){
            ?>
            <table>
                <tr>
                    <td><form action="search.php" method="get"><input type="text" placeholder="Search" name="search"><button type="submit" id="search"><i class="fa fa-search"></i></button></form></td>
                    <td><a class="fas fa-home" href="../"> Home</a></td>
                    <td><a class="fas fa-user" href="../registration/"> Register</a></td>
                    <td><a class="fas fa-user" href="../login/"> Log in</a></td>
                </tr>
            </table>
            <?php

        }else{
            ?>
            <table>
                <tr>
                    <td><form action="search/index.php" method="get"><input type="text" placeholder="Search" name="search"><button type="submit" id="search"><i class="fa fa-search"></i></button></form></td>
                    <td><a class="fas fa-home" href="../"> Home</a></td>
                    <td><a class="fas fa-shopping-basket" href="../basket/" id="basket"> Basket</a></td>
                    <td><a class="fas fa-user" href="../profile/index.php"> <?php echo $user; ?>'s account</a></td>
                    <td><a class="fas fa-user" href="../logout/"> Log Out</a></></td>
                </tr>
            </table>
            <?php
        }
        ?>


    </div>
    <div id="content">
        <select name="users" onchange="showbooks(this.value)">
            <option value="">Sorting options:</option>
            <option value="1">All Books</option>
            <option value="2">A-Z</option>
            <option value="3">Price</option>
        </select>
        <div id="shoptbl">

    </div>
    </div>
    </body>
</html>
