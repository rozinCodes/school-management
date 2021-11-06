<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_assign extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

    public function index() {
        $data = array();
        $data['active'] = "subjects";
        $data['title'] = "subjects";
        $this->load->helper("form");

        $data['allTchr'] = $this->common_model->view_data("STAFF", "", "ID", "asc");
        $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "asc");
        $data['allSession'] = $this->common_model->view_data("SESSIONS", "", "ID", "desc");
        $data['allSub'] = $this->common_model->view_data("SUBJECTS", "", "ID", "desc");

        $data['allSec'] = $this->academics_model->show_section_classwise("CLASS_SECTIONS", "", "ID", "desc");
        
        
        $data['allinfo'] = $this->academics_model->show_from_teacher_assign("TEACHER_ASSIGN", "", "ID", "desc");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");

        /*print_r($data['allinfo'] );
        exit();*/
        
        /*print_r($data['allSec']);
        exit();*/
        //$data['allSub'] = $this->academics_model->Subject_Book();
        $data['content'] = $this->load->view("admin/academics/teacher_assign", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert() {

        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("teacher_name", "Name", "required");

        

        if ($this->form_validation->run() == NULL) {
            
            $data = array();
            $data['active'] = "subjects";
            $data['title'] = "subjects";
            $this->load->helper("form");
            
            $data['allTchr'] = $this->common_model->view_data("STAFF", "", "ID", "asc");
            $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "asc");
            $data['allSub'] = $this->common_model->view_data("SUBJECTS", "", "ID", "desc");

            $data['allSec'] = $this->academics_model->show_section_classwise("CLASS_SECTIONS", "", "ID", "desc");
            
            $data['allSession'] = $this->common_model->view_data("SESSIONS", "", "ID", "desc");
            $data['allinfo'] = $this->academics_model->show_from_teacher_assign("TEACHER_ASSIGN", "", "ID", "desc");

            $data['content'] = $this->load->view("admin/academics/teacher_assign", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

           $where=array(
            "CLASS_ID" => $this->input->post("classesid"),
            "SECTION_ID" => $this->input->post("section_id"),
           );
           $allSession = $this->common_model->view_data("CLASS_SECTIONS",$where, "ID", "desc");
           if ($allSession) {
               foreach($allSession as $value)
               {
                $class_section_id = $value->ID; 
               }
            
             }

        //    print_r($class_section_id);
        //    exit();




            $where2=array(
                "CLASS_SECTION_ID" => $class_section_id,
                // "CLASS_ID" => $this->input->post("classesid"),
                // "SECTION_ID" => $this->input->post("section_id"),
                "SUBJECT_ID" => $this->input->post("subjects_name"),
                "SESSIONS" => $this->input->post('session_id'),
            );

            //if(!$this->academics_model->check_assign_teacher("TEACHER_ASSIGN", $where))
            if(!$this->common_model->check_unique("TEACHER_ASSIGN", $where2))
                
            {
                $data = array(
                "STAFF_ID" => $this->input->post("teacher_name"),
                // "CLASS_ID" => $this->input->post("classesid"),
                // "SECTION_ID" => $this->input->post("section_id"),
                "CLASS_SECTION_ID" => $class_section_id,
                "SUBJECT_ID" => $this->input->post("subjects_name"),
                "SESSIONS" => $this->input->post('session_id'),
                "CREATED_DATE" => $this->oracle_onlydate()
            );
            if ($this->common_model->save_data("TEACHER_ASSIGN", $data)) {

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
            redirect(base_url() . "admin/academics/teacher_assign", "refresh");
        }
    }

    public function edit_teacher_assign()
    {
      $this->load->helper("form");
      $this->load->library("form_validation");
      $this->form_validation->set_rules("teacher_name", "Group Name", "required");

      if ($this->form_validation->run() == NULL) {


        $edit_id= $this->uri->segment('6');
        // echo $edit_id;
        // exit();
        $data = array();
        
        $data['active'] = "groups";
        $data['edit'] = $edit_id;

        $data['title'] = "groups";

        $this->load->helper("form");

            $data['allTchr'] = $this->common_model->view_data("STAFF", "", "ID", "asc");
            $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "asc");
            $data['allSub'] = $this->common_model->view_data("SUBJECTS", "", "ID", "asc");

            $data['allSec'] = $this->academics_model->show_section_classwise("CLASS_SECTIONS", "", "ID", "asc");
            
            $data['allSession'] = $this->common_model->view_data("SESSIONS", "", "ID", "desc");
            $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['allinfo'] = $this->academics_model->show_from_teacher_assign("TEACHER_ASSIGN");
            //  echo "<pre>";
            //  print_r($data['allinfo'] );
            //  echo "<pre>";
            // exit();
            

            $data['content'] = $this->load->view("admin/academics/teacher_assign", $data, TRUE);
            $this->load->view("admin/master", $data);

             
       
    } else {
        
        $where=array(
            "CLASS_ID" => $this->input->post("classesid"),
            "SECTION_ID" => $this->input->post("section_id"),
           );
           $allSession = $this->common_model->view_data("CLASS_SECTIONS",$where, "ID", "desc");
           if ($allSession) {
               foreach($allSession as $value)
               {
                $class_section_id = $value->ID; 
               }
            
             }

        $data = array(

            "STAFF_ID" => $this->input->post("teacher_name"),
            // "CLASS_ID" => $this->input->post("classesid"),
            // "SECTION_ID" => $this->input->post("section_id"),
            "CLASS_SECTION_ID" => $class_section_id,
            "SUBJECT_ID" => $this->input->post("subjects_name"),
            "SESSIONS" => $this->input->post('session_id'),
            "CREATED_DATE" => $this->oracle_onlydate()
            
        );

        // print_r($data);
        // exit();
                $edit_id= $this->uri->segment('6');



        if ($this->common_model->edit("TEACHER_ASSIGN", $data,$edit_id)) {



            $sdata['msg'] = "Edit Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Edit !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/academics/teacher_assign", "refresh");
    }
    }
    public function delete_teacher_assign()
{
      $delete_id= $this->uri->segment('6');


        if ($this->common_model->delete("TEACHER_ASSIGN",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/academics/teacher_assign", "refresh");

      
}

    

    

}
