<?php
$dsn = 'mysql:host=mysql.ccacolchester.com; dbname=johnc4479';
$dbuser ="johnc4479";
$dbpass ="1484479!";

try{
    $db = new PDO($dsn,$dbuser,$dbpass);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "Connected to database.";
}catch(PDOException $ex){
    echo "connection Failed: \n".$ex;
}
?>