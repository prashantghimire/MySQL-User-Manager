<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->view('shared/header.php');
        $this->load->view('home');
        $this->load->view('shared/footer.php');
    }
}
