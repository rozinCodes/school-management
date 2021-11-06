<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Dhaka");
        $language = $this->session->userdata('language');
        $this->lang->load('auth', $language);
        // $mytype = $this->session->userdata("mytype");
    }

    public function index() {
        $data = array();
        $data['active'] = "subjects";
        $data['title'] = "subjects";
        $this->load->helper("form");
        $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "asc");
        $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "ID", "desc");
            $data['allVdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
        $data['allSub'] = $this->academics_model->Subject_Book();
        $data['content'] = $this->load->view("admin/academics/subjects-new", $data, TRUE);
        $this->load->view("admin/master", $data);
    }

    public function insert() {
        $this->load->helper("form");
        $this->load->library("form_validation");
        $this->form_validation->set_rules("name", "Name", "required");

        if ($this->form_validation->run() == NULL) {
            $data = array();
            $data['active'] = "subjects";
            $data['title'] = "subjects";
            $this->load->helper("form");
            $data['allSub'] = $this->academics_model->Subject_Book();
                $data['allVdt'] = $this->common_model->view_data("VERSIONS", "", "ID", "ASC");
            $data['allCls'] = $this->common_model->view_data("CLASSES", "", "ID", "asc");
            $data['allPdt'] = $this->common_model->view_data("SECTIONS", "", "ID", "desc");
            $data['content'] = $this->load->view("admin/academics/subjects-new", $data, TRUE);
            $this->load->view("admin/master", $data);
        } else {
            //image upload
            $ext = "";
            if ($_FILES['pic']['name'] != "") {
                $ext = pathinfo($_FILES['pic']['name']);
                $ext = strtolower($ext['extension']);
            }

            $config['allowed_types'] = 'gif|jpg|jpeg|png';  //supported image
            $config['upload_path'] = "./upload/images/book_cover/";
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->do_upload("pic");
            $date = date("Y-m-d");

            $data = array(
                "NAME" => $this->input->post("name"),
                "CODE" => $this->input->post("subjects_code"),
                "TYPE" => $this->input->post("radio-inline"),
                "CLASSESID" => $this->input->post("classesid"),
                "ACTIVE" => 1,
                "PICTURE" => $this->upload->data('file_name'),
                "CREATED_DATE" => $this->oracle_onlydate($date)
            );
            if ($this->common_model->save_data("SUBJECTS", $data)) {

                $sdata['msg'] = "Save Successful";
            } else {
                $sdata['msg'] = "Not Successfully Data Insert !!";
            }
            $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/subjects", "refresh");
        }
    }

    public function delete($id) {
        $dt = $this->common_model->view_data("SUBJECTS", array("ID" => $id), "ID", "asc");
        if ($dt) {
            $this->common_model->delete_data("SUBJECTS", array("ID" => $id));
            $sdata['msg'] = "Delete Successfull";
        } else {
            $sdata['msg'] = "Delete Err";
        }
        $this->session->set_userdata($sdata);
        redirect(base_url() . "admin/subjects", "refresh");
    }

    public function edit() {
        $id = $this->input->post("id");
        //image upload
        $ext = "";
        if ($_FILES['pic']['name'] != "") {
            $ext = pathinfo($_FILES['pic']['name']);
            $ext = strtolower($ext['extension']);
        }

        $config['allowed_types'] = 'gif|jpg|jpeg|png';  //supported image
        $config['upload_path'] = "./upload/images/book_cover/";
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload("pic");
        $date = date("Y-m-d");

        $data = array(
            "NAME" => $this->input->post("name"),
            "CODE" => $this->input->post("subjects_code"),
            "TYPE" => $this->input->post("radio-inline"),
            "CLASSESID" => $this->input->post("classesid"),
            "ACTIVE" => 1,
            "PICTURE" => $this->upload->data('file_name')
        );
        if ($this->common_model->update("SUBJECTS", $data, array("ID" => $id))) {
          $sdata['msg'] = "UPDATE Successful";
        } else {
              $sdata['msg'] = "UPDATE Err";
        }
         $this->session->set_userdata($sdata);
            redirect(base_url() . "admin/subjects", "refresh");
    }

    public function class_book($code) {
        echo $code = $this->input->post("name");
        /**
          $data = array();
          $data['active'] = "subjects";
          $data['title'] = "subjects";
          $this->load->helper("form");
          $data['allCls'] = $this->common_model->view_data("classes", "", "id", "asc");
          $data['allPdt'] = $this->common_model->view_data("sections", "", "id", "desc");
          $data['content'] = $this->load->view("academics/subjects-new", $data, TRUE);
          $this->load->view("admin/master", $data);
         * * */
    }

}
