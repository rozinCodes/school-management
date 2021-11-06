<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Class_period extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

    public function index() {
        $data = array();
        $data['active'] = "gg";
        $data['title'] = "Class Period";
        $this->load->helper("form");
        $data['allinfo'] = $this->common_model->view_data("TIME_TABLE", "", "ID", "ASC");
        // print_r( $data['allinfo']);
        // exit();

        $data['content'] = $this->load->view("admin/academics/class_period", $data, TRUE);
        $this->load->view("admin/master", $data);
    }




    public function insert() {

        $this->load->helper("form");
      $this->load->library("form_validation");
      $this->form_validation->set_rules("period_name", "", "required");


        if ($this->form_validation->run() == NULL) {

            $data = array();
            $data['active'] = "groups";

            $data['title'] = "groups";
    
            $this->load->helper("form");
            $data['allinfo'] = $this->common_model->view_data("TIME_TABLE", "", "ID", "ASC");
            
            $data['content'] = $this->load->view("admin/academics/class_period", $data, TRUE);
            $this->load->view("admin/master", $data);
           
        } else {

            

            $where=array(
                
                "START_TIME<= " => $this->input->post("period_start_time"),
                "END_TIME>=" => $this->input->post("period_start_time"),
                // "PERIOD_NAME" => $this->input->post("period_name"),
                // "DURATION" => $this->input->post('period_duration')
            );

            //if(!$this->academics_model->check_assign_teacher("TEACHER_ASSIGN", $where))
            if(!$this->common_model->check_unique("TIME_TABLE", $where))
                
            {
                $data = array(
                    "START_TIME" => $this->input->post("period_start_time"),
                    "END_TIME" => $this->input->post("period_end_time"),
                    "PERIOD_NAME" => $this->input->post("period_name"),
                    "DURATION" => $this->input->post('period_duration'),
                   // "ROOM_NUMBER" => $this->input->post('room_number')
                //"CREATED_DATE" => $this->oracle_onlydate()
            );
            if ($this->common_model->save_data("TIME_TABLE", $data)) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            }
            else
            {
                $sdata['msg'] = "Already Exists Data !!";
            }

            
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/academics/Class_period", "refresh");
        }
    }

   
    

    

}
