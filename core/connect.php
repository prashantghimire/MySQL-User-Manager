<?php
$server = "localhost";
$username = "root";
$password = "admin123";
$database = "students";
$connection = new mysqli($server, $username, $password, $database);
if(mysqli_connect_errno()){
    echo "Connection could not be established";
    exit();
}
?>