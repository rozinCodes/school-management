<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Online_admission extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        if (!$this->session->userdata('authenticated')) {
            redirect("login");
        }
    }

    public function index() {
        $data = array();
        $data['active'] = "classes";
        $data['title'] = "classes";
        $this->load->helper("form");
        $code = $this->input->get("code");
        $data['allGdt'] = $this->common_model->view_data("GO_LIVE", "", "ID", "desc");
        $data['allCdt'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
        $data['allPdt'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $myid= $this->session->userdata('id');
        $where=array("STUDENT_ID"=>$myid);
        $data['allEdt'] = $this->common_model->view_data("ENROLL", $where, "ID", "ASC");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['content'] = $this->load->view("student/class_book_bn", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function view() {
        $data = array();
        $data['active'] = "classes";
        $data['title'] = "classes";
        $this->load->helper("form");
        $where="";
		$data['allPdt'] = $this->common_model->Online_admission_view($where);
		$data['content'] = $this->load->view("student/online_admission_view", $data, TRUE);
		 //$data['content'] = $this->load->view("admin/student_lists", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    public function edit($id) {
        $data = array();
        $data['active'] = "classes";
        $data['title'] = "classes";
        $this->load->helper("form");
        $where=array("ONLINE_ADMISSION.ID"=>$id);
        $data['allPdt'] = $this->common_model->Online_admission_view($where);
        $data['allPdt5'] = $this->common_model->view_data("SECTIONS", "", "NAME", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "CLASSES", "ASC");
        $data['allPdt3'] = $this->common_model->view_data("SESSIONS", "", "SESSIONS", "ASC");
        $data['allPdt4'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");

        $data['allPdtStdinfo'] = $this->student_model->get_siblingsParant_info("GUARDIAN", "", "ID", "ASC");

       // echo "<pre>";
       // print_r($data['allPdt']);
       // echo "</pre>";
      //  exit();
		$data['content'] = $this->load->view("student/online_admission-edit", $data, TRUE);
		 //$data['content'] = $this->load->view("admin/student_lists", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    
}