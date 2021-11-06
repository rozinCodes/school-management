<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sessions extends CI_Controller {

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
       $data['allPdt'] = $this->common_model->view_data("SESSIONS","","ID","DESC");
         $data['content'] = $this->load->view("admin/sessions", $data, TRUE);
        $this->load->view("admin/master", $data);
    }
    
      public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("session", "Name", "required");

        if ($this->form_validation->run() == NULL) {
              $data = array();
        $data['active'] = "section";
        $data['title'] = "section";
        $this->load->helper("form");
        $data['allPdt'] = $this->common_model->view_data("SESSIONS","","ID","DESC");
         $data['content'] = $this->load->view("admin/sessions", $data, TRUE);
        $this->load->view("admin/master", $data);
        } else {
        
             $date=date("Y-m-d");
            $data = array(
                "SESSIONS" => $this->input->post("session"),
                
            );
            if ($this->common_model->save_data("SESSIONS", $data)) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/sessions", "refresh");
        }
    }

    public function edit_session()
    {
      $this->load->helper("form");
      $this->load->library("form_validation");
      $this->form_validation->set_rules("session_name", "Group Name", "required");

      if ($this->form_validation->run() == NULL) {


        $edit_id= $this->uri->segment('5');
    
        $data = array();
        
        $data['active'] = "groups";
        $data['edit'] = $edit_id;
        $data['title'] = "groups";

        $this->load->helper("form");

       

        $data['allPdt']= $this->common_model->view_data("SESSIONS", "","ID","DESC");
        $data['content'] = $this->load->view("admin/sessions", $data, TRUE);
        $this->load->view("admin/master", $data);

    } else {

       
        


        $data = array(

            "SESSIONS" => $this->input->post("session_name"),
            
        );
                $edit_id= $this->uri->segment('5');

            
      
        

        if ($this->common_model->edit("SESSIONS", $data,$edit_id)) {



            $sdata['msg'] = "Edit Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Edit !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/sessions", "refresh");
    }

    }

    public function delete_session()
    {
        $delete_id= $this->uri->segment('5');


        if ($this->common_model->delete("SESSIONS",$delete_id)) {



            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/sessions", "refresh");
    }
    
       /* public function delete($id){
         $dt = $this->common_model->view_data("SESSIONS", array("ID"=>$id), "ID", "asc");
         if($dt){
             $this->common_model->delete_data("SESSIONS", array("ID"=>$id));
           $sdata['msg']="Delete Successfull";
         }
         else{
              $sdata['msg']="Delete Err";
         }
             $this->session->set_userdata($sdata);
           redirect(base_url()."admin/sessions","refresh");
    }*/
}