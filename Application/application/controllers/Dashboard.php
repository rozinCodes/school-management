<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        if (!$this->session->userdata('authenticated')) {
            redirect(base_url() . "admin/login", "refresh");
        }
    }

    public function index() {
        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $roles = $this->session->userdata('roles');
        if ($roles == 1 OR $roles == 2) {
            
         //   redirect("admin/dashboard");
            redirect(base_url() . "admin/dashboard", "refresh");
           // $data['content'] = $this->load->view("admin/dashboard", $data, TRUE);  
           
        } else if ($roles == 3) {
            redirect(base_url() ."admin/dashboard/teacher_dashboard");
           // $data['content'] = $this->load->view("teacher/dashboard", $data, TRUE);
        } else if ($roles == 5) {
           // redirect(base_url() ."student/student_view/student_profile");
            redirect(base_url() ."profile");
           // $data['content'] = $this->load->view("student/dashboard", $data, TRUE);
        }else if($roles==6){
            $id=$this->session->userdata('id');
            $student_id = $this->session->userdata('student_id');
            $nuber_of_child = $this->student_model->count_number_of_child("STUDENTS",$id);
            $total= $nuber_of_child->STUDENT_ID;

            
            if($total>1){
               

                $data['allPdt'] = $this->student_model->get_number_of_child("STUDENTS",$id);
                 $data['content'] = $this->load->view("student/select_parent", $data, TRUE);
         
                // $this->load->view("admin/master", $data);

            }else{
                redirect(base_url() ."student/student_view/student_profile");
            }
            
        }
         else {
            $data['content'] = $this->load->view("user/dashboard", $data, TRUE);
        }
        
        $this->load->view("admin/master", $data);
    }

}
