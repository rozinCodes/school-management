<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
      $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }


  
  
  public function create_exam()
  {
    $this->load->helper("form");
      $this->load->library("form_validation");
      $this->form_validation->set_rules("exam_name", "Exam Name", "required");

      if ($this->form_validation->run() == NULL) {

        $data = array();
        
        $data['active'] = "Exam";

        $data['title'] = "Exam";

        $this->load->helper("form");

        $data['allPdt']= $this->common_model->view_data("EXAMS", "","ID","DESC");
        
       
        $data['content'] = $this->load->view("admin/exams/create_exam", $data, TRUE);

        $this->load->view("admin/master", $data);

    } else {


        $data = array(

            "EXAM_NAME" => $this->input->post("exam_name")
        );

        if ($this->common_model->save_data("EXAMS", $data)) {
            

            $sdata['msg'] = "Save Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Insert !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/exams/exam/create_exam", "refresh");
    }
  }

  public function edit_create_exam()
  {
    $this->load->helper("form");
    $this->load->library("form_validation");
    $this->form_validation->set_rules("exam_name", "Group Name", "required");

    if ($this->form_validation->run() == NULL) {


      $edit_id= $this->uri->segment('6');
      $data = array();
      
      $data['active'] = "groups";
      $data['edit'] = $edit_id;
      $data['title'] = "groups";

      $this->load->helper("form");

     

      $data['allPdt']= $this->common_model->view_data("EXAMS", "","ID","DESC");
      $data['content'] = $this->load->view("admin/exams/create_exam", $data, TRUE);

      $this->load->view("admin/master", $data);
  } else {

    

      $data = array(

          "EXAM_NAME" => $this->input->post("exam_name"),
          
      );
              $edit_id= $this->uri->segment('6');

      if ($this->common_model->edit("EXAMS", $data,$edit_id)) {



          $sdata['msg'] = "Edit Successful";
      } else {
          $sdata['msg'] = "Not Successfully Data Edit !!";
      }
      $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/exams/exam/create_exam", "refresh");
  }
  }

  public function delete_create_exam()
  {
    $delete_id= $this->uri->segment('6');


    if ($this->common_model->delete("EXAMS",$delete_id)) {



        $sdata['msg'] = "Delete Successful";
    } else {
        $sdata['msg'] = "Not Successfully Data Delete !!";
    }
    $this->session->set_userdata($sdata);
    redirect(base_url() . "admin/exams/exam/create_exam", "refresh");
  }


}
