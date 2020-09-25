<?php
$Hostname = "localhost";
$Username = "root";
$Password = "";
$db = "WebAppSecAssignment";

//attempt to establish connection
$conn = mysqli_connect($Hostname,$Username,$Password,$db);
if(!$conn){
    die("Connection Failed: ". mysqli_connect_error());
}else{
}
?>