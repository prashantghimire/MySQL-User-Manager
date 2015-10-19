<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('connect.php');
require_once('mail.php');
require_once('functions.php');



class UserManager
{
    private $db;
    private $users;
    private $creds = null;
    public function __construct($db, $users){
        $this->db = $db;
        $this->users = explode(",", $users);
    }

// use variable since calling credentials twice will generate two different random string passwords
//$all_users = explode(",", $_POST['users']);
//$user_credentials = credentials($all_users);
//createMySQLUsers($all_users, $user_credentials, $connection);
//emailUsers($all_users, $user_credentials);
    /*
     * Generates User Credentials
     */
    function credentials()
    {
        $creds = array();
        foreach ($this->users as $user) {
            $user = trim($user);
            $creds[$user] = generateRandomString();
        }
        $this->creds = $creds;
    }

    /*
     * Creates Users with Random Credentials
     **/
    function createMySQLUsers($users, $creds, $connection)
    {
        $user_query = "";
        $grant_query = "";
        $db_query = "";

        foreach ($this->users as $user) {
            $user = trim($user);
            // create database
            $db_query = "CREATE DATABASE " . $user . ";";
            if ($this->db->query($db_query) === TRUE) {
                echo "Database created for " . $user . "!<br>";
            } else {
                echo "<span class='fail'>.Database cannot be created or it already exists for " . $user . "!</span><br>";
            }
            //create users
            $user_query = "CREATE USER '" . $user . "'@'localhost' IDENTIFIED BY '" . $this->creds[$user] . "';";
            if ($this->db->query($user_query)) {
                echo "User account created for " . $user . "!<br>";
            } else {
                echo "<span class='fail'>.User account cannot be created or it already exists for " . $user . "!</span><br>";
            }
            //create permissions
            $grant_query = "GRANT ALL ON " . $user . ".* TO '" . $user . "'@'localhost';";
            if ($this->db->query($grant_query)) {
                echo "Permission granted for " . $user . "!<br>";
            } else {
                echo "<span class='fail'>.Permission cannot be created or it already exists for " . $user . "!</span><br>";
            }

            echo $user_query . "<br>";
            echo $db_query . "<br>";
            echo $grant_query . "<br>";

            echo "<br><hr>";
        }
    }

    /*
     * Email user their credentials!
     * */
    function emailUsers($users, $creds)
    {
        foreach ($users as $user) {
            $user = trim($user);
            $message = "<h1>Password: </h1>" . $creds[$user];
            mailStudent($user . "@selu.edu", "MySQL user credentials", $message);
        }
    }
}

