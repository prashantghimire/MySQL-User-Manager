<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserManager_model extends CI_Model
{
    public $users;
    public $message;
    private $creds ;

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    /*
     * Creates Users with Random Credentials
     **/
    public function createMySQLUsers()
    {
        $create_and_grant = "";
        $db_query = "";
        $this->credentials();
        foreach ($this->users as $user) {
            $user = trim($user);
            // create database
            $db_query = "CREATE DATABASE IF NOT EXISTS " . $user . ";";
            if ($this->db->query($db_query) === TRUE) {
                $this->message[$user]['db']= "Database created for " . $user . "!<br>";
            } else {
                $this->message[$user]['db']= "<span class='fail'>.Database cannot be created or it already exists for " . $user . "!</span><br>";
            }

            //create users and permissions
            $create_and_grant = "GRANT ALL ON " . $user . ".* TO '" . $user . "'@'localhost' IDENTIFIED BY '" . $this->creds[$user] . "';";
            if ($this->db->query($create_and_grant) === TRUE) {
                $this->message[$user]['permission'] = "Permission granted for " . $user . "!<br>";
            } else {
                $this->message[$user]['permission'] = "<span class='fail'>.Permission cannot be created or it already exists for " . $user . "!</span><br>";
            }
        }
        $this->emailUsers();
    }
    private function generateRandomString($length = 15) {
        $characters = '!@#$^&*()_+0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    private function credentials()
    {
        $creds = array();
        foreach ($this->users as $user) {
            $user = trim($user);
            $creds[$user] = $this->generateRandomString();
        }
        $this->creds = $creds;
    }

    /*
     * Email user their credentials!
     * */
    private function emailUsers()
    {
        foreach ($this->users as $user) {
            $user = trim($user);
            $message = "<h1>Password: </h1>" . $this->creds[$user];
            $this->mailStudent($user . "@selu.edu", "MySQL user credentials", $message);
        }
    }
    private function mailStudent($email, $subject, $message){
        mail($email, $subject, $message);
    }
}

