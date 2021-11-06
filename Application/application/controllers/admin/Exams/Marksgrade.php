<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marksgrade extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
      $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

    


  public function add_grade(){



     $data = array();
        $data['active'] = "groups";
        $data['title'] = "groups";
        $this->load->helper("form");
          $data['allPdt']= $this->common_model->view_data("MARKS_GRADE", "","ID","DESC");
        $data['content'] = $this->load->view("admin/exams/marks_grade", $data, TRUE);
        $this->load->view("admin/master", $data);

  }

  public function insert() {

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("grade_name", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "groups";
            $data['title'] = "groups";
            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/exams/marks_grade", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

            $data = array(
                "GRADE_NAME" => $this->input->post("grade_name"),
                "PERCENT_FROM" => $this->input->post("percent_from"),
                "PERCENT_UPTO" => $this->input->post("percent_upto"),
                "GRADE_POINT" => $this->input->post("grade_point")
            );
            if ($this->common_model->save_data("MARKS_GRADE", $data)) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/exams/marksgrade/add_grade", "refresh");
        }
    }


    public function edit_marksgrade()
    {
        
        $this->load->helper("form");
      $this->load->library("form_validation");
      $this->form_validation->set_rules("grade_name", "Group Name", "required");
     
      if ($this->form_validation->run() == NULL) {
        


        $edit_id= $this->uri->segment('6');

       
    
        $data = array();
        
        $data['active'] = "groups";
        $data['edit'] = $edit_id;
        $data['title'] = "groups";

        $this->load->helper("form");

       
        $data['allPdt']= $this->common_model->view_data("MARKS_GRADE", "","ID","DESC");
        // print_r($data['allPdt']);
        // exit();
        $data['content'] = $this->load->view("admin/exams/marks_grade", $data, TRUE);
        $this->load->view("admin/master", $data);

     } else {

      
         $data = array(

                 "GRADE_NAME" => $this->input->post("grade_name"),
                 "PERCENT_FROM" => $this->input->post("percent_from"),
                 "PERCENT_UPTO" => $this->input->post("percent_upto"),
                 "GRADE_POINT" => $this->input->post("grade_point")

            
         );

                 $edit_id= $this->uri->segment('6');

            
      
        

         if ($this->common_model->edit("MARKS_GRADE", $data,$edit_id)) {



             $sdata['msg'] = "Edit Successful";
         } else {
             $sdata['msg'] = "Not Successfully Data Edit !!";
         }
         $this->session->set_userdata($sdata);
         redirect(base_url() . "admin/exams/marksgrade/add_grade", "refresh");
     }

    }

    public function delete_marksgrade()
    {
        $delete_id= $this->uri->segment('6');


        if ($this->common_model->delete("MARKS_GRADE",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/exams/marksgrade/add_grade", "refresh");
    }

   


}
