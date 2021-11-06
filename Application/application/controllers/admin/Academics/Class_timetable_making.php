<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Class_timetable_making extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

    public function index() {

        $data = array();
        $data['active'] = "class_timetable";
        $data['title'] = "Class Timetable";
        $this->load->helper("form");
        $data['allinfo'] = $this->academics_model->view_all_class_routine("CLASS_ROUTINE", "", "ID", "asc");
        


        //$data['allTchr'] = $this->common_model->view_data("STAFF", $where, "ID", "asc");
        $data['allTAC'] = $this->academics_model->view_teacher_distinct("TEACHER_ASSIGN", "", "ID", "asc");
        $data['allCls'] = $this->academics_model->view_class_distinct("TEACHER_ASSIGN", "", "ID", "asc");
        $data['allSec'] = $this->academics_model->view_section_distinct("TEACHER_ASSIGN", "", "ID", "desc");
        $data['allSub'] = $this->academics_model->view_subject_distinct("TEACHER_ASSIGN", "", "ID", "desc");
        $data['allSess'] = $this->common_model->view_data("SESSIONS", "", "ID", "desc");

        //print_r($data['allTAC']);

      // print_r($data['allCls']);

       //print_r($data['allSec']);
     // $c=count($data['allSub']);

     //print_r($data['allSub']);
    //    echo $c;
      // exit();
        
        
    
    
        $data['alltimetable'] = $this->academics_model->view_all_time_table("TIME_TABLE", "", "ID", "asc");
        $data['content'] = $this->load->view("admin/academics/class_timetable_making", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert() {

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("teacher_name", "", "required");


        if ($this->form_validation->run() == NULL) {

            $data = array();
        $data['active'] = "class_timetable";
        $data['title'] = "Class Timetable";

            $this->load->helper("form");
            $data['allinfo'] = $this->academics_model->view_all_class_routine("CLASS_ROUTINE", "", "ID", "asc");

            $data['allTAC'] = $this->academics_model->view_teacher_distinct("TEACHER_ASSIGN", "", "ID", "asc");
            $data['allCls'] = $this->academics_model->view_class_distinct("TEACHER_ASSIGN", "", "ID", "asc");
            $data['allSec'] = $this->academics_model->view_section_distinct("TEACHER_ASSIGN", "", "ID", "desc");
            $data['allSub'] = $this->academics_model->view_subject_distinct("TEACHER_ASSIGN", "", "ID", "desc");
            $data['allSess'] = $this->common_model->view_data("SESSIONS", "", "ID", "desc");
    
            $data['alltimetable'] = $this->academics_model->view_all_time_table("TIME_TABLE", "", "ID", "asc");


            $data['content'] = $this->load->view("admin/academics/class_timetable_making", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {



            //$teacherid=$this->input->post("teacher_name") ;
            //$teacher= $this->academics_model->view_teacher_byid("TEACHER_ASSIGN",  $teacherid, "ID", "asc");

            $where = array(
                "TIME_ID" => $this->input->post('timetable_class'),
                "DAY" => $this->input->post('day'),
               // "TEACHER_ID" => $this->input->post('teacher_name'),
                "ROOM_NUMBER" => $this->input->post('room_number'),
                "SESSION_ID" => $this->input->post('session_name')

                    // "SESSION_ID" =>  $this->input->post('class'),
            );

            if (!$this->common_model->check_unique("CLASS_ROUTINE", $where)) {
                $data = array(
                    "TEACHER_ID" => $this->input->post('teacher_name'),
                    "CLASS_ID" => $this->input->post('class'),
                    "SECTION_ID" => $this->input->post('section'),
                    "SUBJECT_ID" => $this->input->post('subjects'),
                    "TIME_ID" => $this->input->post('timetable_class'),
                    "DAY" => $this->input->post('day'),
                    "ROOM_NUMBER" => $this->input->post('room_number'),
                    "SESSION_ID" => $this->input->post('session_name')
                        //"CREATED_DATE" => $this->oracle_onlydate()
                );




                if ($this->common_model->save_data("CLASS_ROUTINE", $data)) {

                    $sdata['msg'] = "Save Successful";
                } else {
                    $sdata['msg'] = "Not Successfully Data Insert !!";
                }
            } else {
                $sdata['msg'] = "Already Exists Data !!";
            }
        }

        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/academics/class_timetable_making", "refresh");
    }

}
