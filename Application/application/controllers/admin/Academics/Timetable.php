<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Timetable extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        if (!$this->session->userdata('authenticated')) {
            redirect("login");
        }
    }

    public function teachers_timetable(){

        $data = array();
        $data['active'] = "academics";
        $data['title'] = "timetable";
        $this->load->helper("form");

        $array = array(
            "ROLES_ID"=>3,
            "ACTIVE"=>1
        );

        $year=date('Y');
        $session_id=$this->academics_model->get_session($year);
        $id = $this->session->userdata('id');
        
       
       
        $array2 = array(
            "SESSION_ID"=>$session_id->ID,

            "TEACHER_ID" => $id,   
        );

        $data['allPdt'] = $this->academics_model->get_teacher_list("STAFF", $array, "ID", "DESC");
       $data['allPdt2'] = $this->academics_model->get_routine_alldays("CLASS_ROUTINE", $array2, "ASC");
    //    $r=count($data['allPdt']);
    //     print_r($r);
    //     exit();

    // print_r($data['allPdt']);
      
       
    //      exit();
     


        $data['content'] = $this->load->view("admin/academics/teachers_timetable", $data, TRUE);
        $this->load->view("admin/master", $data);

    }
}