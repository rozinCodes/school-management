<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shift extends CI_Controller {

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
        $data['allinfo']= $this->common_model->view_data("STAFF_SHIFT", "","ID","DESC");
        $data['content'] = $this->load->view("admin/hrms/add_shift", $data, TRUE);
        $this->load->view("admin/master", $data);
    }


    public function add_shift()
    {   $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("period_name", "", "required");
  
  
          if ($this->form_validation->run() == NULL) {
  
              $data = array();
              $data['active'] = "groups";
  
              $data['title'] = "groups";
      
              $this->load->helper("form");
              $data['allinfo'] = $this->common_model->view_data("STAFF_SHIFT", "", "ID", "ASC");
              
              $data['content'] = $this->load->view("admin/hrms/add_shift", $data, TRUE);
             $this->load->view("admin/master", $data);
             
          } else {
  
              
  
              $where=array(
                  
                  "START_TIME<= " => $this->input->post("period_start_time"),
                  "END_TIME>=" => $this->input->post("period_start_time"),
                  // "PERIOD_NAME" => $this->input->post("period_name"),
                  // "DURATION" => $this->input->post('period_duration')
              );
  
              //if(!$this->academics_model->check_assign_teacher("TEACHER_ASSIGN", $where))
              if(!$this->common_model->check_unique("STAFF_SHIFT", $where))
                  
              {
                  $data = array(
                      "START_TIME" => $this->input->post("period_start_time"),
                      "END_TIME" => $this->input->post("period_end_time"),
                      "SHIFT_NAME" => $this->input->post("period_name"),
                      "DURATION" => $this->input->post('period_duration'),
                     // "ROOM_NUMBER" => $this->input->post('room_number')
                  //"CREATED_DATE" => $this->oracle_onlydate()
              );
              if ($this->common_model->save_data("STAFF_SHIFT", $data)) {
  
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
              redirect(base_url() . "admin/hrms/shift", "refresh");
          }
    }


    public function edit_shift()
    {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("period_name", "Group Name", "required");
  
        if ($this->form_validation->run() == NULL) {
  
  
          $edit_id= $this->uri->segment('6');
          
      
          $data = array();
          
          $data['active'] = "groups";
          $data['edit'] = $edit_id;
          $data['title'] = "groups";
  
          $this->load->helper("form");
  
         
  
          $data['allinfo']= $this->common_model->view_data("STAFF_SHIFT", "","ID","DESC");
          $data['content'] = $this->load->view("admin/hrms/add_shift", $data, TRUE);
             $this->load->view("admin/master", $data);
  
      } else {
  
         
          
  
  
          $data = array(
  
            "START_TIME" => $this->input->post("period_start_time"),
            "END_TIME" => $this->input->post("period_end_time"),
            "SHIFT_NAME" => $this->input->post("period_name"),
            "DURATION" => $this->input->post('period_duration'),
              
          );
                  $edit_id= $this->uri->segment('6');
  
              
        
          
  
          if ($this->common_model->edit("STAFF_SHIFT", $data,$edit_id)) {
  
  
  
              $sdata['msg'] = "Edit Successful";
          } else {
              $sdata['msg'] = "Not Successfully Data Edit !!";
          }
          $this->session->set_userdata($sdata);
          redirect(base_url() . "admin/hrms/shift", "refresh");
      }
    }

    public function delete_shift()
    {
        $delete_id= $this->uri->segment('6');


        if ($this->common_model->delete("STAFF_SHIFT",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
          redirect(base_url() . "admin/hrms/shift", "refresh");
    }
    


}
