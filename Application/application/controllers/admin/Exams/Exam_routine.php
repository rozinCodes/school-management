<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exam_routine extends CI_Controller
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
        $where = array(
            "STAFF.ROLES_ID" => 3
        );
        $data['allPdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allPdt3'] = $this->academics_model->show_section_classwise("CLASS_SECTIONS");
        $data['allPdt4'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
        $data['allPdt5'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");
        $data['allPdt6'] = $this->common_model->view_data("EXAMS", "", "ID", "ASC");
        $data['allPdt7'] = $this->common_model->view_data("STAFF", $where, "ID", "ASC");
        $data['allPdt8'] = $this->exam_routine_model->Get_exam_routine();

        // print_r($data['allPdt8']);
        // exit();

        $data['content'] = $this->load->view("admin/exams/exam_routine", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function save_routine()
    {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("exam_name", "Exam Name", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "groups";
            $data['title'] = "groups";
            $this->load->helper("form");

            $where = array(
                "STAFF.ROLES_ID" => 3
            );
            $data['allPdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
            $data['allPdt3'] = $this->academics_model->show_section_classwise("CLASS_SECTIONS");
            $data['allPdt4'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
            $data['allPdt5'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");
            $data['allPdt6'] = $this->common_model->view_data("EXAMS", "", "ID", "ASC");
            $data['allPdt7'] = $this->common_model->view_data("STAFF", $where, "ID", "ASC");

            $data['content'] = $this->load->view("admin/exams/exam_routine", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

            $where = array(
                "SUBJECTS.ID" => $this->input->post("subject")
            );
            $SUBJECT_CODE = $this->common_model->view_data2("SUBJECTS", $where, "", "");
            $E_DATE = $this->input->post("exam_date");
            $DATE = $this->oracle_only_date_by_user($E_DATE);

            // 
            $dayofweek = date('w', strtotime($DATE));

            if ($dayofweek == 0) {
                $EXAM_DATE = "Sunday";
            }
            if ($dayofweek == 1) {
                $EXAM_DATE = "Monday";
            }
                if ($dayofweek == 2) {
                    $EXAM_DATE = "Tuesday";
                }
                if ($dayofweek == 3) {
                    $EXAM_DATE = "Wednesday";
                }
                if ($dayofweek == 4) {
                    $EXAM_DATE = "Thursday";
                }
                if ($dayofweek == 5) {
                    $EXAM_DATE = "Friday";
                }
                if ($dayofweek == 6) {
                    $EXAM_DATE = "Saturday";
                }







                $data = array(

                    "E_DATE" => $DATE,
                    "DAY" => $EXAM_DATE,
                    "VERSION" => $this->input->post("version"),
                    "CLASS" => $this->input->post("class"),
                    "SECTION" => $this->input->post("section"),
                    "SESSIONS" => $this->input->post("session"),
                    "ROOM" => $this->input->post("room_number"),
                    "SUBJECT" => $this->input->post("subject"),
                    "SUBJECT_CODE" => $SUBJECT_CODE->CODE,
                    "EXAM_GUARD" => $this->input->post("guard"),
                    "START_TIME" => $this->input->post("period_start_time"),
                    "END_TIME" => $this->input->post("period_end_time"),
                     //"DURATION" => $this->input->post("period_duration"),
                    "EXAM" => $this->input->post("exam_name"),
                );

                $where2 = array(

                    "E_DATE" => $DATE,
                    "DAY" => $EXAM_DATE,
                    "VERSION" => $this->input->post("version"),
                    "CLASS" => $this->input->post("class"),
                    "SECTION" => $this->input->post("section"),
                    "SESSIONS" => $this->input->post("session"),
                    "ROOM" => $this->input->post("room_number"),
                    "SUBJECT" => $this->input->post("subject"),
                    "SUBJECT_CODE" => $SUBJECT_CODE->CODE,
                    "EXAM_GUARD" => $this->input->post("guard"),
                    "START_TIME" => $this->input->post("period_start_time"),
                    "END_TIME" => $this->input->post("period_end_time"),
                    "DURATION" => $this->input->post("period_duration"),
                    "EXAM" => $this->input->post("exam_name"),

                );

                if (!$this->common_model->check_unique("EXAM_ROUTINE", $where2)) {
                    if ($this->common_model->save_data("EXAM_ROUTINE", $data)) {
                        $sdata['msg'] = "Save Successful";
                    } else {
                        $sdata['msg'] = "Not Successfully Save Data !!";
                    }
                } else {
                    $sdata['msg'] = "Data Already Exists !!";
                }

                $this->session->set_userdata($sdata);
                redirect(base_url() . "admin/exams/exam_routine", "refresh");
            }
        }
    

    public function delete_routine()
    {
        $delete_id= $this->uri->segment('6');


        if ($this->common_model->delete("EXAM_ROUTINE",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/exams/exam_routine", "refresh");
    }
    
}
