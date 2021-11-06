<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Student_download_center extends CI_Controller
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

    public function assignment(){

        $data = array();
        $data['active'] = "download_center";
        $data['title'] = "Download Center";
        $this->load->helper("form");

        /* Current Sesssion Roles and ID start */
        $admission_no = $this->session->userdata('admission_no');
        $data['cur_student_status'] = $this->student_model->get_student_by_session("STUDENTS", $admission_no);

        /* Current Sesssion Roles and ID End */

    

        $class = $data['cur_student_status']->CLASS_ID;
        $section = $data['cur_student_status']->SECTION_ID;

        $array = array(
            "CONTENT_TYPE"=>"assignment",
            "CLASS"=>$class,
            "SECTION"=> $section,
        );



        $data['allPdt'] = $this->download_center_model->show_contents("UPLOAD_CONTENT", $array, "ID", "DESC");



        $data['content'] = $this->load->view("student/download_center/assignments", $data, true);
        $this->load->view("admin/master", $data);
        

    }
    public function syllabus(){

        $data = array();
        $data['active'] = "download_center";
        $data['title'] = "Download Center";
        $this->load->helper("form");

       

        /* Current Sesssion Roles and ID start */
        $admission_no = $this->session->userdata('admission_no');
        $data['cur_student_status'] = $this->student_model->get_student_by_session("STUDENTS", $admission_no);

        /* Current Sesssion Roles and ID End */

    

        $class = $data['cur_student_status']->CLASS_ID;
        $section = $data['cur_student_status']->SECTION_ID;

        $array = array(
            "CONTENT_TYPE"=>"syllabus",
            "CLASS"=>$class,
            "SECTION"=> $section,
        );




        $data['allPdt'] = $this->download_center_model->show_contents("UPLOAD_CONTENT", $array, "ID", "DESC");



        $data['content'] = $this->load->view("student/download_center/syllabus", $data, true);
        $this->load->view("admin/master", $data);
        

    }

    public function study_material(){

        $data = array();
        $data['active'] = "download_center";
        $data['title'] = "Download Center";
        $this->load->helper("form");


        /* Current Sesssion Roles and ID start */
        $admission_no = $this->session->userdata('admission_no');
        $data['cur_student_status'] = $this->student_model->get_student_by_session("STUDENTS", $admission_no);

        /* Current Sesssion Roles and ID End */

    

        $class = $data['cur_student_status']->CLASS_ID;
        $section = $data['cur_student_status']->SECTION_ID;

        $array = array(
            "CONTENT_TYPE"=>"study_material",
            "CLASS"=>$class,
            "SECTION"=> $section,
        );

        



        $data['allPdt'] = $this->download_center_model->show_contents("UPLOAD_CONTENT", $array, "ID", "DESC");



        $data['content'] = $this->load->view("student/download_center/study_material", $data, true);
        $this->load->view("admin/master", $data);
        

    }
    public function other_download(){

        $data = array();
        $data['active'] = "download_center";
        $data['title'] = "Download Center";
        $this->load->helper("form");


        /* Current Sesssion Roles and ID start */
        $admission_no = $this->session->userdata('admission_no');
        $data['cur_student_status'] = $this->student_model->get_student_by_session("STUDENTS", $admission_no);

        /* Current Sesssion Roles and ID End */

    

        $class = $data['cur_student_status']->CLASS_ID;
        $section = $data['cur_student_status']->SECTION_ID;

        $array = array(
            "CONTENT_TYPE"=>"other",
            "CLASS"=>$class,
            "SECTION"=> $section,
        );




        $data['allPdt'] = $this->download_center_model->show_contents("UPLOAD_CONTENT", $array, "ID", "DESC");



        $data['content'] = $this->load->view("student/download_center/others", $data, true);
        $this->load->view("admin/master", $data);
        

    }
}
