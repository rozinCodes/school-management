<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert_marks_teacher_wise extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Dhaka");
    $language = $this->session->userdata('language');
    $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
  }

  public function index()
  {
    $data = array();
    $data['active'] = "groups";
    $data['title'] = "groups";
    $this->load->helper("form");
    $data['allPdtcls'] = $this->common_model->view_data("CLASSES", "", "ID", "DESC");
    $data['allPdtsec'] = $this->common_model->view_data("SECTIONS", "", "ID", "DESC");
    $data['allPdtsession'] = $this->common_model->view_data("SESSIONS", "", "ID", "DESC");
    

    $data['content'] = $this->load->view("admin/exams/insert_marks", $data, TRUE);
    $this->load->view("admin/master", $data);
  }
  
  }

