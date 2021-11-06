<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Homework extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        if (!$this->session->userdata('authenticated')) {
            redirect("login");
        }
    }

    public function index(){
    
        $data = array();
        $data['active'] = "homework";
        $data['title'] = "Home Work";
        $this->load->helper("form");


        $data['allPdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allPdt2'] = $this->common_model->view_data("CLASSES", "", "ID", "ASC");
        $data['allPdt3'] = $this->academics_model->show_section_classwise("CLASS_SECTIONS");
        $data['allPdt4'] = $this->common_model->view_data("SUBJECTS", "", "ID", "ASC");
        $data['allPdt5'] = $this->common_model->view_data("HOMEWORK", "", "ID", "ASC");

        $data['content'] = $this->load->view("admin/homework/add_homework", $data, true);
        $this->load->view("admin/master", $data);
    }

    public function save_homework()
    {
        $data = array();
        $data['active'] = "hoemwork";
        $data['title'] = "Home Work";
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("content_title", "home_work", "required");

        if ($this->form_validation->run() == null) {
            $data = array();
            $data2 = array();
            $data['active'] = "Add Staff";
            $data['title'] = "Add Staff";
            $this->load->helper("form");
            $data['content'] = $this->load->view("admin/homework/homework", $data, true);
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
            $sub_date = $this->oracle_only_date_by_user($this->input->post("submission_date"));
            $id = $this->session->userdata('id');

            $array = array(

                "CONTENT_TITLE" => $this->input->post("content_title"),
                "VERSION" => $this->input->post("version"),
                "CLASS" => $this->input->post("class"),
                "SECTION" => $this->input->post("section"),
                "SUBJECT" => $this->input->post("subject"),
                "UPLOAD_DATE" => $up_date,
                "CONTENT_FILE" => $dataInfo[0]['file_name'],
                "DESCRIPTION" => $this->input->post("content_des"),
                "SUBMISSION_DATE"=> $sub_date,
                "SUBMISSION_BY"=>$id



            );
            if ($this->common_model->save_data("HOMEWORK", $array)) {
                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }



            // $data['allPdt3'] = $this->common_model->view_data("HOMEWORK", "", "ID", "ASC");
            // print_r( $data['allPdt3']);
            // exit();

            $this->session->set_userdata($sdata);
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/homework/homework", "refresh");
        }
    }

    public function download($id)
    {
        if (!empty($id)) {
            //load download helper
            $this->load->helper('download');

            //get file info from database
            $fileInfo = $this->homework_model->getRows(array('ID' => $id));


            //file path
            $file = 'uploads/upload_content/files/' . $fileInfo['CONTENT_FILE'];


            //download file from directory
            force_download($file, NULL);
        }
    }

    public function delete()
    {

        $id = $this->uri->segment('5');


        if ($this->download_center_model->delete_content("HOMEWORK", $id)) {

            $sdata['msg'] = "Delete Successful";
        } else {
            $sdata['msg'] = "Not Successfully Data Delete !!";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/homework/homework", "refresh");
    }

  


}