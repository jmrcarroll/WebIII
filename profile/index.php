<?php
require '../resources/Session.php';
require '../resources/utilities.php';
require '../resources/database.php';
include_once '../resources/header.html';
?>
<html lang="en">
    <head>
        <title><?php echo $_SESSION['user'] . "'s account";?></title>
    </head>
    <body>
        <div id="navbar">
            <table>
                <tr>
                    <td><form action="../search/index.php" method="get"><input type="text" placeholder="Search" name="search"><button type="submit" id="search"><i class="fa fa-search"></i></button></form></td>
                    <td><a class="fas fa-home" href="../"> Home</a></td>
                    <td><a class="fas fa-shopping-basket" href="../basket/" id="basket"> Basket</a></td>
                    <td><a class="fas fa-book" href="../products/">Show Products</a> </td>
                    <td><a class="fas fa-user" href="index.php"> <?php echo $_SESSION['user']; ?>'s account</a></td>
                    <td><a class="fas fa-user" href="../logout/"> Log Out</a></></td>
                </tr>
            </table>
        </div>
        <div id="content">
            <?php
            $select = "SELECT * FROM customer WHERE CustomerID = ".$_SESSION['id'].";";
            //echo $select;
            $statement = $db->prepare($select);
            $statement->execute();
            while($row = $statement->fetch()){
                $date=date_create($row['DOB']);
                //echo date_format($date,"d/m/Y");
                echo"
            <table>
            <tr><th>First name </th><td> ".$row['FirstName']."</td></tr>
            <tr><th>Surname </th><td> ".$row['LastName']."</td></tr>
            <tr><th>Date of Birth </th><td>". date_format($date,"d/m/Y")."</td></tr>
            <tr><th>E-Mail </th><td>". $row['emailaddress']."</td></tr>
            <tr><th>First line of address</th><td>".$row['address']."</td></tr>
            <tr><th>Post Code</th><td>".$row['postcode']."</td></tr>
            <tr><th>Contact Number</th><td>".$row['ContactNum']."</td></tr>
            </table>";
            }
            ?>

        </div>
    </body>
</html>
