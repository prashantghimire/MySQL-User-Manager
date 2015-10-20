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
        $users = $this->input->post('users');
        $this->load->database();
        $data = array();
        if($this->input->post('users')){
            $this->load->model('UserManager_model');
            $this->UserManager_model->users = explode(',', $users);
            $this->UserManager_model->createMySQLUsers();
            $data['messages']= ($this->UserManager_model->message);
        }
        $this->load->view('dashboard/add', $data);
        $this->load->view('shared/footer');
    }
}
