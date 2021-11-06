<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Generate_id_card extends CI_Controller
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
        $data['active'] = "certificates";
        $data['title'] = "Certificates";
        $this->load->helper("form");

        $array['ENROLL.CLASS_ID']= $this->input->post("class");
        $array['ENROLL.SECTION_ID']= $this->input->post("section");
        $array['ENROLL.SESSION_ID']= $this->input->post("session");


        $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "CLASSES", "ASC");
        $data['allPdt3'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdtclass']= $this->student_model->Get_student_class_list("ENROLL",$array,"ID","DESC");


        $data['content'] = $this->load->view("admin/certificates/generate_id_card", $data, true);
        $this->load->view("admin/master", $data);
    }

    public function id_card_by_admission_no(){
        $data = array();
        $data['active'] = "certificates";
        $data['title'] = "Certificates";
        $this->load->helper("form");

        $array['STUDENTS.ADMISSION_NO']= $this->input->post("admission_no");
        


        $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "CLASSES", "ASC");
        $data['allPdt3'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdtclass']= $this->student_model->Get_single_student_for_id_card("ENROLL",$array,"ID","DESC");
        // print_r($data['allPdtclass']);
        // exit();


        $data['content'] = $this->load->view("admin/certificates/generate_id_card", $data, true);
        $this->load->view("admin/master", $data);
    }

    public function generate(){
        
        $data = array();
        $data['active'] = "certificates";
        $data['title'] = "Generate Id Card";
        $this->load->helper("form");

        $view_id= $this->uri->segment('5');
        $array=array("STUDENT_ID"=>$view_id,"STATUS"=>1);
        $data['allPdt']= $this->student_model->get_std_details_by_id("ENROLL",$array,"ID","DESC");
        $data['allPdt2'] = $this->certificates_model->getSchool_info();
        // print_r($data['allPdt']);
        // exit();
        // $data['content'] = $this->load->view("admin/certificates/sample_id_card", $data, TRUE);
        $data['content'] = $this->load->view("admin/certificates/student_id_card", $data, TRUE);
        $this->load->view("admin/master", $data);


    }
}