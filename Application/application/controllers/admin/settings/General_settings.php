<?php

defined('BASEPATH') or exit('No direct script access allowed');

class General_settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('download_center_model');
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        if (!$this->session->userdata('authenticated')) {
            redirect("login");
        }
    }

    public function index(){
        
        $data = array();
        $data['active'] = "general_settings";
        $data['title'] = "General Settings";
        $this->load->helper("form");


        $data['allPdt'] = $this->common_model->view_data("GENERAL_SETTINGS", "", "ID", "DESC");
        


        $data['content'] = $this->load->view("admin/settings/general_settings", $data, true);
        $this->load->view("admin/master", $data);
    }

    public function save(){
        
        $data = array();
        $data['active'] = "general_settings";
        $data['title'] = "General Settings";
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("school_name", "Settings", "required");

        if ($this->form_validation->run() == null) {
            $data = array();
            $data2 = array();
            $data['active'] = "Add Staff";
            $data['title'] = "Add Staff";
            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/settings/general_settings", $data, true);
            $this->load->view("admin/master", $data);
        } else {

            //---start
            $dataInfo = array();
            $files = $_FILES;
            $cpt = count($_FILES['pic']['name']);
            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['pic']['name'] = $files['pic']['name'][$i];
                $_FILES['pic']['type'] = $files['pic']['type'][$i];
                $_FILES['pic']['tmp_name'] = $files['pic']['tmp_name'][$i];
                $_FILES['pic']['error'] = $files['pic']['error'][$i];
                $_FILES['pic']['size'] = $files['pic']['size'][$i];


                $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|txt|csv|docx';  //supported image
                $config['upload_path'] = "./uploads/school_info/logo/";
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                $this->upload->do_upload("pic");
                $dataInfo[] = $this->upload->data();
            }

            $logo = $dataInfo[0]['file_name'];

            if($logo){

                $array = array(
                    "ID"=>1,
                    "SCHOOL_NAME" => $this->input->post("school_name"),
                    "SCHOOL_CODE" => $this->input->post("school_code"),
                    "SCHOOL_LOGO" =>  $dataInfo[0]['file_name'],
                    "SCHOOL_PHONE" => $this->input->post("school_phone"),
                    "SCHOOL_EMAIL" => $this->input->post("school_email"),
                    "SCHOOL_ADDRESS" =>$this->input->post("school_address"),
        
                );

            }else{
                $array = array(
                    "ID"=>1,
                    "SCHOOL_NAME" => $this->input->post("school_name"),
                    "SCHOOL_CODE" => $this->input->post("school_code"),
                    "SCHOOL_PHONE" => $this->input->post("school_phone"),
                    "SCHOOL_EMAIL" => $this->input->post("school_email"),
                    "SCHOOL_ADDRESS" =>$this->input->post("school_address"),
        
                );
            }

     

          
            $data['check_school_info'] = $this->common_model->check_school_info("GENERAL_SETTINGS");

            if($data['check_school_info'] ){

                if ($this->common_model->edit("GENERAL_SETTINGS", $array,1)) {
                    $sdata['msg'] = "Update Successful !";
                } else {
                    $sdata['msg'] = "Not Successfully Data updated !!";
                }
    

            }else{

                if ($this->common_model->save_data("GENERAL_SETTINGS", $array)) {
                    $sdata['msg'] = "Save Successful";
                } else {
                    $sdata['msg'] = "Not Successfully Data Insert !!";
                }
    
            }
            

            $this->session->set_userdata($sdata);
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/settings/general_settings", "refresh");
        }
    }
    
}