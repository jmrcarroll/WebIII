<?php
require "../resources/header.html";
require "../resources/Session.php";
require "../resources/utilities.php";
require "../resources/database.php";
if (isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $user = $_SESSION['user'];
        $total =0;
        if(!empty($_POST)){
           // var_dump($_POST);
          foreach ($_POST['quantity'] as $key=>$data){
                foreach($_SESSION['cart'] as $id =>$quantity){
                    //var_dump($_POST);
                    if($key == $id){
                        $_SESSION['cart'][$id]['quantity'] = $data;
                    }
                }
          }
        }

}else{
    header("location : ../login/");
}
?>
<html lang="en">
<head>
    <title><?php echo $_SESSION['user'] ."'s Basket";?></title>
</head>
<body>
<div id="navbar">
    <table>
        <tr>
            <td><form action="../search/index.php" method="get"><input type="text" placeholder="Search" name="search"><button type="submit" id="search"><i class="fa fa-search"></i></button></form></td>
            <td><a class="fas fa-home" href="../"> Home</a></td>
            <td><a class="fas fa-book" href="../products/">Show Products</a> </td>
            <td><a class="fas fa-user" href="../profile/index.php"> <?php echo $user; ?>'s account</a></td>
            <td><a class="fas fa-user" href="../logout/"> Log Out</a></></td>
        </tr>
    </table>
</div>
<div id="content">

        <?php
            if(empty($_SESSION['cart'])){
                echo "Cart is empty<br><a href='../'>Go back to home.</a>";
            }else{

                echo"<form action='' method='POST'><table><tr><th>Items in cart</th></tr><tr>";
                $query = "SELECT * FROM item WHERE ItemID IN(";
                foreach ($_SESSION['cart'] as $id => $value){
                    $query .= $id.",";
                }
                $query = substr($query, 0,-1) . ") ORDER BY ItemID ASC";
                $statement = $db->prepare($query);

                $statement->execute();
                while ($row = $statement->fetch()){
                    $sub = $_SESSION['cart'][$row['ItemID']]['quantity'] * $_SESSION['cart'][$row['ItemID']]['price'];
                    $total += $sub;
                    echo "<tr><td>".$row['itemName']."</td><td><input type='text' name='quantity[".$row['ItemID']."]' value='".$_SESSION['cart'][$row['ItemID']]['quantity']."'> at £". $row['itemPrice']." each</td><td>£".number_format($sub,2)."</td></tr>";
                }
                echo "<tr><td>Total: </td><td></td><td>£". number_format($total,2) ."</td></tr></table><input type='submit' value='update cart'><form></form>";
                echo "<button onclick='location.href =\"../checkout/\"'>test</button>";
            }
        ?>

    </div>
</div>
</body>
</html>
