<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "ovbp_system";

$conn = new mysqli($host,$user,$password,$database);

if($conn->connect_error)
{
die("Database Connection Failed");
}

?>
