<?php
require "../resources/database.php";
require "../resources/Session.php";
include_once "../resources/header.html";
$insertOrder = "INSERT INTO orders(PaymentType, UserID) VALUES('cash','".$_SESSION['id']."');";
$statement = $db->prepare($insertOrder);
$statement->execute();
$select = "SELECT LAST_INSERT_ID();";
$statement = $db->prepare($select);
$statement->execute();
$orderID = $statement->fetch();
echo $orderID[0];
foreach($_SESSION['cart'] as $key => $item){
    $insertOrderLine = "INSERT INTO orderline(OrderRef,ItemID,Quantity) VALUES('".$orderID[0]."','".$key."','".$_SESSION['cart'][$key]['quantity']."');";
    $statement = $db->prepare($insertOrderLine);
    $statement->execute();
}
?>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <div id="content">
       <p>Your Order reference number is <?php echo $orderID[0];?></p>
        <a href="../">Go back to <i class="fa fa-home"></i>Home</a>
        <?php unset($_SESSION['cart']); ?>
    </div>
</body>
</html>
