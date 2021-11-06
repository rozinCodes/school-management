<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Keep extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
      $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
      if(! $this->session->userdata('authenticated')){
            redirect("login");
        }
    }


    public function index() {
        $data = array();
        $data['active'] = "keep";
        $data['title'] = $this->lang->line("keep");
        $this->load->helper("form");
       // $data['content'] = $this->load->view("student/keep-new", $data, TRUE);
        $this->load->view("student/keep-new", $data);
    }

    public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");

       

            $data = array(
                "USER_ID" => $this->session->userdata("id"),
                "KEEP_NUMBER" => $this->input->post("random")
            );
            if ($this->common_model->save_data("KEEP", $data)) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "groups-management", "refresh");
      
    }
    
        public function update(){
    
        $id=$this->input->post("random");
            //$id=1600115969;
     
        $selPdt=$this->common_model->view_data("KEEP",array("KEEP_NUMBER"=>$id),"ID","desc");
       
            
                 $data = array(
                "DESCRIPTION" =>$this->input->post("keyValue"),
                "TITLE" =>$this->input->post("title")
       
                        
            );
            if ($this->common_model->update("KEEP", $data,array("KEEP_NUMBER"=>$id))) {
          
                 $sdata['msg']="Product update successfull";
            }
            else{
             $sdata['msg']="Product Err";
            }
            $this->session->set_userdata($sdata);
         redirect(base_url()."keep/view","refresh");
      
    }
    
    public function view() {
        $data = array();
        $data['active'] = "keep";
        $data['title'] = $this->lang->line("keep");
        $this->load->helper("form");
        $id=$this->session->userdata("id");
        $where=array("USER_ID"=>$id);
         $data['allPdt'] = $this->common_model->view_data("KEEP", $where, "ID", "ASC");
        $data['allSdt'] = $this->common_model->Class_Sections();
        $data['allPdt2'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['content'] = $this->load->view("student/keep-view", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function delete($id){
        $dt = $this->common_model->view_data("KEEP", array("ID"=>$id), "ID", "asc");
        if($dt){
            $this->common_model->delete_data("KEEP", array("ID"=>$id));
          $sdata['msg']="Delete Successfull";
        }
        else{
             $sdata['msg']="Delete Err";
        }
            $this->session->set_userdata($sdata);
          redirect(base_url()."keep/view","refresh");
   }

}
