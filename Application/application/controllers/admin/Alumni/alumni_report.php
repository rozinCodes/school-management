<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Alumni_report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('download_center_model');
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        if (!$this->session->userdata('authenticated')) {
            redirect("login");
        }
    }

    public function index(){
        $data = array();
        $data['active'] = "alumni";
        $data['title'] = "Alumni Report";
        $this->load->helper("form");

     

        $data['allPdt1'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allPdt3'] = $this->academics_model->show_section_classwise("CLASS_SECTIONS");
        $data['allPdt4'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");
   
        $data['content'] = $this->load->view("admin/alumni/alumni_report", $data, TRUE);
        $this->load->view("admin/master", $data);

    }

    public function report(){
        
        $data = array();
        $data['active'] = "alumni";
        $data['title'] = "Alumni";
        $this->load->helper("form");

        $array['ENROLL.CLASS_ID'] = $this->input->post("class");
        $array['ENROLL.SECTION_ID'] = $this->input->post("section");
        $array['ENROLL.SESSION_ID'] = $this->input->post("session");
        $array['STATUS']=0;


        $data['allPdt1'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allPdt3'] = $this->academics_model->show_section_classwise("CLASS_SECTIONS");
        $data['allPdt4'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");

        // $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        // $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "CLASSES", "ASC");
        // $data['allPdt3'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");
        // $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdtclass'] = $this->student_model->Get_student_class_list("ENROLL", $array, "ID", "DESC");




        // $data['allPdt']= $this->common_model->view_data("STUDENTS", "","ID","DESC");
        $data['content'] = $this->load->view("admin/alumni/alumni_report", $data, TRUE);
        $this->load->view("admin/master", $data);

    }
    public function alumi_student_list_by_admission_no()
    {

        

        $data = array();
        $data['active'] = "groups";
        $data['title'] = "Student Details";
        $this->load->helper("form");

        /*$array['STUDENTS.CLASS']= $this->input->post("class");
        $array['STUDENTS.SECTION']= $this->input->post("section");
        $array['SESSIONS.ID']= $this->input->post("session");*/
        $admission_no = $this->input->post("admission_no");
        $status=0;



        //
        $data['allPdtclass'] = $this->alumni_model->student_details_by_admission_no("ENROLL", $admission_no,$status, "ID", "DESC");



        $data['content'] = $this->load->view("admin/alumni/alumni_report", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

}
    


