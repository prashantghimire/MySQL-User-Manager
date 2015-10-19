<?php
$server = "localhost";
$username = "root";
$password = "admin123";
$connection = new mysqli($server, $username, $password);
if(mysqli_connect_errno()){
    echo "Connection could not be established";
    exit();
}
?>