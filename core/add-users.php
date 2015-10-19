
<?php
require_once('connect.php');
require_once('mail.php');
require_once('functions.php');
//print_r($connection);
$data = $_POST;
$users_array = explode(",", $data['users']);
//print_r($users_array);

$user_query = "";
$grant_query = "";
$db_query ="";

$creds = array();
foreach ($users_array as $user) {
    $user = trim($user);
    $pass = generateRandomString();
    $creds[$user] = $pass;
//    mailStudent($user."@selu.edu","MySQL user credentials",$message);
}
print_r($creds);
//foreach ($creds as $c->p) {
//    echo $c." -> ".$p."<br>";
//}


foreach ($users_array as $user) {
    $user = trim($user);
    // create database
    $db_query = "CREATE DATABASE ".$user.";";
    if($connection->query($db_query) === TRUE){
        echo "Database created for ".$user."!<br>";
    } else {
        echo "Database cannot be created or it already exists for ".$user."!<br>";
    }
    //create users
    $user_query = "CREATE USER '".$user."'@'localhost' IDENTIFIED BY '".$creds[$user]."';";
    if(mysqli_query($connection, $user_query)){
        echo "User account created for ".$user."!<br>";
    } else {
        echo "User account cannot be created or it already exists for ".$user."!<br>";
    }
    //create permissions
    $grant_query = "GRANT ALL ON ".$user.".* TO '".$user."'@'localhost';";
    if(mysqli_query($connection, $grant_query)){
        echo "Permission granted for ".$user."!<br>";
    } else {
        echo "Permission cannot be created or it already exists for ".$user."!<br>";
    }

    echo "<br><hr>";
}

foreach ($users_array as $user) {
    $user = trim($user);
    $message = "<h1>Password: </h1>".$creds[$user];
    mailStudent($user."@selu.edu","MySQL user credentials",$message);
}
echo "<br>Task completed!";
mysqli_close($connection);