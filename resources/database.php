<?php
$dsn = '';
$dbuser ="";
$dbpass ="";
//the preceding information was omitted
try{
    $db = new PDO($dsn,$dbuser,$dbpass);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo "Connected to database.";
}catch(PDOException $ex){
    echo "connection Failed: \n".$ex;
}
?>