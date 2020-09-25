<?php
require "database.php";
require "Session.php";
if(isset($_GET['order'])){
    switch ($_GET["order"]) {
        case 1:
            $select = "SELECT * FROM item";
            display_all($db, $select);
            break;
        case 2:
            $select = "SELECT * FROM item ORDER BY itemName ASC";
            display_all($db, $select);
            break;
        case 3:
            $select = "SELECT * FROM item ORDER BY itemPrice ASC";
            display_all($db, $select);
            break;
    }
}

function display_all($connect,$select) {

    $statement = $connect->prepare($select);

    $statement->execute();


    if ($statement->rowCount() > 0) {
        // output data of each row

        echo "<div style='width:75%;'> <div class='unset row topRow'><div class='unset'>Title</div class='unset'><div class='unset'>Description</div><div class='unset'>Price</div></div>";

        while ($row = $statement->fetch()) {
            if (isset($_SESSION['id'])){
                echo "<div class='unset row'><div class='unset'>" . "<img style='height:auto; width:100%;' src=../GlobalImages/products/" . $row["ItemID"] . ".jpg>" . $row["itemName"] . "</div>" . "<div class='unset'><div class='center'>" . $row["itemDesc"] . "</div></div>" . "<div class='unset'><div class='center'><div class='button' onclick='basketAdd(".$row["ItemID"].")'>£" . $row["itemPrice"] . "</div></div></div></div> <div class='unset'></div>";
            }else{
                echo "<div class='unset row'><div class='unset'>" . "<img style='height:auto; width:100%;' src=../GlobalImages/products/" . $row["ItemID"] . ".jpg>" . $row["itemName"] . "</div>" . "<div class='unset'><div class='center'>" . $row["itemDesc"] . "</div></div>" . "<div class='unset'><div class='center'><div class='button' onclick='login()'))'>£" . $row["itemPrice"] . "</div></div></div></div> <div class='unset'></div>";
            }

        }
        echo "</div>";
    } else {
        echo "0 results";
    }
}

?>

