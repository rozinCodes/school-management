<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Online_exam extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

    public function index() {
        $data = array();
        $data['active'] = $this->lang->line("online_exam");
        $data['title'] = $this->lang->line("online_exam");
        $this->load->helper("form");
        $data['allPub'] = $this->academics_model->ExamQuestionView();
       /// print_r($data['allPub'] );
       // exit();
       $data['allSet'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");
        $data['allVdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "asc");
        $data['allSub'] = $this->common_model->view_data("SUBJECTS", "", "ID", "asc");
        $data['allPdt'] = $this->common_model->view_data("ONLINEEXAM", "", "ID", "desc");
        $data['allQdt'] = $this->common_model->view_data("QUESTIONS", "", "ID", "desc");
        $data['allOne'] = $this->common_model->view_data("ONLINEEXAM", "", "ID", "desc");
        $data['content'] = $this->load->view("admin/academics/online_exam-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("exam_title", "exam_title", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = $this->lang->line("online_exam");
            $data['title'] = $this->lang->line("online_exam");
            $this->load->helper("form");
            $data['allSet'] = $this->common_model->view_data("SESSIONS", "", "ID", "ASC");
            $data['allVdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");;
            $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "asc");
            $data['allSub'] = $this->common_model->view_data("SUBJECTS", "", "ID", "asc");
            $data['allPdt'] = $this->common_model->view_data("ONLINEEXAM", "", "ID", "desc");
            $data['allQdt'] = $this->common_model->view_data("QUESTIONS", "", "ID", "desc");
            $data['content'] = $this->load->view("admin/academics/online_exam-new", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

            $date = date("Y-m-d");
            $EXAM_FROM = $this->input->post("exam_from");
            $exam_to = $this->input->post("exam_to");
            $data = array(
                "EXAM_TITLE" => $this->input->post("exam_title"),
                "ATTEMPT" => $this->input->post("attempt"),
                "EXAM_FROM" => $this->oracle_only_date_by_user($EXAM_FROM),
                "EXAM_TO" => $this->oracle_only_date_by_user($exam_to),
                "DURATION" => $this->input->post("duration"),
                "PASSING_PERCENTAGE" => $this->input->post("passing_percentage"),
                "SESSION_ID" => 1,
                "IS_ACTIVE" => 1,
                "CREATED_AT" => $this->oracle_onlydate($date),
                "VERSIONSID" => $this->input->post("version"),
                "CLASSESID" => $this->input->post("class"),
                "SESSIONSID" => $this->input->post("session")
            );
         
            if ($this->common_model->save_data("ONLINEEXAM", $data)) {
                // $id = $this->common_model->Id;


                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/online_exam", "refresh");
           
        }
    }

    public function question() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("question", "question", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = $this->lang->line("online_exam");
            $data['title'] = $this->lang->line("online_exam");
            $this->load->helper("form");
            $data['allVdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
            $data['allSub'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
            $data['allQcd'] = $this->common_model->view_data("QUESTIONS_CORRECT", "", "ID", "ASC");
            $data['allQub'] = $this->academics_model->OnlineQuestionView();
            $data['content'] = $this->load->view("admin/academics/question-new", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {


    $date = date("Y-m-d");
            $data = array(
                "SUBJECT_ID" => $this->input->post("subjectsid"),
                "QUESTION" => $this->input->post("question"),
                "OPT_A" => $this->input->post("a"),
                "OPT_B" => $this->input->post("b"),
                "OPT_C" => $this->input->post("c"),
                "OPT_D" => $this->input->post("d"),
                "OPT_E" => $this->input->post("e"),
                 "CREATED_AT" => $this->oracle_onlydate($date)
            );
            if ($this->common_model->save_data("QUESTIONS", $data)) {
               $class_id = $this->common_model->Quesion_id();
                foreach ($class_id as $row) {
                    $class_id= $row->ID;
                }
                $sections = $this->input->post('sections');
                for ($i = 0; $i < count($sections); $i++) {
                    // $selData = $this->common_model->view_data("sections", array("id" => $sections[$i]), "id", "asc");
                    // foreach ($selData as $data) {
                    //   $section_id = $data->id;
                    //}
                    $sections_array = array(
                        "QUESTIONSID" => $class_id,
                        "CORRECT" => $sections[$i]
                    );
                    $this->common_model->save_data('QUESTIONS_CORRECT', $sections_array);
                }
                

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
           redirect(base_url() . "admin/online_exam/question", "refresh");
        }
    }

    public function onlineexam_questions() {
        $this->load->helper("form");
        $this->load->library("form_validation");

        $onlineexam_id = $this->input->post('onlineexam_id');
        $sections = $this->input->post('sections');
        for ($i = 0; $i < count($sections); $i++) {
            $selData = $this->common_model->view_data("QUESTIONS", array("ID" => $sections[$i]), "ID", "asc");
            foreach ($selData as $data) {

                $section_id = $data->ID;
            }
               $date = date("Y-m-d");
            $sections_array = array(
                "QUESTIONSID" => $section_id,
                "ONLINEEXAM_ID" => $onlineexam_id,
                  "CREATED_AT" => $this->oracle_onlydate($date)
            );
            if (!$this->common_model->check_unique("ONLINEEXAM_QUESTIONS", $sections_array)) {
                $this->common_model->save_data('ONLINEEXAM_QUESTIONS', $sections_array);
            }
        }

        $sdata['msg'] = "Save Successful";

        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/online_exam/question", "refresh");
    }

    public function update(){
    
        $id=$this->input->post("id");
            //$id=1600115969;
     
        $selPdt=$this->common_model->view_data("ONLINEEXAM",array("ID"=>$id),"ID","desc");
       
        $EXAM_FROM = $this->input->post("exam_from");
        $exam_to = $this->input->post("exam_to");
                 $data = array(
                    "EXAM_TITLE" => $this->input->post("exam_title"),
                    "ATTEMPT" => $this->input->post("attempt"),
                    "EXAM_FROM" => $this->oracle_only_date_by_user($EXAM_FROM),
                    "EXAM_TO" => $this->oracle_only_date_by_user($exam_to),
                    "DURATION" => $this->input->post("duration"),
                    "PASSING_PERCENTAGE" => $this->input->post("passing_percentage")
                   
       
                        
            );
            if ($this->common_model->update("ONLINEEXAM", $data,array("ID"=>$id))) {
          
                 $sdata['msg']="Product update successfull";
            }
            else{
             $sdata['msg']="Product Err";
            }
            $this->session->set_userdata($sdata);
         redirect(base_url()."admin/online_exam","refresh");
      
    }

    public function delete($id){
        $dt = $this->common_model->view_data("ONLINEEXAM", array("ID"=>$id), "ID", "asc");
        if($dt){
            $this->common_model->delete_data("ONLINEEXAM", array("ID"=>$id));
          $sdata['msg']="Delete Successfull";
        }
        else{
             $sdata['msg']="Delete Err";
        }
            $this->session->set_userdata($sdata);
          redirect(base_url()."admin/online_exam","refresh");
   }

   public function questiondelete($id){
    $dt = $this->common_model->view_data("QUESTIONS", array("ID"=>$id), "ID", "asc");
    if($dt){
        $this->common_model->delete_data("QUESTIONS", array("ID"=>$id));
        $dt = $this->common_model->view_data("QUESTIONS_CORRECT", array("QUESTIONSID"=>$id), "ID", "asc");
        if($dt){
            $this->common_model->delete_data("QUESTIONS_CORRECT", array("QUESTIONSID"=>$id));
            $sdata['msg']="Delete Successfull";
        }
     
    }
    else{
         $sdata['msg']="Delete Err";
    }
        $this->session->set_userdata($sdata);
      redirect(base_url()."admin/online_exam/question","refresh");
}

}
