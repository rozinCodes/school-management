<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Student_shift_assign extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

    public function index() {
        $data = array();
        $data['active'] = "Teacher Shift";
        $data['title'] = "Teacher Shift";
        $this->load->helper("form");
        $data['allPdt'] = $this->common_model->view_data("STAFF", "", "ID", "DESC");
        $data['allPdt4'] = $this->common_model->view_data("STAFF_SHIFT", "", "ID", "DESC");
        $data['allPdt3'] = $this->common_model->view_data("SESSIONS", "", "ID", "DESC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "DESC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "DESC");
        $data['allPdt6'] = $this->common_model->view_data("SECTIONS", "", "ID", "DESC");
      


        $data['allinfo'] = $this->shift_model->get_staff_shift("STUDENT_SHIFT_ASSIGN");
       

        $data['content'] = $this->load->view("admin/academics/student_shift_assign", $data, TRUE);
        $this->load->view("admin/master", $data);
    }




    public function insert() {
        

        $this->load->helper("form");
      $this->load->library("form_validation");
      $this->form_validation->set_rules("version", "", "required");


        if ($this->form_validation->run() == NULL) {

            $data = array();
            $data['active'] = "groups";

            $data['title'] = "groups";
    
            $this->load->helper("form");
            $data['allPdt'] = $this->common_model->view_data("STAFF", "", "ID", "DESC");
            $data['allPdt4'] = $this->common_model->view_data("STAFF_SHIFT", "", "ID", "DESC");
            $data['allPdt3'] = $this->common_model->view_data("SESSIONS", "", "ID", "DESC");
            $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "DESC");
            $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "DESC");
            $data['allPdt6'] = $this->common_model->view_data("SECTIONS", "", "ID", "DESC");
            $data['allinfo'] = $this->shift_model->get_staff_shift("STUDENT_SHIFT_ASSIGN");
            
            $data['content'] = $this->load->view("admin/academics/student_shift_assign", $data, TRUE);
            $this->load->view("admin/master", $data);
           
        } else {

            

            $where=array(
                
                "CLASS_ID" => $this->input->post("class"),
                "SECTION_ID" => $this->input->post("section"),
                "VERSION_ID" => $this->input->post("version"),
                "SHIFT_ID" => $this->input->post("staff_shift"),
                "SESSION_ID" => $this->input->post("session"),
                
            );

            //if(!$this->academics_model->check_assign_teacher("TEACHER_ASSIGN", $where))
            if(!$this->common_model->check_unique("STUDENT_SHIFT_ASSIGN", $where))
                
            {
                $data = array(
                    "CLASS_ID" => $this->input->post("class"),
                "SECTION_ID" => $this->input->post("section"),
                "VERSION_ID" => $this->input->post("version"),
                "SHIFT_ID" => $this->input->post("staff_shift"),
                "SESSION_ID" => $this->input->post("session"),
            );
            if ($this->common_model->save_data("STUDENT_SHIFT_ASSIGN", $data)) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            }
            else
            {
                $sdata['msg'] = "Already Exists Data !!";
            }

            
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/academics/Student_shift_assign", "refresh");
        }
    }

    public function edit_shift()
    {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("version", "Group Name", "required");
        if ($this->form_validation->run() == NULL) {
          $edit_id= $this->uri->segment('6');
          
          $data = array(); 
          $data['active'] = "groups";
          $data['edit'] = $edit_id;
          $data['title'] = "groups";
          $this->load->helper("form");
          $data['allPdt'] = $this->common_model->view_data("STAFF", "", "ID", "DESC");
        $data['allPdt4'] = $this->common_model->view_data("STAFF_SHIFT", "", "ID", "DESC");
        $data['allPdt3'] = $this->common_model->view_data("SESSIONS", "", "ID", "DESC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "DESC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "DESC");
        $data['allPdt6'] = $this->common_model->view_data("SECTIONS", "", "ID", "DESC");
        $data['allinfo'] = $this->shift_model->get_staff_shift("STUDENT_SHIFT_ASSIGN");
          $data['content'] = $this->load->view("admin/academics/student_shift_assign", $data, TRUE);
          $this->load->view("admin/master", $data);
      } else {
          $data = array(
            "CLASS_ID" => $this->input->post("class"),
            "SECTION_ID" => $this->input->post("section"),
            "VERSION_ID" => $this->input->post("version"),
            "SHIFT_ID" => $this->input->post("staff_shift"),
            "SESSION_ID" => $this->input->post("session"),
          );
                  $edit_id= $this->uri->segment('6');
                  
          if ($this->common_model->edit("STUDENT_SHIFT_ASSIGN", $data,$edit_id)) {
              $sdata['msg'] = "Edit Successful";
          } else {
              $sdata['msg'] = "Not Successfully Data Edit !!";
          }
          $this->session->set_userdata($sdata);
          redirect(base_url() . "admin/academics/Student_shift_assign", "refresh");
      }
    }


    public function delete_shift()
    {
        $delete_id= $this->uri->segment('6');


        if ($this->common_model->delete("STUDENT_SHIFT_ASSIGN",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/academics/Student_shift_assign", "refresh");
    }
    

   
    

    

}
