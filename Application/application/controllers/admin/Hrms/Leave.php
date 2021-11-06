<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends CI_Controller {

    public function __construct() {
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
        $data['allPdt']= $this->common_model->view_data("LEAVE_TYPE", "","ID","DESC");
        $data['content'] = $this->load->view("admin/hrms/add_leave", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function leave_delete()
    {

        $id = $this->uri->segment('5');


        if ($this->download_center_model->delete_content("STAFF_LEAVE_REQUEST", $id)) {

            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/hrms/staff/apply_leave", "refresh");
    }


    public function add_leave()
    {
          $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("leave_name", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "groups";
            $data['title'] = "groups";
            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/hrms/add_leave", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

            $data = array(
                
                "LEAVE_NAME" => $this->input->post("leave_name")
            );
            if ($this->common_model->save_data("LEAVE_TYPE", $data)) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/hrms/leave", "refresh");
        }
    }

    public function edit_leave()
    {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("leave_name", "Group Name", "required");
  
        if ($this->form_validation->run() == NULL) {
  
  
          $edit_id= $this->uri->segment('6');
          
      
          $data = array();
          
          $data['active'] = "groups";
          $data['edit'] = $edit_id;
          $data['title'] = "groups";
  
          $this->load->helper("form");
  
         
  
          $data['allPdt']= $this->common_model->view_data("LEAVE_TYPE", "","ID","DESC");
          $data['content'] = $this->load->view("admin/hrms/add_leave", $data, TRUE);
            $this->load->view("admin/master", $data);
  
      } else {
  
         
          
  
  
          $data = array(
  
            "LEAVE_NAME" => $this->input->post("leave_name")
              
          );
                  $edit_id= $this->uri->segment('6');
  
              
        
          
  
          if ($this->common_model->edit("LEAVE_TYPE", $data,$edit_id)) {
  
  
  
              $sdata['msg'] = "Edit Successful";
          } else {
              $sdata['msg'] = "Not Successfully Data Edit !!";
          }
          $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/hrms/leave", "refresh");
      }
  
    }

    public function delete_leave()
    {
        $delete_id= $this->uri->segment('6');


        if ($this->common_model->delete("LEAVE_TYPE",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/hrms/leave", "refresh");
    }

    public function student_leave_delete(){

        $delete_id= $this->uri->segment('5');

        // print_r($delete_id);
        // exit();


        if ($this->common_model->delete("STUDENT_LEAVE",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "student/studentleave", "refresh");

    }
    


}
