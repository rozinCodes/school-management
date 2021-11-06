<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Onlineexam extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

    public function index() {
        $data = array();
        $data['active'] = "online_exam";
        $data['title'] = "online exam";
        $this->load->helper("form");
        $myid= $this->session->userdata('id');
        $where=array("STUDENT_ID"=>$myid);
        $data['allEdt'] = $this->common_model->view_data("ENROLL", $where, "ID", "ASC");
        $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "asc");
        $data['allSub'] = $this->common_model->view_data("SUBJECTS", "", "ID", "asc");
        $data['allPdt'] = $this->common_model->view_data("ONLINEEXAM", "", "ID", "desc");
        $data['allQdt'] = $this->common_model->view_data("QUESTIONS", "", "ID", "desc");
        $data['content'] = $this->load->view("student/online_exam-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function view($id) {
        $data = array();
        $data['active'] = "subjects";
        $data['title'] = "subjects";
        $this->load->helper("form");
        $data['urlp'] = $this->uri->segment('4');
        $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "asc");
        $data['allSub'] = $this->common_model->view_data("SUBJECTS", "", "ID", "asc");
        $where = array("ID" => $id);
        $data['allPdt'] = $this->common_model->Onlineexam_View($where);


        $sections_array = array(
            "ONLINEEXAM_ID" => $id,
            "STUDENTSID" => $this->session->userdata('id')
        );
        
        $data['allCpt'] = $this->common_model->check_unique("ONLINEEXAM_ATTEMPTS", $sections_array);
        $data['allApt'] = $this->common_model->view_data("ONLINEEXAM_ATTEMPTS", "", "ID", "desc");
        $data['allQdt'] = $this->common_model->Oline_Question_View($id);
        $data['content'] = $this->load->view("student/online_exam-view", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function onlineexam_attempts() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $id = $this->input->post('id');


        $sections_array = array(
            "ONLINEEXAM_ID" => $id,
            "STUDENTSID" => $this->session->userdata('id')
        );

        $this->common_model->save_data('ONLINEEXAM_ATTEMPTS', $sections_array); {



            $sdata['msg'] = "Save Successful";

            $this->session->set_userdata($sdata);
            //redirect(base_url() . "onlineexam/question/{$id}", "refresh");
        }
    }

    public function question($id) {
        $data = array();
        $data['active'] = "subjects";
        $data['title'] = "subjects";
        $this->load->helper("form");
        $data['urlp'] = $this->uri->segment('4');
        $data['allCls'] = $this->common_model->view_data("classes", "", "id", "asc");
        $data['allSub'] = $this->common_model->view_data("subjects", "", "id", "asc");
        //$where=array("id"=>$id);
        //  $data['allPdt'] = $this->common_model->Onlineexam_View($where);
        $where = $id;
        $data['allQdt'] = $this->common_model->Oline_Question_View($where);
        $data['content'] = $this->load->view("student/question-view", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function onlineexam_questions_ans() {
        $this->load->helper("form");
        $this->load->library("form_validation");

        $onlineexam_id = $this->input->post('onlineexam_id');
        $questionsid = $this->input->post('questionsid');


        $sections = $this->input->post('sections');
        for ($i = 0; $i < count($sections); $i++) {
            // $selData = $this->common_model->view_data("sections", array("id" => $sections[$i]), "id", "asc");
            // foreach ($selData as $data) {
            //   $section_id = $data->id;
            //}
            //  $sections=$sections[$i];
            $aa = (explode("-", $sections[$i]));
            $correct = $aa[0];
            $questionsid = $aa[1];


            $sections_array = array(
                "ONLINEEXAMID" => $onlineexam_id,
                "STUDENTID" => $this->session->userdata('id'),
                "QUESTIONSID" => $questionsid,
                "CORRECT" => $correct
            );


           /**
              echo "<pre>";
              print_r($sections_array);
              echo "</pre>";
          **/
            $this->common_model->save_data('ONLINEEXAM_STUDENT', $sections_array);
        }
        //start 
        
        $where = array("ID" => $onlineexam_id);
         $data['allPdt'] = $this->common_model->Onlineexam_View($where);

        /// check ans start
       
        $match = 0;
        $notmatch = 0;


        $where = array("ONLINEEXAMID" => $onlineexam_id);
        $allcurans = $this->common_model->view_qn("QUESTIONS_CORRECT", "", "ID", "asc");
        $allansbystd = $this->common_model->view_qn("ONLINEEXAM_STUDENT", $where, "ID", "asc");

        foreach ($allcurans as $key11 => $obj11) {
            foreach ($allansbystd as $key22 => $obj22) {

                if ($obj11->QUESTIONSID == $obj22->QUESTIONSID) {

                    $wh = array("QUESTIONSID" => $obj11->QUESTIONSID);

                    $q = $this->common_model->view_data("QUESTIONS_CORRECT", $wh, "ID", "ASC");
                    $a = $this->common_model->view_data("ONLINEEXAM_STUDENT", $wh, "ID", "ASC");


                    $c = count($q);
                    $cc = count($a);
                    $c2 = 0;

                    if ($c == $cc) {
                        foreach ($q as $key => $obj1) {
                            foreach ($a as $key2 => $obj2) {
                                if ($obj1->CORRECT == $obj2->CORRECT) {
                                    $c2++;
                                }

                            }
                        }
                    }

                    



                    if ($c == $c2) {
                        $match++;
                
                    } else {
                        $notmatch++;

                    }


                
                }
            }
        }
        
         $data = array(
                "STUDENT_ID" =>$this->session->userdata('id'),
             "ONLINEEXAMID" => $onlineexam_id,
             "CORRECT_ANS" =>$match,
             "WRONG_ANS" =>$notmatch,
                
            );
            if ($this->common_model->save_data("ONLINEEXAM_RESULT", $data)) {

                $sdata['msg'] = "Save Successful";
            }
       
        //end

        $sdata['msg'] = "Save Successful";

        $this->session->set_userdata($sdata);
        redirect(base_url() . "student/onlineexam", "refresh");
    }

    public function result($id) {

        $data = array();
        $data['active'] = "subjects";
        $data['title'] = "subjects";
        $this->load->helper("form");
        $urlp = $this->uri->segment('4');
        $where = array("ID" => $id);
        $data['allPdt'] = $this->common_model->Onlineexam_View($where);

        /// check ans start
       
        $match = 0;
        $notmatch = 0;


        $where = array("ONLINEEXAMID" => $urlp);
        $allcurans = $this->common_model->view_qn("QUESTIONS_CORRECT", "", "ID", "asc");
        $allansbystd = $this->common_model->view_qn("ONLINEEXAM_STUDENT", $where, "ID", "asc");

        foreach ($allcurans as $key11 => $obj11) {
            foreach ($allansbystd as $key22 => $obj22) {

                if ($obj11->QUESTIONSID == $obj22->QUESTIONSID) {

                    $wh = array("QUESTIONSID" => $obj11->QUESTIONSID);

                    $q = $this->common_model->view_data("QUESTIONS_CORRECT", $wh, "ID", "ASC");
                    $a = $this->common_model->view_data("ONLINEEXAM_STUDENT", $wh, "ID", "ASC");


                    $c = count($q);
                    $cc = count($a);
                    $c2 = 0;

                    if ($c == $cc) {
                        foreach ($q as $key => $obj1) {
                            foreach ($a as $key2 => $obj2) {
                                if ($obj1->CORRECT == $obj2->CORRECT) {
                                    $c2++;
                                }

                            }
                        }
                    }

                    



                    if ($c == $c2) {
                        $match++;
                
                    } else {
                        $notmatch++;

                    }


                
                }
            }
        }
      $data['match']=$match;
      $data['notmatch']=$notmatch;

       

        ///check ans end





       
        $data['content'] = $this->load->view("student/result-view", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

}
