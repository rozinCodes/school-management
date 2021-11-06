<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

    public function index(){

        $data = array();
        $data['active'] = "dashboard";
        $data['title'] = "Dashboard";
        $this->load->helper("form");

        $where = array(
            "STATUS"=>1,
        );

        $jan = "JAN";
        $dec = "DEC";

        $curr_year = date("Y");
       

        $start_year = "01"."-".$jan."-".$curr_year;
        $end_year = "31"."-".$dec."-".$curr_year;

        $year = array(
            "YEAR"=>$curr_year,
        );
        $t_date = date("Y-m-d");
        $tody_date_orcle = $this->oracle_onlydate($t_date);

        $data['allPdt'] = $this->dashboard_model->count_current_active_student("ENROLL", $where, "ID", "DESC");
        $data['allPdt2'] = $this->dashboard_model->count_total_student("STUDENTS", $start_year,$end_year);
        $data['allPdt3'] = $this->dashboard_model->count_total_session("STUDENTS");
        $data['allPdt4'] = $this->dashboard_model->count_total_fees("ADD_FEES_AMOUNT",$year);
        $data['allPdt5'] = $this->dashboard_model->todays_student_attendence("STUDENT_ATTENDENCE",$tody_date_orcle);
        $data['allPdt6'] = $this->dashboard_model->todays_staff_attendence("STAFF_ATTENDENCE",$tody_date_orcle);
        $data['allPdt7'] = $this->dashboard_model->count_staff("STAFF");
        $data['allPdt8'] = $this->dashboard_model->remaining_fees("ADD_FEES_AMOUNT",$curr_year);
        $data['allPdt9'] = $this->dashboard_model->count_each_staff();
        $data['allPdt10'] = $this->dashboard_model->count_awaiting_payment();
        $data['allPdt11'] = $this->dashboard_model->count_leave_request();
        $data['allPdt12'] = $this->dashboard_model->total_expense_today();
        // print_r($data['allPdt12']);
        // exit();


        $data['content'] = $this->load->view("admin/dashboard", $data, TRUE);
        $this->load->view("admin/master", $data);

    }

    public function teacher_dashboard(){
        $data = array();
        $data['active'] = "dashboard";
        $data['title'] = "Dashboard";
        $this->load->helper("form");

        $where = array(
            "STATUS"=>1,
        );

        $t_date = date("Y-m-d");
        $tody_date_orcle = $this->oracle_onlydate($t_date);
        $year=date('Y');
        $session_id=$this->academics_model->get_session($year);
        $id = $this->session->userdata('id');
        $staff_id = $this->session->userdata('staff_id');
     
       
       
        $array2 = array(
            "SESSION_ID"=>$session_id->ID,

            "TEACHER_ID" => $id,   
        );

        $data['allPdt'] = $this->dashboard_model->count_current_active_student("ENROLL", $where, "ID", "DESC");
        $data['allPdt2'] = $this->academics_model->get_routine_alldays("CLASS_ROUTINE", $array2, "ASC");
        $data['allPdt3'] = $this->staff_model->last_seven_days_attendence("STAFF_ATTENDENCE", $staff_id, "ASC");
        $data['allPdt5'] = $this->dashboard_model->todays_student_attendence("STUDENT_ATTENDENCE",$tody_date_orcle);
        
        $data['allPdt6'] = $this->dashboard_model->last_five_notice("NOTICE_BOARD");
        $data['allPdt11'] = $this->dashboard_model->count_student_leave_request($staff_id);

        // print_r( $data['allPdt6']);
        // exit();

        
        
        $data['content'] = $this->load->view("teacher/dashboard", $data, TRUE);
        $this->load->view("admin/master", $data);

    }

    public function student_dashboard(){
        $data = array();
        $data['active'] = "dashboard";
        $data['title'] = "Dashboard";
        $this->load->helper("form");

        $data['content'] = $this->load->view("student/dashboard", $data, TRUE);
        $this->load->view("admin/master", $data);


    }
}