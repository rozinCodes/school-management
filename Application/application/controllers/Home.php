<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
      $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
      
    }
  

    public function index() {
        $data = array();
        $data['active'] = "home";
        $data['title'] = "home";
        $this->load->helper("form");
       // $data['content'] = $this->load->view("front/home", $data, TRUE);
      //  $this->load->view("front/home", $data);
         $this->load->view("front/master", $data);
    }
    
}