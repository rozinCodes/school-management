<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Content extends CI_Controller
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

    public function index()
    {
        $data = array();
        $data['active'] = "download_center";
        $data['title'] = "Download Center";
        $this->load->helper("form");


        $data['allPdt'] = $this->common_model->view_data("CLASSES", "", "ID", "DESC");
        $data['allPdt2'] = $this->common_model->view_data("SECTIONS", "", "ID", "ASC");
        $data['allPdt3'] = $this->download_center_model->get_content("UPLOAD_CONTENT", "", "ID", "DESC");
        $data['allPdt5'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");


        $data['content'] = $this->load->view("admin/download_center/upload_content", $data, true);
        $this->load->view("admin/master", $data);
    }

    public function save_upload_documents()
    {
        $data = array();
        $data['active'] = "download_center";
        $data['title'] = "Download Center";
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("content_title", "download_center", "required");

        if ($this->form_validation->run() == null) {
            $data = array();
            $data2 = array();
            $data['active'] = "Add Staff";
            $data['title'] = "Add Staff";
            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/download_center/upload_content", $data, true);
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
                $config['upload_path'] = "./uploads/upload_content/files/";
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);

                //$this->upload->do_upload("pic");
                // $this->upload->initialize($this->set_upload_options());

                $this->upload->do_upload("pic");
                $dataInfo[] = $this->upload->data();
            }

            //$dt = $this->input->post("upload_date");

            $up_date = $this->oracle_only_date_by_user($this->input->post("upload_date"));

            $array = array(

                "CONTENT_TITLE" => $this->input->post("content_title"),
                "CONTENT_TYPE" => $this->input->post("content_type"),
                "CLASS" => $this->input->post("class"),
                "SECTION" => $this->input->post("section"),
                "UPLOAD_DATE" => $up_date,
                "CONTENT_FILE" => $dataInfo[0]['file_name'],
                "DESCRIPTION" => $this->input->post("content_des")



            );
            if ($this->common_model->save_data("UPLOAD_CONTENT", $array)) {
                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }



            $data['allPdt'] = $this->common_model->view_data("CLASSES", "", "ID", "DES");
            $data['allPdt2'] = $this->common_model->view_data("SECTIONS", "", "ID", "ASC");

            $this->session->set_userdata($sdata);
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/download_center/content", "refresh");
        }
    }

    public function download($id)
    {
        if (!empty($id)) {
            //load download helper
            $this->load->helper('download');

            //get file info from database
            $fileInfo = $this->download_center_model->getRows(array('ID' => $id));


            //file path
            $file = 'uploads/upload_content/files/' . $fileInfo['CONTENT_FILE'];


            //download file from directory
            force_download($file, NULL);
        }
    }

    public function delete()
    {

        $id = $this->uri->segment('5');


        if ($this->download_center_model->delete_content("UPLOAD_CONTENT", $id)) {

            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/download_center/content", "refresh");
    }

    public function assignment(){

        $data = array();
        $data['active'] = "download_center";
        $data['title'] = "Download Center";
        $this->load->helper("form");

        $array = array(
            "CONTENT_TYPE"=>"assignment",
        );



        $data['allPdt'] = $this->download_center_model->show_contents("UPLOAD_CONTENT", $array, "ID", "DESC");



        $data['content'] = $this->load->view("admin/download_center/assignments", $data, true);
        $this->load->view("admin/master", $data);
        

    }
    public function syllabus(){

        $data = array();
        $data['active'] = "download_center";
        $data['title'] = "Download Center";
        $this->load->helper("form");

        $array = array(
            "CONTENT_TYPE"=>"syllabus",
        );



        $data['allPdt'] = $this->download_center_model->show_contents("UPLOAD_CONTENT", $array, "ID", "DESC");



        $data['content'] = $this->load->view("admin/download_center/syllabus", $data, true);
        $this->load->view("admin/master", $data);
        

    }

    public function study_material(){

        $data = array();
        $data['active'] = "download_center";
        $data['title'] = "Download Center";
        $this->load->helper("form");

        $array = array(
            "CONTENT_TYPE"=>"study_material",
        );



        $data['allPdt'] = $this->download_center_model->show_contents("UPLOAD_CONTENT", $array, "ID", "DESC");



        $data['content'] = $this->load->view("admin/download_center/study_material", $data, true);
        $this->load->view("admin/master", $data);
        

    }
    public function other_download(){

        $data = array();
        $data['active'] = "download_center";
        $data['title'] = "Download Center";
        $this->load->helper("form");

        $array = array(
            "CONTENT_TYPE"=>"other",
        );



        $data['allPdt'] = $this->download_center_model->show_contents("UPLOAD_CONTENT", $array, "ID", "DESC");



        $data['content'] = $this->load->view("admin/download_center/others", $data, true);
        $this->load->view("admin/master", $data);
        

    }
}
