<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Design extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('download_center_model');
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        if (!$this->session->userdata('authenticated')) {
            redirect("login");
        }
    }

    public function staff_id_card() {
        $data = array();
        $data['active'] = "groups";
        $data['title'] = "Student Details";
        $this->load->helper("form");

        $array['STAFF.ROLES_ID'] = $this->input->post("staff_role");
        //$array['STAFF.ACTIVE']= 1; 

        $data['allPdt2'] = $this->common_model->view_data("ROLES", "", "ID", "DESC");
        $data['allPdt'] = $this->staff_model->search_staff_by_role("STAFF", $array, "ID", "DESC");
        $data['content'] = $this->load->view("admin/certificates/staff_id_card", $data, true);
        $this->load->view("admin/master", $data);
    }

    public function staff_id_design($id) {
        $data = array();
        $data['active'] = "groups";
        $data['title'] = "Student Details";
        $this->load->helper("form");

        //  $array['STAFF.ROLES_ID'] = $this->input->post("staff_role");
        //$array['STAFF.ACTIVE']= 1; 
        $where = array("STAFF.ID" => $id);
        $data['allPdt'] = $this->staff_model->Staff_View($where);
        $data['allPdt2'] = $this->certificates_model->getSchool_info();
        /**
          print_r("<pre>");
          print_r($data['allPdt']);
          print_r("</pre>");
          exit();
         * */
        $data['content'] = $this->load->view("admin/certificates/staff_id_design", $data, true);
        $this->load->view("admin/master", $data);
    }

    public function admit_card() {
        $data = array();
        $data['active'] = "groups";
        $data['title'] = "Student Details";
        $this->load->helper("form");

        $data['allPdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allPdt3'] = $this->academics_model->show_section_classwise("CLASS_SECTIONS");
        // $data['allPdt4'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
        $data['allPdt5'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");
        $data['allPdt6'] = $this->common_model->view_data("EXAMS", "", "ID", "ASC");
        // $data['allPdt7'] = $this->common_model->view_data("STAFF", $where, "ID", "ASC");
        $data['allPdt8'] = $this->exam_routine_model->Get_exam_routine();

        $sub = $this->input->post('sub');

        if ($sub != NULL) {
            $where = array(
                "EXAM" => $this->input->post("exam_name"),
                "SESSIONS" => $this->input->post("session"),
                "VERSION" => $this->input->post("version"),
                "CLASS" => $this->input->post("class"),
                "SECTION" => $this->input->post("section"),
            );


            $con = array(
                "ENROLL.CLASS_ID" => $this->input->post("class"),
                "ENROLL.SECTION_ID" => $this->input->post("section"),
                "ENROLL.SESSION_ID" => $this->input->post("session"),
                "ENROLL.VERSION" => $this->input->post("version"),
            );
            $data['allSdt'] = $this->exam_routine_model->Examroutine_view($where);
            $data['allEdt'] = $this->exam_routine_model->Student_view($con);
/**
             echo "<pre>";
             print_r( $data['allEdt']);
            echo"</pre>";
            exit();
  **/

        }
        $data['content'] = $this->load->view("admin/certificates/admit_card", $data, true);
        $this->load->view("admin/master", $data);
    }

    public function student_certificate_design() {
        $data = array();
        $data['active'] = "student_certificate";
        $data['title'] = "student certificate";
        $this->load->helper("form");

        $array['STAFF.ROLES_ID'] = $this->input->post("staff_role");
        //$array['STAFF.ACTIVE']= 1; 

        $data['allPdt2'] = $this->common_model->view_data("ROLES", "", "ID", "DESC");
        $data['allPdt'] = $this->staff_model->search_staff_by_role("STAFF", $array, "ID", "DESC");
        $data['content'] = $this->load->view("admin/certificates/student_certificate_design", $data, true);
        $this->load->view("admin/master", $data);
    }

}
