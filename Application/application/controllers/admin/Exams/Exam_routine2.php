<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exam_routine2 extends CI_Controller
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
        // $data['allPdt4'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
        $data['allPdt5'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");
        $data['allPdt6'] = $this->common_model->view_data("EXAMS", "", "ID", "ASC");
        // $data['allPdt7'] = $this->common_model->view_data("STAFF", $where, "ID", "ASC");
        $data['allPdt8'] = $this->exam_routine_model->Get_exam_routine();



        $data['content'] = $this->load->view("admin/exams/exam_routine2", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function GenerateRoutine()
    {
        $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("exam_name", "Exam Name", "required");

        $where = array(
            "STAFF.ROLES_ID" => 3
        );
        $data['allPdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allPdt3'] = $this->academics_model->show_section_classwise("CLASS_SECTIONS");
        // $data['allPdt4'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
        $data['allPdt5'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");
        $data['allPdt6'] = $this->common_model->view_data("EXAMS", "", "ID", "ASC");
        $data['allPdt7'] = $this->common_model->view_data("STAFF", $where, "ID", "ASC");



        $where = array(

            "EXAM" => $this->input->post("exam_name"),
            "SESSIONS" => $this->input->post("session"),
            "VERSION" => $this->input->post("version"),
            "CLASS" => $this->input->post("class"),
            "SECTION" => $this->input->post("section"),

        );

        if(!$this->common_model->view_data("EXAM_ROUTINE", $where, "ID", "ASC"))
        {
            $data['allpdtdata'] = $where;
            $data['allPdtsubject'] = $this->exam_routine_model->getAllforGenerateRoutine($where['CLASS']);
            $data['content'] = $this->load->view("admin/exams/exam_routine2", $data, TRUE);
            $this->load->view("admin/master", $data);
        }
        else
        {
            $sdata['msg'] = "Routine Generate Already Done";
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/exams/exam_routine2", "refresh");
           
        }

        // print_r($where);
        // exit();

       


        // print_r($data['allpdtdata']);
        // exit();

       
        // print_r($data['allPdtsubject']);
        // exit();
       
    }




    public function save_routine()
    {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("exam_name", "Exam Name", "required");
        $subject_id = $this->input->post("subject_id");
        $subject_code = $this->input->post("subject_code");
        $exam_date = $this->input->post("exam_date");
        $guard = $this->input->post("guard");
        $room_number = $this->input->post("room_number");
        $period_start_time = $this->input->post("period_start_time");
        $period_end_time = $this->input->post("period_end_time");
        // print_r($subject_id);
        // print_r($subject_code);
        // print_r($exam_date);
        // print_r($room_number);
        // print_r($period_start_time);
        // print_r($period_end_time);
        $l = count($exam_date);
        $flag = 0;

        for ($x = 0; $x <= $l - 1; $x++) {
            $E_DATE = $exam_date[$x];
            $DATE = $this->oracle_only_date_by_user($E_DATE);

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

            $time1 = strtotime($period_start_time[$x]);
            $time2 = strtotime($period_end_time[$x]);
            $difference = round(abs($time2 - $time1) / 3600, 2);



            $data = array(

                "E_DATE" => $DATE,
                "DAY" => $EXAM_DATE,
                "VERSION" => $this->input->post("version"),
                "CLASS" => $this->input->post("class"),
                "SECTION" => $this->input->post("section"),
                "SESSIONS" => $this->input->post("session"),
                "ROOM" => $room_number[$x],
                "SUBJECT" => $subject_id[$x],
                "SUBJECT_CODE" => $subject_code[$x],
                "EXAM_GUARD" => $guard[$x],
                "START_TIME" => $period_start_time[$x],
                "END_TIME" => $period_end_time[$x],
                "DURATION" => $difference,
                "EXAM" => $this->input->post("exam_name"),
            );





            if ($this->common_model->save_data("EXAM_ROUTINE", $data)) {
                $flag++;
            }
        }



        if ($flag == $l) {
            $sdata['msg'] = "Save Successful";
        } else {
            $sdata['msg'] = "Not Successfully Save Data !!";
        }





        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/exams/exam_routine2", "refresh");
    }


    public function delete_routine()
    {
        $delete_id = $this->uri->segment('6');


        if ($this->common_model->delete("EXAM_ROUTINE", $delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/exams/exam_routine2", "refresh");
    }

    public function edit_routine()
    {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("exam_name", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {


            $edit_id = $this->uri->segment('6');
            $data = array();

            $data['active'] = "groups";
            $data['edit'] = $edit_id;
            $data['title'] = "groups";

            $this->load->helper("form");

            //   
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

            // 


            //   $data['allPdt6'] = $this->common_model->view_data("EXAMS", "", "ID", "ASC");
            //   $data['allPdt8'] = $this->exam_routine_model->Get_exam_routine();
            $data['content'] = $this->load->view("admin/exams/exam_routine2", $data, TRUE);
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
                "DURATION" => $this->input->post("period_duration"),
                "EXAM" => $this->input->post("exam_name"),
            );
            $edit_id = $this->uri->segment('6');


            if ($this->common_model->edit("EXAM_ROUTINE", $data, $edit_id)) {



                $sdata['msg'] = "Edit Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Edit !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/exams/exam_routine2", "refresh");
        }
    }
}
