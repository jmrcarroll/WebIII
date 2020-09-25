<?php
require("../resources/database.php");
require("../resources/Session.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * from item where ItemID = $id";
    $statement = $db->prepare($query);
    $statement->execute();
    if ($statement->rowCount() == 1){
        $row = $statement->fetch();
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['quantity']++;
        }else{
            $_SESSION['cart'][$id] = array('quantity' =>1,'price'=>$row['itemPrice']);
        }
    }
}