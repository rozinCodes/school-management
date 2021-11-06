<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
         // $this->lang->load('auth');
          
          $language=$this->session->userdata('language');
          $this->lang->load('auth',$language);
        // $mytype = $this->session->userdata("mytype");
    }

    public function index() {
        $data = array();
        $data['active'] = "register";
        $data['title'] = "register";
        $this->load->helper("form");
        //   $data['content'] = $this->load->view("admin/category-new", $data, TRUE);
        $this->load->view("user/create", $data);
    }
    
    public function setlanguage() {
       $language=$this->input->post("lan");
       $this->session->set_userdata("language",$language);
       $this->session->set_flashdata("suc","successful language".ucfirst($language));
       echo 1;
    }
}
