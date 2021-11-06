<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Versions extends CI_Controller {

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
        $data['active'] = "version";
        $data['title'] = "version";
        $this->load->helper("form");
           $data['allVdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdt'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['content'] = $this->load->view("academics_version/version-view", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    
        public function classes() {
        $data = array();
        $data['active'] = "classes";
        $data['title'] = "classes";
        $this->load->helper("form");
        $data['allPdt'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['content'] = $this->load->view("academics_version/classes-view", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    
       public function class_book() {
        $data = array();
        $data['active'] = "classes";
        $data['title'] = "classes";
        $this->load->helper("form");
        $code = $this->input->get("code");
        $data['allGdt'] = $this->common_model->view_data("GO_LIVE", "", "ID", "desc");
        $data['allCdt'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
        $data['allPdt'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['content'] = $this->load->view("academics_version/class_book", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
        public function flip_book() {
        $data = array();
        $data['active'] = "classes";
        $data['title'] = "classes";
        $this->load->helper("form");
        $data['allCdt'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
        $data['allPdt'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allEbook'] = $this->common_model->view_data("LECTURE_EBOOK", "", "PAGE", "ASC");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['content'] = $this->load->view("academics_version/flip_book", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    
    
    public function pdf_book() {
        $data = array();
        $data['active'] = "classes";
        $data['title'] = "classes";
        $this->load->helper("form");
        $data['allCdt'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
        $data['allPdt'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allEbook'] = $this->common_model->view_data("LECTURE_PDF", "", "ID", "ASC");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['content'] = $this->load->view("academics_version/pdf_book", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
	  public function video_part() {
        $data = array();
        $data['active'] = "academics_version";
        $data['title'] = "academics_version";
        $this->load->helper("form");
        $data['allCdt'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
        $data['allPdt'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allEbook'] = $this->common_model->view_data("LECTURE_VIDEO", "", "ID", "ASC");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['content'] = $this->load->view("academics_version/video_part", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    
        public function video_play() {
        $data = array();
        $data['active'] = "academics_version";
        $data['title'] = "academics_version";
        $this->load->helper("form");
        $data['allCdt'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
        $data['allPdt'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allEbook'] = $this->common_model->view_data("LECTURE_VIDEO", "", "ID", "ASC");
        $data['allSdt'] = $this->common_model->Class_Sections();
        
        $data['content'] = $this->load->view("academics_version/video_play", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    
        public function power_point_book() {
        $data = array();
        $data['active'] = "power_point_book";
        $data['title'] = "power_point_book";
        $this->load->helper("form");
        $data['allCdt'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
        $data['allPdt'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allEbook'] = $this->common_model->view_data("LECTURE_POWER_POINT", "", "ID", "ASC");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['content'] = $this->load->view("academics_version/power_point_book", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
	
}