<?php
include_once "../resources/Session.php";
 session_destroy();
 header("location:../index.php");
?>