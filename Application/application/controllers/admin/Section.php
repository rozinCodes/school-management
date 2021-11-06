<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

    public function index() {
        $data = array();
        $data['active'] = "section";
        $data['title'] = "section";
        $this->load->helper("form");
       $data['allPdt'] = $this->common_model->view_data("SECTIONS","","ID","DESC");
         $data['content'] = $this->load->view("admin/section-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    
      public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("name", "Name", "required");

        if ($this->form_validation->run() == NULL) {
              $data = array();
        $data['active'] = "section";
        $data['title'] = "section";
        $this->load->helper("form");
        $data['allPdt'] = $this->common_model->view_data("SECTIONS","","ID","DESC");
         $data['content'] = $this->load->view("admin/section-new", $data, TRUE);
        $this->load->view("admin/master", $data);
        } else {
		
			 $date=date("Y-m-d");
            $data = array(
                "NAME" => $this->input->post("name"),
                "ACTIVE" =>1,
				"CREATED_AT"=>$this->oracle_onlydate($date)
            );
            if ($this->common_model->save_data("SECTIONS", $data)) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/section", "refresh");
        }
    }

    public function edit_section()
    {
        
        $this->load->helper("form");
      $this->load->library("form_validation");
      $this->form_validation->set_rules("name", "Group Name", "required");

      if ($this->form_validation->run() == NULL) {


        $edit_id= $this->uri->segment('5');

        
    
        $data = array();
        
        $data['active'] = "groups";
        $data['edit'] = $edit_id;
        $data['title'] = "Section";

        $this->load->helper("form");

       

        $data['allPdt']= $this->common_model->view_data("SECTIONS", "","ID","DESC");
        $data['content'] = $this->load->view("admin/section-new", $data, TRUE);
        $this->load->view("admin/master", $data);

    } else {

        $data = array(

            "NAME" => $this->input->post("name"),
            
        );
                $edit_id= $this->uri->segment('5');

        if ($this->common_model->edit("SECTIONS", $data,$edit_id)) {

            $sdata['msg'] = "Edit Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Edit !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/section", "refresh");
    }

    }
    
        public function delete($id){
         $dt = $this->common_model->view_data("SECTIONS", array("ID"=>$id), "ID", "asc");
         if($dt){
             $this->common_model->delete_data("SECTIONS", array("ID"=>$id));
           $sdata['msg']="Delete Successfull";
         }
         else{
              $sdata['msg']="Delete Err";
         }
             $this->session->set_userdata($sdata);
           redirect(base_url()."admin/section","refresh");
    }
}