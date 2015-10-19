<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->view('shared/header');
        $this->load->view('shared/navbar');
    }
    public function index(){
        $this->load->view('dashboard/dashboard');
        $this->load->view('shared/footer');
    }

    public function add()
    {
        if($this->input->post('users')){

        }
        $this->load->database();
        $this->load->library('UserManager');

        print_r($query->result());
//        foreach ($query->result('User') as $user)
//        {
//            echo $user->name; // access attributes
//            echo $user->reverse_name(); // or methods defined on the 'User' class
//        }

        $this->load->view('dashboard/add');
        $this->load->view('shared/footer');
    }
}
