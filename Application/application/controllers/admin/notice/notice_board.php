<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Notice_board extends CI_Controller
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
        $data['active'] = "notice_board";
        $data['title'] = "Notice Board";
        $this->load->helper("form");


        $data['allPdt'] = $this->common_model->view_data("ROLES", "", "ID", "DESC");

        $cur_session = array();
        $cur_session['ROLES_ID'] = $this->session->userdata('roles');

        if(($cur_session['ROLES_ID']==1)|| ($cur_session['ROLES_ID']==2)){

            $data['allPdt3'] = $this->notice_model->get_content("NOTICE_BOARD", "", "ID", "DESC");

        }else if($cur_session['ROLES_ID']==3){

            $data['allPdt3'] = $this->notice_model->get_content("NOTICE_BOARD", "staff", "ID", "DESC");

        }else if($cur_session['ROLES_ID']==5){
            
            $data['allPdt3'] = $this->notice_model->get_content("NOTICE_BOARD", "student", "ID", "DESC");
            
        }

        

        $data['content'] = $this->load->view("admin/notice/upload_notice", $data, true);
        $this->load->view("admin/master", $data);
    }

    public function save_notice_documents()
    {
        $data = array();
        $data['active'] = "notice_board";
        $data['title'] = "Notice Board";
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("notice_title", "notice_board", "required");

        if ($this->form_validation->run() == null) {
            $data = array();
            $data2 = array();
            $data['active'] = "Add Staff";
            $data['title'] = "Add Staff";
            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/notice/notice_board", $data, true);
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


                $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|txt|csv|docx|jpg';  //supported image
                $config['upload_path'] = "./uploads/notice/files/";
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);


                $this->upload->do_upload("pic");
                $dataInfo[] = $this->upload->data();
            }


            $up_date = $this->oracle_only_date_by_user($this->input->post("upload_date"));

            $array = array(

                "NOTICE_TITLE" => $this->input->post("notice_title"),
                "NOTICE_FOR" => $this->input->post("notice_for"),
                "UPLOAD_DATE" => $up_date,
                "DOCUMENTS" => $dataInfo[0]['file_name'],
                "DESCRIPTION" => $this->input->post("content_des")



            );
            if ($this->common_model->save_data("NOTICE_BOARD", $array)) {
                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }


            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/notice/notice_board", "refresh");
        }
    }

    public function download($id)
    {
        if (!empty($id)) {
            //load download helper
            $this->load->helper('download');

            //get file info from database
            $fileInfo = $this->notice_model->getRows(array('ID' => $id));


            //file path
            $file = 'uploads/notice/files/' . $fileInfo['DOCUMENTS'];


            //download file from directory
            force_download($file, NULL);
        }
    }

    public function delete()
    {

        $id = $this->uri->segment('5');


        if ($this->download_center_model->delete_content("NOTICE_BOARD", $id)) {

            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/notice/notice_board", "refresh");
    }
    


}