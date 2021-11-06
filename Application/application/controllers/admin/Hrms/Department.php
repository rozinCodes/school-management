<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Department extends CI_Controller
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
        $data['allPdt'] = $this->common_model->view_data("STAFF_DEPARTMENT", "", "ID", "DESC");
        $data['content'] = $this->load->view("admin/hrms/add_department", $data, TRUE);
        $this->load->view("admin/master", $data);
    }


    public function add_department()
    {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("department_name", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "groups";
            $data['title'] = "groups";
            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/hrms/add_department", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

            $data = array(

                "DEPARTMENT_NAME" => $this->input->post("department_name")
            );
            if ($this->common_model->save_data("STAFF_DEPARTMENT", $data)) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/hrms/department", "refresh");
        }
    }

    public function edit_department()
    {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("department_name", "Group Name", "required");
  
        if ($this->form_validation->run() == NULL) {
  
  
          $edit_id= $this->uri->segment('6');

          
          $data = array();
          
          $data['active'] = "groups";
          $data['edit'] = $edit_id;
          $data['title'] = "groups";
  
          $this->load->helper("form");
  
         
  
          $data['allPdt']= $this->common_model->view_data("STAFF_DEPARTMENT", "","ID","DESC");
          $data['content'] = $this->load->view("admin/hrms/add_department", $data, TRUE);
            $this->load->view("admin/master", $data);
  
      } else {
  
          $data = array(
  
            "DEPARTMENT_NAME" => $this->input->post("department_name")
              
          );
                  $edit_id= $this->uri->segment('6');
  
              
        
          
  
          if ($this->common_model->edit("STAFF_DEPARTMENT", $data,$edit_id)) {
  
  
  
              $sdata['msg'] = "Edit Successful";
          } else {
              $sdata['msg'] = "Not Successfully Data Edit !!";
          }
          $this->session->set_userdata($sdata);
          redirect(base_url() . "admin/hrms/department", "refresh");
      }
  
    }

    public function delete_department()
    {
        $delete_id= $this->uri->segment('6');


        if ($this->common_model->delete("STAFF_DEPARTMENT",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/hrms/department", "refresh");
    }
}
