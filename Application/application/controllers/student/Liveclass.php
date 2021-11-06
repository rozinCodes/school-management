<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Liveclass extends CI_Controller {

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

    public function class_book_bn() {

    }
    
}