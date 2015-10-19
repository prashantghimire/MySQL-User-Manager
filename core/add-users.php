<h1>Hi!</h1>

<?php
//var_dump($_POST);
$users = $_POST;
$users_array = explode(",", $users['users']);

foreach($users_array as $w){
    echo "- ".$w."<br>";
}
print_r($users_array);
print_r(list($users_array));