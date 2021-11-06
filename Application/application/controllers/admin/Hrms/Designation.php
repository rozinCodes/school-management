<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Designation extends CI_Controller {

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
          $data['allPdt']= $this->common_model->view_data("STAFF_DESIGNATION", "","ID","DESC");
        $data['content'] = $this->load->view("admin/hrms/add_designation", $data, TRUE);
        $this->load->view("admin/master", $data);
	}


    public function add_designation()
    {
          $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("designation_name", "Group Name", "required");

        if ($this->form_validation->run() == NULL) {
         
            $data = array();
            $data['active'] = "groups";
            $data['title'] = "groups";
            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/hrms/add_designation", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {

            $data = array(
                
                "DESIGNATION_NAME" => $this->input->post("designation_name")
            );
            if ($this->common_model->save_data("STAFF_DESIGNATION", $data)) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/hrms/designation", "refresh");
        }
    }

    public function edit_designation()
    {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("designation_name", "Group Name", "required");
  
        if ($this->form_validation->run() == NULL) {
  
  
          $edit_id= $this->uri->segment('6');

          
          $data = array();
          
          $data['active'] = "groups";
          $data['edit'] = $edit_id;
          $data['title'] = "groups";
  
          $this->load->helper("form");
  
         
  
          $data['allPdt']= $this->common_model->view_data("STAFF_DESIGNATION", "","ID","DESC");
          $data['content'] = $this->load->view("admin/hrms/add_designation", $data, TRUE);
            $this->load->view("admin/master", $data);
  
      } else {
  
         
          
  
  
          $data = array(
  
            "DESIGNATION_NAME" => $this->input->post("designation_name")
              
          );
                  $edit_id= $this->uri->segment('6');
  
              
        
          
  
          if ($this->common_model->edit("STAFF_DESIGNATION", $data,$edit_id)) {
  
  
  
              $sdata['msg'] = "Edit Successful";
          } else {
              $sdata['msg'] = "Not Successfully Data Edit !!";
          }
          $this->session->set_userdata($sdata);
          redirect(base_url() . "admin/hrms/designation", "refresh");
      }
  
    }
    
    public function delete_designation()
    {
        $delete_id= $this->uri->segment('6');


        if ($this->common_model->delete("STAFF_DESIGNATION",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
          redirect(base_url() . "admin/hrms/designation", "refresh");
    }


}
