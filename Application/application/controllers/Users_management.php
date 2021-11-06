<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_management extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
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

    public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("first_name", "First Name", "required");
       // $this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
    //    $this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
       // $this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');


        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "register";
            $data['title'] = "register";
            $this->load->helper("form");
            $this->load->view("user/create", $data);
        } else {
           // $_SERVER['REMOTE_ADDR'];
            $rand= uniqid() ;
            $username=strtolower($this->input->post('first_name'));
            $username=$username.$rand;
           

            $data = array(
                "ip_address" => $_SERVER['REMOTE_ADDR'],
                "username " => $username,
                "password" =>  $this->common_model->Encryptor('encrypt', $this->input->post('password')),
                "email " => strtolower($this->input->post('email')),
                "created_on"=>strtotime(date('d-m-Y h:i:sa')),
                "active"=>"1",
                "first_name" => $this->input->post("first_name"),
                "last_name" => $this->input->post("last_name"),
                "date_of_birth" => $this->input->post("date_of_birth"),
                "gender" => $this->input->post("gender"),
                "groupsid"=>3,
                "user_type"=>"free_member"
            );
          
            if ($this->common_model->save_data("users", $data)) {

                $sdata['msg'] = "save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "login", "refresh");
           
        
        }
    }

}
